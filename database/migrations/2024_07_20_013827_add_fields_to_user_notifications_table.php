<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('user_notifications', function (Blueprint $table) {
            $table->timestamp('read_at')->after('type')->nullable();
            $table->unsignedBigInteger('notifiable_id')->after('type')->nullable();
            $table->string('notifiable_type')->after('type')->nullable();
            $table->text('data')->after('id')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('user_notifications', function (Blueprint $table) {
            $table->dropColumn('data');
            $table->dropColumn('read_at');
            $table->dropColumn('notifiable_type');
            $table->dropColumn('notifiable_id');
        });
    }
};
