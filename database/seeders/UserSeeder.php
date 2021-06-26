<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $adminRole = User::create([
            'name' => 'Mirza Saputra',
            'username' => 'mirza23',
            'email' => 'mirza@gmail.com',
            'password' => Hash::make('1234'),
            'block' => 'N',
            'phone_number' => '085736274637',
            'created_by' => '1',
            'updated_by' => '1',
        ]);

        $adminRole->assignRole('Administrator');

        $developerRole = User::create([
            'name' => 'root',
            'username' => 'root',
            'email' => 'root@gmail.com',
            'password' => Hash::make('root'),
            'block' => 'N',
            'phone_number' => 'root',
            'created_by' => '1',
            'updated_by' => '1',
        ]);

        $developerRole->assignRole('Developer');
    }
}
