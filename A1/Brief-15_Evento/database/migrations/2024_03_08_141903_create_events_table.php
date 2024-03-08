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
        Schema::create('events', function (Blueprint $table){
                $table->id();
                $table->string('title');
                $table->longText('description');
                $table->dateTime('date');
                $table->foreignId('added_by')->references('id')->on('organizers');
                $table->foreignId('category_id')->references('id')->on('categories');
                $table->string('Address');
                $table->string('poster_image');
                $table->integer('seats');
                $table->integer('available_seats');
                $table->unsignedFloat('seat_price')->nullable();
                $table->enum('status', ['Pending', 'Approved'])->default('Pending');
                $table->enum('confirmation_type', ['automatic', 'manually'])->default('automatic');
                $table->softDeletes();
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
