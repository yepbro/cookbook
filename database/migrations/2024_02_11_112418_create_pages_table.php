<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Название');
            $table->string('slug')->unique()->comment('Слаг для урл');
            $table->text('content')->comment('Контент');
            $table->boolean('is_published')->default(false)->comment('Признак, что страница опубликована');
            $table->boolean('show_in_menu')->default(false)->comment('Признак, что страница должна быть выведена в меню');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
