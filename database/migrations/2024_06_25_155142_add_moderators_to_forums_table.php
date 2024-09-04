<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('forums', function (Blueprint $table) {
            $table->text('moderators')->nullable()->after('image');
        });
    }

    public function down(): void
    {
        Schema::table('forums', function (Blueprint $table) {
            $table->dropColumn('moderators');
        });
    }
};
