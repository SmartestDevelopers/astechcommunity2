<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_pages', function (Blueprint $table) {
            $table->id();
            $table->string('page_name'); // home, about, services, etc.
            $table->string('route_name')->unique(); // Laravel route name
            $table->string('url_path'); // URL path like /about, /services
            $table->string('meta_title');
            $table->text('meta_description');
            $table->text('meta_keywords')->nullable();
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_image')->nullable();
            $table->string('og_type')->default('website');
            $table->string('twitter_card')->default('summary_large_image');
            $table->string('twitter_title')->nullable();
            $table->text('twitter_description')->nullable();
            $table->string('twitter_image')->nullable();
            $table->string('canonical_url')->nullable();
            $table->json('structured_data')->nullable(); // JSON-LD structured data
            $table->string('robots')->default('index, follow');
            $table->text('custom_head_tags')->nullable(); // additional head tags
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->index('route_name');
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seo_pages');
    }
}
