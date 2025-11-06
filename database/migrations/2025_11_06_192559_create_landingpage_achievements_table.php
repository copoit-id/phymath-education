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
        Schema::create('landingpage_achievements', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('school')->nullable();
            $table->string('achievement');
            $table->string('before_score')->nullable();
            $table->string('after_score')->nullable();
            $table->string('improvement')->nullable();
            $table->string('photo')->nullable();
            $table->text('description')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landingpage_achievements');
    }
};
