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
        Schema::create('user_opinions', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->foreignId('author_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('department')->nullable();
            $table->text('message')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_opinions');
    }
};
