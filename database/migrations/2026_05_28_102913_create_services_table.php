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
        Schema::create('services', function (Blueprint $table) {
            $table->uuid();
            $table->string('name', length: 50);
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->string('phone_number', length: 25);
            $table->string('phone_number2', length: 25)->nullable();
            $table->unsignedBigInteger('sub_category_id');
            $table->unsignedBigInteger('city_id');
            $table->decimal('latitude', total: 10, places: 8);
            $table->decimal('longitude', total: 11, places: 8);
            // Creates a native POINT column restricted to SRID 4326
            $table->geography('coordinates', 'point', 4326);
            $table->boolean('confirmed')->default(0);
            // add show peirority
            $table->json('information')->nullable();
            $table->timestamps();

            $table->foreign('sub_category_id')->references('id')->on('sub_categories');
            $table->foreign('city_id')->references('id')->on('cities');
            // Add a spatial index for fast distance queries
            $table->spatialIndex('coordinates');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
