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
        Schema::create('taxi_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('full_name')->nullable();
            $table->string('phone')->nullable();
            $table->dateTime('call_date')->nullable();
            $table->string('message', 2000)->nullable();
            $table->string('location_a')->nullable();
            $table->string('location_b')->nullable();
            $table->string('other_full_name')->nullable();
            $table->string('other_phone')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taxi_orders');
    }
};
