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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_type_id')->nullable()->constrained('department_types')->restrictOnDelete();
            $table->string('code', 10)->nullable();
            $table->string('name')->nullable();
            $table->string('reporting_code', 10)->nullable()->unique();
            $table->string('hod_title', 100)->nullable();
            $table->text('address')->nullable();
            $table->timestamps();

            $table->unique(['department_type_id', 'code']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
