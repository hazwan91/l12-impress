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
        Schema::create('ns_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nilai_sepunya_id')->constrained('nilai_sepunyas', 'id')->restrictOnDelete();
            $table->foreignId('ns_bank_question_id')->constrained('ns_bank_questions', 'id')->restrictOnDelete();
            $table->integer('ordering')->nullable();
            $table->boolean('active');
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
        Schema::dropIfExists('ns_questions');
    }
};
