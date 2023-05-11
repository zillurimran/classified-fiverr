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
        Schema::create('titles', function (Blueprint $table) {
            $table->id();
            $table->string('banner_title');
            $table->string('banner_subTitle');
            $table->string('location_title');
            $table->string('location_subTitle');
            $table->string('category_title');
            $table->string('category_subTitle');
            $table->string('feature_title');
            $table->string('feature_subTitle');
            $table->string('subscribe_title');
            $table->string('subscribe_subTitle');
            $table->string('latest_ad_title');
            $table->string('latest_ad_subTitle');
            $table->string('testimonial_title');
            $table->string('testimonial_subTitle');
            $table->string('blog_title');
            $table->string('blog_subTitle');
            $table->string('about_section1_title');
            $table->string('about_section1_subTitle');
            $table->string('about_section2_title');
            $table->string('about_section2_subTitle');
            $table->string('about_section3_title');
            $table->string('about_section3_subTitle');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('titles');
    }
};
