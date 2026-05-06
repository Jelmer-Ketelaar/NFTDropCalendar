<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('drop_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('drop_id')->index();
            $table->string('name', 100);
            $table->string('email', 100);
            $table->tinyInteger('rating')->unsigned(); // 1-5
            $table->text('review');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('drop_reviews');
    }
};
