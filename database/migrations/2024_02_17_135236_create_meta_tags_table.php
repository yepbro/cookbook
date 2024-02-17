<?php

use App\Enums\MetaTagType;
use App\Models\SeoData;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('meta_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(SeoData::class)->constrained('seo_data')->cascadeOnDelete();
            $table->string('type')->default(MetaTagType::NAME->value)->comment('Имя атрибута');
            $table->string('name')->comment('Значение атрибута name/property');
            $table->string('content')->nullable()->comment('Значение атрибута content');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('meta_tags');
    }
};
