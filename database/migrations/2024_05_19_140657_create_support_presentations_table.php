<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('support_presentations', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->json('documents')->nullable();
            $table->unsignedInteger('position')->default(1);
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('support_presentations');
    }
};
