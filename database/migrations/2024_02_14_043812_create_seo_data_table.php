<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('seo_data', function (Blueprint $table) {
            $table->id();
            $table->morphs('seoable');
            $table->string('title')->nullable()->comment('Тег TITLE');
            $table->string('header')->nullable()->comment('Тег H1');
            $table->string('canonical')->nullable()->comment('Canonical Url');
            $table->text('keywords')->nullable()->comment('Мета тег description');
            $table->text('description')->nullable()->comment('Мета тег keywords');
            $table->boolean('noindex')->default(false)->comment('Мета тег robots, не индексировать страницу');
            $table->boolean('nofollow')->default(false)->comment('Мета тег robots, не следовать далее по ссылкам');
            $table->text('text_before')->nullable()->comment('Текст на странице до основного контента');
            $table->text('text_after')->nullable()->comment('Текст на странице после основного контента');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seo_data');
    }
};
