<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Название параметра настроек');
            $table->string('key')->unique()->comment('Уникальный текстовый ключ');
            $table->text('value')->nullable()->comment('Значение');
            $table->string('description')->nullable()->comment('Описание для админки');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
