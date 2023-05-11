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
        Schema::create('local_services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('city_location')->nullable();
            $table->string('sub_category');
            $table->longText('description')->nullable();
            $table->string('company_name')->nullable();
            $table->string('address')->nullable();
            $table->string('name')->nullable();
            $table->string('telNo')->nullable();
            $table->string('altTelNo')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('contactName');
            $table->string('contactTelNo');
            $table->string('contactEmail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('local_services');
    }
};
