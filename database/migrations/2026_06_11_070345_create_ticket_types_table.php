<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ticket_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();
            $table->string('name');              // Regular, VIP, VVIP
            $table->decimal('price', 12, 2);
            $table->integer('quota');            // total stok tipe ini
            $table->integer('sold')->default(0); // sudah terjual
            $table->text('perks')->nullable();   // fasilitas (opsional)
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ticket_types');
    }
};