<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->after('cabinet_address', function (Blueprint $table) {
                $table->string('city', 150)->nullable();
                $table->string('street', 150)->nullable();
                $table->string('floor', 150)->nullable();
                $table->string('cabinet_number', 150)->nullable();
            });

            $table->string('team_leader_job_title', 150)->after('team_leader')->nullable();
            $table->integer('birthday_amount')->after('birthday')->default(0);

            $table->string('first_name', 100)->change();
            $table->string('middle_name', 100)->change();
            $table->string('last_name', 100)->change();

            $table->string('personal_number', 100)->change();
            $table->string('work_number', 100)->change();
            $table->string('internal_number', 100)->change();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(array(
                'city', 'street', 'floor', 'cabinet_number',
                'team_leader_job_title',
                'birthday_amount',
            ));

            $table->string('first_name', 64)->change();
            $table->string('middle_name', 64)->change();
            $table->string('last_name', 64)->change();

            $table->string('personal_number', 36)->change();
            $table->string('work_number', 36)->change();
            $table->string('internal_number', 36)->change();
        });
    }
};
