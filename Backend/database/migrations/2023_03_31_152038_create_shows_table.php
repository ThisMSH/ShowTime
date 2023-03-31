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
        Schema::create('shows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('show_type');
            $table->unsignedBigInteger('show_added_by');
            $table->string('title', 500);
            $table->string('season');
            $table->string('cover');
            $table->string('wide_cover')->nullable();
            $table->text('description');
            $table->unsignedBigInteger('sequel')->nullable();
            $table->unsignedBigInteger('prequel')->nullable();
            $table->foreign('show_type')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('show_added_by')->references('id')->on('users')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('sequel')->references('id')->on('shows')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('prequel')->references('id')->on('shows')->onDelete('no action')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shows');
    }
};
