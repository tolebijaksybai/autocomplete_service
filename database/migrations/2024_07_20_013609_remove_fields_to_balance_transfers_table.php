<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('balance_transfers', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('message');
            $table->dropColumn('type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('balance_transfers', function (Blueprint $table) {
            $table->string('title');
            $table->string('message');
            $table->boolean('type')->default(0);
        });
    }
};
