<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang', 30)->unique();
            $table->string('nama', 50);
            $table->foreignId('distributor_id');
            $table->string('satuan', 30);
            $table->string('harga_beli', 30);
            $table->string('harga_r2', 30);
            $table->string('harga_eceran', 30);
            $table->integer('stok');
            $table->integer('isi_per_dus');
            $table->timestamps();
            $table->foreign('distributor_id')->references('id')->on('distributor')->onDelete('cascade')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
