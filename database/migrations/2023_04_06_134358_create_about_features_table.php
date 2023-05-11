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
        Schema::create('about_features', function (Blueprint $table) {
            $table->id();
            $table->string('feature1_icon');
            $table->string('feature1_title');
            $table->string('feature1_subTitle');
            $table->string('feature2_icon');
            $table->string('feature2_title');
            $table->string('feature2_subTitle');
            $table->string('feature3_icon');
            $table->string('feature3_title');
            $table->string('feature3_subTitle');
            $table->string('feature4_icon');
            $table->string('feature4_title');
            $table->string('feature4_subTitle');
            $table->string('feature5_icon');
            $table->string('feature5_title');
            $table->string('feature5_subTitle');
            $table->string('feature6_icon');
            $table->string('feature6_title');
            $table->string('feature6_subTitle');
            $table->string('feature7_icon');
            $table->string('feature7_title');
            $table->string('feature7_subTitle');
            $table->string('feature8_icon');
            $table->string('feature8_title');
            $table->string('feature8_subTitle');
            $table->string('feature9_icon');
            $table->string('feature9_title');
            $table->string('feature9_subTitle');
            $table->string('feature10_icon');
            $table->string('feature10_title');
            $table->string('feature10_subTitle');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_features');
    }
};
