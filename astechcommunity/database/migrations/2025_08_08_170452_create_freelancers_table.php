<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreelancersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freelancers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('title'); // e.g., Full Stack Developer
            $table->text('bio');
            $table->string('profile_image')->nullable();
            $table->json('skills'); // array of skills
            $table->decimal('hourly_rate', 8, 2);
            $table->string('currency')->default('USD');
            $table->integer('experience_years');
            $table->string('location');
            $table->boolean('available_remote')->default(true);
            $table->enum('availability_status', ['available', 'busy', 'unavailable'])->default('available');
            $table->decimal('rating', 3, 2)->default(0.00);
            $table->integer('reviews_count')->default(0);
            $table->integer('projects_completed')->default(0);
            $table->json('portfolio_links')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('github_url')->nullable();
            $table->string('website_url')->nullable();
            $table->json('languages')->nullable(); // spoken languages
            $table->text('preferred_project_types')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamp('last_active_at')->nullable();
            $table->timestamps();
            
            $table->index(['is_active', 'availability_status']);
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
        Schema::dropIfExists('freelancers');
    }
}
