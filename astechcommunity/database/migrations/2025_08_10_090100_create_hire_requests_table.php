<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHireRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('hire_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('freelancer_id');
            $table->string('client_name');
            $table->string('client_email');
            $table->text('project_brief');
            $table->string('status')->default('new'); // new, contacted, closed
            $table->timestamps();

            $table->foreign('freelancer_id')->references('id')->on('freelancers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('hire_requests');
    }
}


