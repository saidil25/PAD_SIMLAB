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
        Schema::create('parameter_uji', function (Blueprint $table) {
            $table->id();
            $table->integer('id_jenis');
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->integer('tarif')->nullable();
            $table->string('satuan')->nullable();
            $table->string('kode_sni')->nullable();
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
        Schema::dropIfExists('parameter_uji');
    }
};
