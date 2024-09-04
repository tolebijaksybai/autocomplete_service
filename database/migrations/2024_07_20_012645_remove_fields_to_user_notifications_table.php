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
        Schema::table('user_notifications', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('message');
            $table->dropColumn('is_sent');
            $table->dropColumn('is_read');
            $table->dropConstrainedForeignId('notification_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_notifications', function (Blueprint $table) {
            $table->boolean('is_read')->after('id')->default(0);
            $table->foreignId('notification_id')->nullable()
                ->after('type')->constrained('notifications')->nullOnDelete();

            $table->boolean('is_sent')->after('id')->default(0);
            $table->string('message')->after('id');
            $table->string('title')->after('id');
        });
    }
};
