<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('manager_id')->nullable()
                ->after('department')->constrained('users')->nullOnDelete();

            $table->dropColumn('sector');
            $table->dropColumn('team_leader');
            $table->dropColumn('team_leader_job_title');
            $table->dropColumn('dn');
            $table->dropColumn('object_category');
        });
    }


    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropConstrainedForeignId('manager_id');

            $table->string('sector')->after('hobbies_interests')->nullable();
            $table->string('team_leader')->after('hobbies_interests')->nullable();
            $table->string('team_leader_job_title')->after('hobbies_interests')->nullable();
            $table->string('dn')->after('hobbies_interests')->nullable();
            $table->string('object_category')->after('hobbies_interests')->nullable();
        });
    }
};
