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
        Schema::create('rental_ads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category');
            $table->string('rent')->nullable();
            $table->string('badRoom');
            $table->string('bathRoom');
            $table->string('city');
            $table->longText('description');
            $table->longText('address')->nullable();
            $table->string('userName')->nullable();
            $table->string('telNo')->nullable();
            $table->string('altTelNo')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('images')->nullable();
            $table->string('keywords')->nullable();
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
        Schema::dropIfExists('rental_ads');
    }
};
