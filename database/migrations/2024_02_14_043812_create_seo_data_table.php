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

            $table->boolean('og_off')->default(false)->comment('Отключить Open Graph разметку на странице');
            $table->string('og_title')->nullable()->comment('Open Graph заголовок поста или страницы');
            $table->string('og_type')->nullable()->comment('Open Graph тип передаваемого объекта');
            $table->string('og_url')->nullable()->comment('Open Graph канонический URL, который ведет к объекту');
            $table->string('og_image')->nullable()->comment('Open Graph ссылка на изображение, которое опубликуется при репосте');
            $table->text('og_description')->nullable()->comment('Open Graph ');
            $table->string('og_site_name')->nullable()->comment('Open Graph ');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seo_data');
    }
};
