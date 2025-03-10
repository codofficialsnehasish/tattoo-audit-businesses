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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->enum('type', ['free', 'paid']);
            $table->decimal('price', 10, 2)->nullable();
            $table->foreignId('course_id')->nullable()->constrained()->onDelete('cascade');
            $table->integer('duration_minutes'); // Time limit
            $table->integer('passing_percentage')->default(50);
            $table->tinyInteger('is_visible')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
