<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('notify', function (Blueprint $table) {
            // Add name column if it doesn't exist
            if (!Schema::hasColumn('notify', 'name')) {
                $table->string('name', 100)->nullable()->after('email');
            }

            // Add unique constraint if it doesn't exist
            if (!Schema::hasTable('notify')) {
                return; // table doesn't exist, skip
            }

            // Check if unique index doesn't already exist
            $indexExists = collect(Schema::getIndexes('notify'))
                ->where('name', 'notify_email_unique')
                ->first();

            if (!$indexExists) {
                $table->unique('email');
            }
        });
    }

    public function down(): void
    {
        Schema::table('notify', function (Blueprint $table) {
            if (Schema::hasColumn('notify', 'name')) {
                $table->dropColumn('name');
            }

            // Drop unique index if exists
            $table->dropUnique(['email']);
        });
    }
};
