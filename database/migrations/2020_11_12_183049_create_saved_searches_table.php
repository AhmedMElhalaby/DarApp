<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSavedSearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saved_searches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('city_id')->nullable();
            $table->integer('area_id')->nullable();
            $table->integer('estate_type')->nullable();
            $table->integer('estate_offer_type')->nullable();
            $table->integer('room_no')->nullable();
            $table->integer('bathroom_no')->nullable();
            $table->integer('halls_no')->nullable();
            $table->integer('estate_area')->nullable();
            $table->integer('building_age')->nullable();
            $table->integer('finishing_type')->nullable();
            $table->integer('elementary_schools_no')->nullable();
            $table->integer('preparatory_schools_no')->nullable();
            $table->integer('secondary_schools_no')->nullable();
            $table->integer('kindergarten_no')->nullable();
            $table->boolean('has_sea_view')->nullable();
            $table->boolean('has_well')->nullable();
            $table->boolean('has_public_street_view')->nullable();
            $table->boolean('has_garage')->nullable();
            $table->boolean('is_payment_type_installment')->nullable();
            $table->integer('price_from')->nullable();
            $table->integer('price_to')->nullable();
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
        Schema::dropIfExists('saved_searchs');
    }
}
