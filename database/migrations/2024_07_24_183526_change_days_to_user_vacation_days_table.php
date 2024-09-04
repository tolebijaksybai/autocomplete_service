<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('user_vacation_days', function (Blueprint $table) {
            $table->integer('days')->default(0)->change();
        });
    }

    public function down(): void
    {
        Schema::table('user_vacation_days', function (Blueprint $table) {
            $table->unsignedInteger('days')->default(0)->change();
        });
    }
};
