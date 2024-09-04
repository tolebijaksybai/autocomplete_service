<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->after('internal_number', function ($table) {
                $table->string('sector')->nullable();       // Направление
                $table->string('job_title')->nullable();    // Должность
                $table->string('department')->nullable();   // Подразделение
                $table->string('team_leader')->nullable();  // Руководитель
            });
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['sector', 'job_title', 'department', 'team_leader']);
        });
    }
};
