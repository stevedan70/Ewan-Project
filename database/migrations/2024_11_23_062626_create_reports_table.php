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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('category');
            $table->string('location');
            $table->string('date_time');
            $table->string('involved_student_name')->nullable();
            $table->string('status');
            $table->text('description')->nullable();
            $table->string('file_1')->nullable();
            $table->string('file_2')->nullable();
            $table->string('file_3')->nullable();
            $table->boolean('is_private')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
