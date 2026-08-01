<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('name_en')->nullable()->after('name');
            $table->text('information_en')->nullable()->after('information');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->string('name_en')->nullable()->after('name');
        });

        Schema::table('sub_categories', function (Blueprint $table) {
            $table->string('name_en')->nullable()->after('name');
        });

        Schema::table('governorates', function (Blueprint $table) {
            $table->string('name_en')->nullable()->after('name');
        });

        Schema::table('districts', function (Blueprint $table) {
            $table->string('name_en')->nullable()->after('name');
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->string('name_en')->nullable()->after('name');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['name_en', 'information_en']);
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('name_en');
        });

        Schema::table('sub_categories', function (Blueprint $table) {
            $table->dropColumn('name_en');
        });

        Schema::table('governorates', function (Blueprint $table) {
            $table->dropColumn('name_en');
        });

        Schema::table('districts', function (Blueprint $table) {
            $table->dropColumn('name_en');
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->dropColumn('name_en');
        });
    }
};
