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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasien'); // Nama pasien
            $table->date('ttl'); // Tanggal lahir pasien
            $table->integer('usia'); // Usia pasien
            $table->enum('sex', ['L', 'P']); // Jenis kelamin: Laki-laki (L) atau Perempuan (P)
            $table->text('alamat'); // Alamat pasien
            $table->string('no_hp'); // Nomor HP pasien
            $table->string('diagnosa'); // Diagnosa hasil pemeriksaan mata
            $table->string('od_sph')->nullable(); // SPH mata kanan
            $table->string('od_cyl')->nullable(); // CYL mata kanan
            $table->string('od_axis')->nullable(); // Axis mata kanan
            $table->string('os_sph')->nullable(); // SPH mata kiri
            $table->string('os_cyl')->nullable(); // CYL mata kiri
            $table->string('os_axis')->nullable(); // Axis mata kiri
            $table->string('pd')->nullable(); // Pupillary distance
            $table->string('photo')->nullable();
            $table->date('tgl_pemeriksaan'); // Tanggal pemeriksaan mata
            $table->date('tgl_pengambilan')->nullable(); // Tanggal pengambilan kacamata (opsional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
