<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('projectsExist')) {
            return;
        }

        Schema::create('projectsExist', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable();
            $table->text('description')->nullable();
            $table->string('blockchain', 50)->nullable();
            $table->string('category', 50)->nullable();
            $table->string('thumbnail', 255)->nullable();
            $table->string('traits', 50)->nullable();
            $table->string('floorPrice', 50)->nullable();
            $table->text('roadmap')->nullable();
            $table->string('volume', 50)->nullable();
            $table->string('royality', 50)->nullable();
            $table->string('supply', 50)->nullable();
            $table->string('teamAmount', 50)->nullable();
            $table->string('twitterName', 100)->nullable();
            $table->string('discordLink', 255)->nullable();
            $table->string('websiteLink', 255)->nullable();
            $table->string('emailContact', 100)->nullable();
            $table->integer('discordMemberNumber')->default(0);
            $table->integer('twitterFollowerNumber')->default(0);
            $table->string('signature', 255)->nullable();
            $table->string('promoted', 50)->default('promote2');
            $table->string('marketplaceLink', 255)->nullable();
            $table->string('verified', 10)->default('false');
            $table->string('updateStatus', 50)->nullable();
            $table->string('ethChoice', 50)->nullable();
            $table->timestamp('dateUploadDropUser')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projectsExist');
    }
};
