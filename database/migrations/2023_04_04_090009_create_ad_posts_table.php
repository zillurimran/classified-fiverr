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
        Schema::create('ad_posts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string('ad_title')->nullable();
            $table->bigInteger('category_id')->nullable();
            $table->bigInteger('package_id')->nullable();
            $table->decimal('price', 6,2);
            $table->string('ad_type')->nullable();
            $table->longText('short_desc')->nullable();
            $table->longText('long_desc')->nullable();
            $table->string('address')->nullable();
            $table->string('property_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->bigInteger('views')->nullable();
            $table->longText('product_location')->nullable();
            $table->integer('reacts')->default(0);
            $table->string('phone')->nullable();
            $table->longText('website')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ad_posts');
    }
};
