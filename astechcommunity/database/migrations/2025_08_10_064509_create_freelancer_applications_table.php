<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreelancerApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freelancer_applications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('profession')->nullable();
            $table->string('region')->nullable();
            $table->json('skills')->nullable();
            $table->text('about');
            $table->string('portfolio_link')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('fiverr')->nullable();
            $table->string('facebook')->nullable();
            $table->string('upwork')->nullable();
            $table->string('picture')->nullable();
            $table->boolean('apply_for_interview')->default(false);
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
        Schema::dropIfExists('freelancer_applications');
    }
}
