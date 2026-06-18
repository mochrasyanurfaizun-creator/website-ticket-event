<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category');
            $table->string('venue');
            $table->string('city');
            $table->date('event_date');
            $table->time('event_time');
            $table->decimal('price_start', 10, 2);
            $table->integer('capacity');
            $table->integer('tickets_sold')->default(0);
            $table->text('description')->nullable();
            $table->string('accent_color')->default('#f4561e');
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_trending')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};