<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('structure_companies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('parent_id')->nullable()->constrained('structure_companies')->nullOnDelete();
            $table->unsignedInteger('position')->default(1);
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('structure_companies');
    }
};
