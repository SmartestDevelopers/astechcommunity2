<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('industry');
            $table->string('logo')->nullable();
            $table->string('website_url')->nullable();
            $table->string('contact_email');
            $table->string('contact_phone')->nullable();
            $table->string('contact_person_name')->nullable();
            $table->string('contact_person_title')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('company_size'); // startup, small, medium, enterprise
            $table->integer('employees_count')->nullable();
            $table->year('founded_year')->nullable();
            $table->json('services_needed')->nullable(); // array of services they need
            $table->json('technologies_used')->nullable(); // tech stack they use
            $table->decimal('project_budget_min', 12, 2)->nullable();
            $table->decimal('project_budget_max', 12, 2)->nullable();
            $table->string('partnership_type'); // one-time, ongoing, recruitment
            $table->enum('partnership_status', ['prospect', 'active', 'completed', 'inactive'])->default('prospect');
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('projects_completed')->default(0);
            $table->decimal('satisfaction_rating', 3, 2)->default(0.00);
            $table->text('testimonial')->nullable();
            $table->string('testimonial_author')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->timestamp('last_interaction_at')->nullable();
            $table->timestamps();
            
            $table->index(['industry', 'company_size']);
            $table->index(['partnership_status', 'is_active']);
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
        Schema::dropIfExists('clients');
    }
}
