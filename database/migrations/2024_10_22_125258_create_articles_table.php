<?php

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('small_text');
            $table->longText('content');
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_popular')->default(false);
            $table->foreignIdFor(Category::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Tag::class)->constrained()->onDelete('cascade');
            // meta-pole
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('meta_keywords');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
