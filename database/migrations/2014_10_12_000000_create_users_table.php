<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('first_name', 64)->index();
            $table->string('middle_name', 64)->nullable();
            $table->string('last_name', 64)->index()->nullable();

            $table->string('personal_number', 36)->nullable();
            $table->string('work_number', 36)->nullable();
            $table->string('internal_number', 36)->nullable();

            $table->date('birthday')->nullable();

            $table->string('email', 72)->index()->nullable();
            $table->timestamp('email_verified_at')->nullable();

            $table->string('photo', 200)->nullable();

            $table->unsignedInteger('balance')->default(0);

            $table->string('password');
            $table->rememberToken();

            $table->string('cabinet_address', 150)->nullable();

            $table->text('about_me')->nullable();
            $table->text('hobbies_interests')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
