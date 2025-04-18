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
        Schema::create('id_risikos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kode_risiko_id');
            $table->string('id_risiko');
            $table->string('kategori_risiko');
            $table->string('area_dampak');
            $table->text('sasaran_strategi');
            $table->text('indikator_kinerja');
            $table->text('proses_tahapan');
            $table->string('kriteria_kemungkinan');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('id_risikos');
    }
};
