<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharityProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charity_programs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('short_description');
            $table->longText('description');
            $table->string('featured_image')->nullable();
            $table->json('images')->nullable(); // gallery images
            $table->string('program_type'); // education, equipment, mentorship, scholarship
            $table->enum('status', ['planning', 'active', 'completed', 'suspended'])->default('planning');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->decimal('target_amount', 12, 2)->default(0);
            $table->decimal('raised_amount', 12, 2)->default(0);
            $table->string('currency')->default('USD');
            $table->integer('target_beneficiaries')->default(0);
            $table->integer('current_beneficiaries')->default(0);
            $table->string('location')->nullable();
            $table->json('impact_metrics')->nullable(); // custom metrics like students helped, centers opened
            $table->json('success_stories')->nullable(); // beneficiary success stories
            $table->json('partners')->nullable(); // partner organizations
            $table->json('volunteers_needed')->nullable(); // types of volunteers needed
            $table->integer('volunteers_count')->default(0);
            $table->json('donation_tiers')->nullable(); // different donation amounts and their impact
            $table->text('how_to_help')->nullable();
            $table->text('requirements_to_apply')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->boolean('accepting_donations')->default(true);
            $table->boolean('accepting_volunteers')->default(true);
            $table->boolean('accepting_applications')->default(true);
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->timestamps();
            
            $table->index(['program_type', 'status']);
            $table->index(['is_active', 'is_featured']);
            $table->index(['start_date', 'end_date']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('charity_programs');
    }
}
