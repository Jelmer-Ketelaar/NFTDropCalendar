<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Convert string 'true'/'false' to boolean 1/0 in projects table
        DB::statement("UPDATE projects SET verified = CASE WHEN verified = 'true' THEN 1 ELSE 0 END");
        DB::statement("UPDATE projects SET updateStatus = CASE WHEN updateStatus = 'true' THEN 1 ELSE 0 END");

        Schema::table('projects', function (Blueprint $table) {
            $table->boolean('verified')->default(false)->change();
            $table->boolean('updateStatus')->default(false)->change();
        });

        // Same for projectsExist
        DB::statement("UPDATE projectsExist SET verified = CASE WHEN verified = 'true' THEN 1 ELSE 0 END");
        DB::statement("UPDATE projectsExist SET updateStatus = CASE WHEN updateStatus = 'true' THEN 1 ELSE 0 END");

        Schema::table('projectsExist', function (Blueprint $table) {
            $table->boolean('verified')->default(false)->change();
            $table->boolean('updateStatus')->default(false)->change();
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('verified')->default('false')->change();
            $table->string('updateStatus')->default('')->change();
        });
        DB::statement("UPDATE projects SET verified = CASE WHEN verified = 1 THEN 'true' ELSE 'false' END");
        DB::statement("UPDATE projects SET updateStatus = CASE WHEN updateStatus = 1 THEN 'true' ELSE '' END");

        Schema::table('projectsExist', function (Blueprint $table) {
            $table->string('verified')->default('false')->change();
            $table->string('updateStatus')->default('')->change();
        });
        DB::statement("UPDATE projectsExist SET verified = CASE WHEN verified = 1 THEN 'true' ELSE 'false' END");
        DB::statement("UPDATE projectsExist SET updateStatus = CASE WHEN updateStatus = 1 THEN 'true' ELSE '' END");
    }
};
