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
            $table->boolean('has_workspace')->default(false);
            $table->text('code_html')->nullable();
            $table->text('code_css')->nullable();
            $table->text('code_js')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->dropColumn(['has_workspace', 'code_html', 'code_css', 'code_js']);
        });
    }
};
