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
        Schema::create('nilai_sepunyas', function (Blueprint $table) {
            $table->id();
            $table->string('year', 10);
            $table->integer('jumlah_penilai_min')->default(0);
            $table->integer('jumlah_penilai_max')->default(0);
            $table->date('tarikh_mula_1');
            $table->date('tarikh_akhir_1');
            $table->date('tarikh_mula_2')->nullable();
            $table->date('tarikh_akhir_2')->nullable();
            $table->date('tarikh_mula_3')->nullable();
            $table->date('tarikh_akhir_3')->nullable();
            $table->date('tarikh_mula_4')->nullable();
            $table->date('tarikh_akhir_4')->nullable();
            $table->date('tarikh_mula_5')->nullable();
            $table->date('tarikh_akhir_5')->nullable();
            $table->text('catatan')->nullable();
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
        Schema::dropIfExists('nilai_sepunyas');
    }
};
