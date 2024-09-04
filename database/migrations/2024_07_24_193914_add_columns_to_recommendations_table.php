<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('recommendations', function (Blueprint $table) {
            $table->boolean('status')->after('type')->default(0);
            $table->foreignId('user_id')
                ->after('id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('recommendations', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropConstrainedForeignId('user_id');
        });
    }
};
