<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kamar_id')
            ->nullable()
            ->constrained('kamars')
            ->onUpdate('cascade')
            ->onDelete('set null');
            $table->date('tanggal_checkin');
            $table->integer('users_id')->nullable();
            $table->text('spesial_request');
            $table->date('tanggal_checkout');
            $table->integer('jum_kamar_dipesan');
            $table->string('nama_pemesan');
            $table->string('no_hp');
            $table->string('email_pemesan');
            $table->string('nama_tamu');
            $table->enum('status',['pending','checkin','checkout','batal'])->default('pending');
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
        Schema::dropIfExists('pemesanans');
    }
}
