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
        Schema::create('profile_desas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('tentang_desa');
            $table->text('gambar');
            $table->text('link_peta');
            $table->text('visi');
            $table->text('misi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
