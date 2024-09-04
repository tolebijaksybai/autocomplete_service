<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('structure_users', function (Blueprint $table) {
            $table->boolean('is_head')->after('user_id')->default(0);
        });
    }

    public function down(): void
    {
        Schema::table('structure_users', function (Blueprint $table) {
            $table->dropColumn('is_head');
        });
    }
};
