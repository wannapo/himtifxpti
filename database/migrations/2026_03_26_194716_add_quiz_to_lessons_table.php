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
        Schema::table('lessons', function (Blueprint $table) {
            $table->text('quiz_question')->nullable();
            $table->json('quiz_options')->nullable(); // stored as JSON array of strings
            $table->integer('quiz_correct_index')->nullable(); // 0-based index
            $table->text('quiz_explanation')->nullable(); // optional explanation shown after answer
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->dropColumn(['quiz_question', 'quiz_options', 'quiz_correct_index', 'quiz_explanation']);
        });
    }
};
