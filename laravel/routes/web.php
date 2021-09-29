<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MenuGroupController;
use App\Http\Controllers\Admin\SubmenuController;
use App\Http\Controllers\Admin\DistributorController;
use App\Http\Controllers\Admin\BarangController;
use App\Http\Controllers\Admin\PenjualanController;
use App\Http\Controllers\Admin\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route Auth
Route::group(['middleware' => ['auth.logout_only']], function () {

    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'postLogin']);
});

Route::get('/logout', [AuthController::class, 'logout']);


// Route Administrator
Route::prefix('administrator')->middleware(['auth.login_only', 'maintenance_mode', 'user_block_status', 'append.menu'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('can:read-dashboard');
    Route::get('/dashboard/getGrafikPenjualan', [DashboardController::class, 'getGrafikPenjualan'])->middleware('can:read-dashboard');

    // User
    Route::get('/users', [UserController::class, 'index'])->middleware('can:read-users');
    Route::get('/users/create', [UserController::class, 'create'])->middleware('can:create-users');
    Route::post('/users/store', [UserController::class, 'store'])->middleware('can:create-users');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->middleware('can:update-users');
    Route::get('/users/{id}/detail', [UserController::class, 'show']);
    Route::post('/users/{id}/block', [UserController::class, 'blockUser'])->middleware('can:update-users');
    Route::post('/users/{id}/update', [UserController::class, 'update'])->middleware('can:update-users');
    Route::delete('/users/{id}/delete', [UserController::class, 'destroy'])->middleware('can:delete-users');
    Route::get('/users/change_password', [UserController::class, 'changePassword']);
    Route::post('/users/change_password/update_password', [UserController::class, 'updatePassword']);

    // Role
    Route::get('/roles', [RoleController::class, 'index'])->middleware('can:read-roles');
    Route::get('/roles/{id}/changes', [RoleController::class, 'edit'])->middleware('can:update-roles');
    Route::post('/roles/store', [RoleController::class, 'store'])->middleware('can:create-roles');
    Route::post('/roles/{id}/update', [RoleController::class, 'update'])->middleware('can:update-roles');
    Route::get('/roles/{id}/show', [RoleController::class, 'show'])->middleware('can:update-roles');
    Route::post('/roles/{id}/update', [RoleController::class, 'update'])->middleware('can:update-roles');
    Route::delete('/roles/{id}/delete', [RoleController::class, 'destroy'])->middleware('can:delete-roles');
    Route::delete('/roles/multipleDelete', [RoleController::class, 'multipleDelete'])->middleware('can:delete-roles');
    Route::post('/roles/{id}/change-permission', [RoleController::class, 'changePermission'])->middleware('can:update-roles');

    // Permissions
    Route::get('/permissions', [PermissionController::class, 'index'])->middleware('can:read-permissions');
    Route::post('/permissions/store', [PermissionController::class, 'store'])->middleware('can:create-permissions');

    // Settings
    Route::get('/settings', [SettingController::class, 'index'])->middleware('can:read-settings');
    Route::get('/settings/{id}/edit', [SettingController::class, 'edit'])->middleware('can:update-settings');
    Route::post('/settings/{id}/update', [SettingController::class, 'update'])->middleware('can:update-settings');
    Route::post('/settings/{id}/maintenance', [SettingController::class, 'maintenanceMode'])->middleware('can:update-settings');

    // Menu
    Route::get('/menus', [MenuController::class, 'index'])->middleware('can:read-menus');
    Route::get('/menus/create', [MenuController::class, 'create'])->middleware('can:create-menus');
    Route::get('/menus/{id}/edit', [MenuController::class, 'edit'])->middleware('can:update-menus');
    Route::post('/menus/{id}/update', [MenuController::class, 'update'])->middleware('can:update-menus');
    Route::post('/menus/store', [MenuController::class, 'store'])->middleware('can:create-menus');

    // Barang
    Route::get('/barang', [BarangController::class, 'index'])->middleware('can:read-barang');
    Route::get('/barang/create', [BarangController::class, 'create'])->middleware('can:create-barang');
    Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->middleware('can:update-barang');
    Route::post('/barang/{id}/update', [BarangController::class, 'update'])->middleware('can:update-barang');
    Route::post('/barang/store', [BarangController::class, 'store'])->middleware('can:create-barang');
    Route::delete('/barang/{id}/delete', [BarangController::class, 'destroy'])->middleware('can:delete-barang');

    // Sub menu
    Route::get('/sub-menus', [SubmenuController::class, 'index'])->middleware('can:read-sub-menus');
    Route::get('/sub-menus/create', [SubmenuController::class, 'create'])->middleware('can:create-sub-menus');
    Route::get('/sub-menus/{id}/edit', [SubmenuController::class, 'edit'])->middleware('can:update-sub-menus');
    Route::post('/sub-menus/{id}/update', [SubmenuController::class, 'update'])->middleware('can:update-sub-menus');
    Route::delete('/sub-menus/{id}/destroy', [SubmenuController::class, 'destroy'])->middleware('can:delete-sub-menus');
    Route::post('/sub-menus/store', [SubmenuController::class, 'store'])->middleware('can:create-sub-menus');

    // Menu Group
    Route::get('/menu-groups', [MenuGroupController::class, 'index'])->middleware('can:read-menu-groups');
    Route::post('/menu-groups/store', [MenuGroupController::class, 'store'])->middleware('can:create-menu-groups');

    //Penjualan
    Route::get('/penjualan', [PenjualanController::class, 'index'])->middleware('can:read-penjualan');
    Route::post('/penjualan/findBarang', [PenjualanController::class, 'findBarang'])->middleware('can:read-penjualan');
    Route::post('/penjualan/tambahBarang', [PenjualanController::class, 'tambahBarang'])->middleware('can:read-penjualan');
    Route::post('/penjualan/payment', [PenjualanController::class, 'payment'])->middleware('can:read-penjualan');
    Route::delete('/penjualan/{id}/deleteDetail', [PenjualanController::class, 'deleteDetail'])->middleware('can:read-penjualan');
    Route::get('/daftar-penjualan', [PenjualanController::class, 'daftarPenjualan'])->middleware('can:read-penjualan');
    Route::get('/daftar-penjualan/{id}/detail', [PenjualanController::class, 'detailPenjualan'])->middleware('can:read-penjualan');
    Route::get('/report-penjualan', [PenjualanController::class, 'report'])->middleware('can:read-report-penjualan');
    Route::get('/report-penjualan/{awal}/{akhir}', [ReportController::class, 'penjualan'])->middleware('can:read-report-penjualan');
    Route::get('/report/{invoice}/struk', [ReportController::class, 'struk'])->middleware('can:read-report-penjualan');

    // Distributor
    Route::prefix('distributor')->middleware('can:read-distributor')->group(function(){
        Route::get('', [DistributorController::class, 'index'])->name('distributor');
        Route::get('create', [DistributorController::class, 'create']);
        Route::post('store', [DistributorController::class, 'store'])->name('distributor.store');
        Route::get('{id}/edit', [DistributorController::class, 'edit']);
        Route::post('{id}/update', [DistributorController::class, 'update'])->name('distributor.update');
        Route::delete('{id}/delete', [DistributorController::class, 'destroy']);
    });
});
