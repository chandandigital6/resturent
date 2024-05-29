<?php

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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('heading')->nullable();
            $table->string('title')->nullable();
            $table->string('price')->nullable();
            $table->foreignId('category_id')
                ->constrained('categories')
                ->onDelete('cascade'); // or use 'set null' if you prefer
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
