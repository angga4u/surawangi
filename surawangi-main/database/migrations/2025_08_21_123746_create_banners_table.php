<?php

use App\Models\Category;
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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Category::class, 'category_id')->nullable()->constrained()->cascadeOnDelete();

            $table->string('title');
            $table->text('description');
            $table->text('thumbnail');
            $table->string('cta_url')->nullable();
            $table->string('cta_text')->nullable();
            $table->enum('page_type', ['home', 'profile', 'category'])->default('home');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
