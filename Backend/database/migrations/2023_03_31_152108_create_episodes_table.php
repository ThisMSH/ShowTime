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
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('show_id');
            $table->unsignedTinyInteger('episode_type')->default(0); // Requires Premium (1) or not (0)
            $table->string('title', 500);
            $table->string('number');
            $table->text('description');
            $table->string('thumbnail');
            $table->string('video');
            $table->foreign('show_id')->references('id')->on('shows')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodes');
    }
};
