<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('structure_companies', function (Blueprint $table) {
            $table->text('search_title')->after('title')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('structure_companies', function (Blueprint $table) {
            $table->dropColumn(['search_title']);
        });
    }
};
