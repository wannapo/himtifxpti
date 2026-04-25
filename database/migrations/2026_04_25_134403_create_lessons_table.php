<?php

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->bigInteger('id')->nullable();
            $table->bigInteger('module_id')->nullable();
            $table->string('title', 255)->nullable();
            $table->longText('content')->nullable();
            $table->string('content_type', 255)->nullable();
            $table->text('video_url')->nullable();
            $table->integer('order_index')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->text('quiz_question')->nullable();
            $table->longText('quiz_options')->nullable();
            $table->integer('quiz_correct_index')->nullable();
            $table->text('quiz_explanation')->nullable();
            $table->tinyInteger('has_workspace')->nullable();
            $table->text('code_html')->nullable();
            $table->text('code_css')->nullable();
            $table->text('code_js')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}