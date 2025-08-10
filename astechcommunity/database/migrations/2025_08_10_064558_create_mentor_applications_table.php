<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentorApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentor_applications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('profession');
            $table->string('experience_years');
            $table->text('expertise_areas');
            $table->text('bio');
            $table->string('education')->nullable();
            $table->string('certifications')->nullable();
            $table->string('availability')->nullable();
            $table->string('mentorship_type')->nullable(); // 1-on-1, group, workshop
            $table->string('linkedin')->nullable();
            $table->string('portfolio_link')->nullable();
            $table->string('picture')->nullable();
            $table->boolean('willing_to_volunteer')->default(false);
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mentor_applications');
    }
}
