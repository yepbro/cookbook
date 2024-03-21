<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->comment('Автор')->constrained('moonshine_users');
            $table->string('heading')->comment('Заголовок');
            $table->string('slug')->unique()->comment('Слаг для урл');
            $table->text('content')->nullable()->comment('Контент');
            $table->boolean('is_published')->default(false)->comment('Признак, что статья опубликована');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
