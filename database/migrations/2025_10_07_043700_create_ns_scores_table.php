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
        Schema::create('ns_scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ns_scorer_id')->constrained('ns_scorers', 'id')->restrictOnDelete();
            $table->foreignId('ns_question_id')->constrained('ns_questions', 'id')->restrictOnDelete();
            $table->string('skor', 10)->default(0);
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
        Schema::dropIfExists('ns_scores');
    }
};
