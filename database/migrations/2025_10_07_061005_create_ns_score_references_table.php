<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ns_score_references', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nilai_sepunya_id')->constrained('nilai_sepunyas', 'id')->restrictOnDelete();
            $table->string('skor_penilaian_intervensi_dari', 5);
            $table->string('skor_penilaian_intervensi_hingga', 5);
            $table->string('keterangan_umum', 50);
            $table->string('tindakan');
            $table->foreignId('created_by')->constrained('users', 'id')->restrictOnDelete();
            $table->foreignId('updated_by')->constrained('users', 'id')->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ns_score_references');
    }
};
