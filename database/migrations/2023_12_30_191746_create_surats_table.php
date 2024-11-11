<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nomor_surat');
            $table->string('nik');
            $table->string('alamat');
            $table->string('jenis_kelamin');
            $table->string('jenis_surat');
            $table->string('scan1');
            $table->string('scan2');
            $table->string('status');
            $table->date('tgl_surat');
            $table->date('tgl_lahir');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
