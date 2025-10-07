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
        Schema::disableForeignKeyConstraints();
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->nullable()->constrained('departments')->restrictOnDelete();
            $table->foreignId('station_id')->nullable()->constrained('stations')->restrictOnDelete();
            $table->foreignId('appoint_status_id')->nullable()->constrained('appoint_statuses')->restrictOnDelete();
            $table->string('role');
            $table->string('type', 20);
            $table->string('other_type')->nullable();
            $table->string('ic', 14)->nullable()->unique();
            $table->string('passport', 100)->nullable()->unique();
            $table->string('name');
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->timestamp('password_last_generated_at')->nullable();
            $table->string('no_hp')->nullable();
            $table->date('tarikh_lantikan')->nullable();
            $table->date('tarikh_lapor_diri')->nullable();
            $table->date('tarikh_tamat_lantikan')->nullable();
            $table->string('tempoh_lantikan')->nullable();
            $table->string('tindakan')->nullable();
            $table->text('catatan')->nullable();
            $table->string('department_code', 30)->nullable();
            $table->string('department_desc')->nullable();
            $table->string('station_code', 30)->nullable();
            $table->string('station_desc')->nullable();
            $table->string('report_department_code', 30)->nullable();
            $table->string('report_department_desc')->nullable();
            $table->string('report_station_code', 30)->nullable();
            $table->string('report_station_desc')->nullable();
            $table->string('jawatan')->nullable();
            $table->string('schema')->nullable();
            $table->string('gred', 30)->nullable();
            $table->string('acting_post')->nullable();
            $table->json('user_image')->nullable();
            $table->boolean('is_blacklist')->default(false);
            $table->text('blacklist_remark')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamp('last_login')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
