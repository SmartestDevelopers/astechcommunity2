<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('title'); // e.g., Senior Full Stack Developer
            $table->string('company')->nullable(); // e.g., Google, Microsoft
            $table->text('bio');
            $table->string('profile_image')->nullable();
            $table->json('expertise_areas'); // array of expertise areas
            $table->integer('experience_years');
            $table->string('location');
            $table->boolean('available_remote')->default(true);
            $table->json('available_time_slots')->nullable(); // available times for mentoring
            $table->decimal('session_rate', 8, 2)->nullable(); // rate per session
            $table->string('currency')->default('USD');
            $table->integer('max_mentees_per_month')->default(5);
            $table->decimal('rating', 3, 2)->default(0.00);
            $table->integer('reviews_count')->default(0);
            $table->integer('mentoring_sessions_completed')->default(0);
            $table->integer('total_mentees')->default(0);
            $table->string('linkedin_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('github_url')->nullable();
            $table->string('personal_website')->nullable();
            $table->json('languages')->nullable(); // spoken languages
            $table->text('mentoring_style')->nullable();
            $table->json('success_stories')->nullable(); // mentee success stories
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->boolean('accepting_new_mentees')->default(true);
            $table->timestamp('last_active_at')->nullable();
            $table->timestamps();
            
            $table->index(['is_active', 'accepting_new_mentees']);
            $table->index(['rating', 'reviews_count']);
            $table->index('is_featured');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mentors');
    }
}
