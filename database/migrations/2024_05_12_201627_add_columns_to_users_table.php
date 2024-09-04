<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->after('hobbies_interests', function ($table) {
                $table->string('dn', 500)->nullable();
                $table->string('object_category', 500)->nullable();
            });
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['dn', 'object_category']);
        });
    }
};
