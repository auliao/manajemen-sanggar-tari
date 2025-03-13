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
        Schema::create('reports', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('siswa_id')->constrained('siswa')->onDelete('cascade'); // Foreign key to siswa
            $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade'); // Foreign key to kelas
            $table->date('tanggal'); // Tanggal penilaian
            $table->enum('kategori_penilaian', ['Hafalan', 'Wirasa', 'Wirama', 'Wiraga', 'Disiplin']); // Kategori penilaian
            $table->text('deskripsi')->nullable(); // Deskripsi penilaian
            $table->enum('nilai', ['A', 'B', 'C', 'D', 'E']); // Nilai dalam huruf
            $table->text('catatan')->nullable(); // Catatan tambahan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
