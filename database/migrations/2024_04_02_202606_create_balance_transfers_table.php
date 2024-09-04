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
        Schema::create('balance_transfers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('sender_id')
                ->comment('отправитель')
                ->nullable()->constrained('users')->nullOnDelete();

            $table->foreignId('receiver_id')
                ->comment('получатель')
                ->constrained('users')->cascadeOnDelete();

            $table->unsignedBigInteger('amount')->default(0);
            $table->string('title', 1000)->nullable();
            $table->string('message', 1000)->nullable();

            $table->boolean('type')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balance_transfers');
    }
};
