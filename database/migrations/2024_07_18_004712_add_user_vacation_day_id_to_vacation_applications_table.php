<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('vacation_applications', function (Blueprint $table) {
            $table->foreignId('user_vacation_day_id')
                ->after('end_date')
                ->nullable()
                ->constrained('user_vacation_days')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('vacation_applications', function (Blueprint $table) {
            $table->dropConstrainedForeignId('user_vacation_day_id');
        });
    }
};
