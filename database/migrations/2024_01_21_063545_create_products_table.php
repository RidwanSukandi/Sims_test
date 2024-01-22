<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid("id")->unique();
            $table->string("kategori", 100)->nullable(false);
            $table->string("nama_barang", 100)->unique()->nullable(false);
            $table->integer("harga_beli")->nullable(false);
            $table->integer("harga_jual")->nullable(false);
            $table->integer("stok_barang")->nullable(false);
            $table->char("image")->nullable(false);
            $table->timestamps();
            $table->foreign('kategori')->references('kategori')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
