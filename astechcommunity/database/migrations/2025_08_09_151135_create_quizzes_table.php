<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
            $table->foreignId('lesson_id')->nullable()->constrained('lessons')->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->json('questions'); // Store questions and answers in JSON format
            $table->integer('time_limit')->nullable(); // in minutes
            $table->integer('total_marks')->default(0);
            $table->integer('passing_marks')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->index('course_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quizzes');
    }
}
