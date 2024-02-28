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
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('kd_anggota');
            $table->string('nm_anggota');
            $table->string('jk');
            $table->string('tp_lahir');
            $table->date('tg_lahir');
            $table->text('alamat');
            $table->string('no_hp');
            $table->string('jns_anggota');
            $table->string('status')->default('active');
            $table->integer('jml_pinjam');
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
        Schema::dropIfExists('anggotas');
    }
};
