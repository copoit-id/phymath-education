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
        Schema::create('landingpage_heroes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('highlight_text')->nullable();
            $table->string('primary_button_text');
            $table->string('primary_button_url');
            $table->string('secondary_button_text');
            $table->string('secondary_button_url');
            $table->string('stat_1_number');
            $table->string('stat_1_label');
            $table->string('stat_2_number');
            $table->string('stat_2_label');
            $table->string('stat_3_number');
            $table->string('stat_3_label');
            $table->string('background_image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landingpage_heroes');
    }
};
