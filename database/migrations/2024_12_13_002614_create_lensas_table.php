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
        Schema::create('lensas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lensa'); 
            $table->text('deskripsi')->nullable(); 
            $table->string('material')->nullable(); 
            $table->integer('harga_lensa');
            $table->string('jenis', 50); 
            $table->integer('stok')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lensas');
    }
};
