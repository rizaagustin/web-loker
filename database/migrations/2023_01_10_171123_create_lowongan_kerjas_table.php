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
        Schema::create('lowongan_kerja', function (Blueprint $table) {
            $table->id();
            // $table->unsignedInteger('user_id')->nullable()->index('fk_lowongan_kerja_to_users');
            $table->foreignId('user_id')->constrained('users');
            $table->string('nama');            
            $table->date('tgl_mulai');
            $table->date('tgl_akhir');            
            $table->string('bagian', 50);            
            $table->string('persyaratan');
            $table->enum('status',['AKTIF','TIDAK AKTIF']);
            $table->timestamps();            
            // $table->foreign('user_id')->references('id')->on('users')
            // ->onDelete('cascade')
            // ->onUpdate('cascade');
        });

        //Buat FK untuk penanda dari mana asal kolom user_id (optional tp baguse d bikin)

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lowongan_kerja');
    }
};
