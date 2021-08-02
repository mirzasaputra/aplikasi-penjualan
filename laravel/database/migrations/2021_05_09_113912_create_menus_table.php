<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_group_id')->nullable();
            $table->enum('type', ['Backend', 'Frontend']);
            $table->string('title');
            $table->string('url');
            $table->string('icon')->nullable();
            $table->enum('target', ['none', '_blank']);
            $table->integer('position');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->foreign('menu_group_id')->references('id')->on('menu_groups')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
