<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('business_trip_applications', function (Blueprint $table) {
            $table->string('purpose_travel', 1000)->after('end_date')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('business_trip_applications', function (Blueprint $table) {
            $table->dropColumn('purpose_travel');
        });
    }
};
