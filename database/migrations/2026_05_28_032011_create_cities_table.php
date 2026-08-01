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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name', length: 50);
            $table->string('slug')->unique();
            // $table->geography('longitude', subtype: 'point', srid: 4326);
            // $table->geography('latitude', subtype: 'point', srid: 4326);
            $table->geometry('longitude', subtype: 'point', srid: 0)->nullable();
            $table->geometry('latitude', subtype: 'point', srid: 0)->nullable();
            $table->unsignedBigInteger('district_id');
            $table->timestamps();

            $table->foreign('district_id')->references('id')->on('districts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
