<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('longtext', function (Blueprint $table) {
            $connection = config('audit.drivers.database.connection', config('database.default'));
            $table = config('audit.drivers.database.table', 'audits');

            Schema::connection($connection)->table($table, function (Blueprint $table) {
                $table->longText('old_values')->nullable()->change();
                $table->longText('new_values')->nullable()->change();
            });
        });
    }

    public function down(): void
    {
        Schema::table('longtext', function (Blueprint $table) {
            $connection = config('audit.drivers.database.connection', config('database.default'));
            $table = config('audit.drivers.database.table', 'audits');

            Schema::connection($connection)->table($table, function (Blueprint $table) {
                $table->text('old_values')->after('auditable')->nullable()->change();
                $table->text('new_values')->after('auditable')->nullable()->change();
            });
        });
    }
};
