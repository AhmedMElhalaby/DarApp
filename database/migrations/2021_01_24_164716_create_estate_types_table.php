<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estate_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_ar');
            $table->boolean('land_area')->default(false);
            $table->boolean('building_area')->default(false);
            $table->boolean('building_age')->default(false);
            $table->boolean('apartment_area')->default(false);
            $table->boolean('apartment_floor')->default(false);
            $table->boolean('land_interface')->default(false);
            $table->boolean('shop_length_area')->default(false);
            $table->boolean('shop_width_area')->default(false);
            $table->boolean('room_no')->default(false);
            $table->boolean('bathroom_no')->default(false);
            $table->boolean('halls_no')->default(false);
            $table->boolean('floors_no')->default(false);
            $table->boolean('finishing_type')->default(false);
            $table->boolean('description')->default(false);
            $table->boolean('has_garage')->default(false);
            $table->boolean('has_well')->default(false);
            $table->boolean('has_public_street_view')->default(false);
            $table->boolean('has_sea_view')->default(false);
            $table->boolean('elementary_schools_no')->default(false);
            $table->boolean('preparatory_schools_no')->default(false);
            $table->boolean('secondary_schools_no')->default(false);
            $table->boolean('kindergarten_no')->default(false);
            $table->boolean('pharmacy_no')->default(false);
            $table->boolean('mosque_no')->default(false);
            $table->boolean('hospital_no')->default(false);
            $table->boolean('bakery_no')->default(false);
            $table->boolean('mall_no')->default(false);
            $table->boolean('is_residential')->default(false);
            $table->boolean('is_agricultural')->default(false);
            $table->boolean('is_commercial')->default(false);
            $table->boolean('is_industrial')->default(false);
            $table->boolean('is_taboo')->default(false);
            $table->boolean('has_attic')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estate_types');
    }
}
