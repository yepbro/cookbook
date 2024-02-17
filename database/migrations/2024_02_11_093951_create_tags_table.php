<?php

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Название');
            $table->string('slug')->unique()->comment('Слаг для урл');
            $table->string('class')->nullable()->comment('Класс для оформления тега');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('article_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Tag::class)->constrained();
            $table->foreignIdFor(Article::class)->constrained();
            $table->unique(['tag_id', 'article_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('article_tag');
        Schema::dropIfExists('tags');
    }
};
