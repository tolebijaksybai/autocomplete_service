<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('vacation_applications', function (Blueprint $table) {
            $table->string('acting_duty')->nullable()->after('user_vacation_day_id');
        });
    }

    public function down(): void
    {
        Schema::table('vacation_applications', function (Blueprint $table) {
            $table->dropColumn('acting_duty');
        });
    }
};
