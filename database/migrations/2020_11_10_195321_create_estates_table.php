<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('estate_type')->index();
            $table->integer('estate_offer_type')->index();
            $table->foreignId('city_id');
            $table->foreignId('area_id');
            $table->foreignId('currency_id');
            $table->string('street')->nullable();
            $table->double('price')->nullable();
            $table->integer('estate_area');
            $table->integer('land_area')->nullable();
            $table->integer('building_area')->nullable();
            $table->integer('building_age')->nullable();
            $table->integer('room_no')->default(0);
            $table->integer('bathroom_no')->default(0);
            $table->integer('halls_no')->default(0);
            $table->integer('floors_no')->default(0);
            $table->integer('elementary_schools_no')->default(0);
            $table->integer('preparatory_schools_no')->default(0);
            $table->integer('secondary_schools_no')->default(0);
            $table->integer('kindergarten_no')->default(0);
            $table->integer('pharmacy_no')->default(0);
            $table->integer('mosque_no')->default(0);
            $table->integer('hospital_no')->default(0);
            $table->integer('bakery_no')->default(0);
            $table->integer('mall_no')->default(0);
            $table->integer('finishing_type')->default(\App\Helpers\Constant::FINISHING_TYPE['No Finishing']);
            $table->text('description')->nullable();
            $table->boolean('has_garage')->default(false);
            $table->boolean('has_well')->default(false);
            $table->boolean('has_public_street_view')->default(false);
            $table->boolean('has_sea_view')->default(false);
            $table->integer('apartment_area')->nullable();
            $table->integer('apartment_floor')->nullable();
            $table->integer('land_interface')->nullable();
            $table->boolean('is_residential')->default(false);
            $table->boolean('is_agricultural')->default(false);
            $table->boolean('is_commercial')->default(false);
            $table->boolean('is_industrial')->default(false);
            $table->boolean('is_taboo')->default(false);
            $table->boolean('is_payment_type_cash')->default(false);
            $table->boolean('is_payment_type_installment')->default(false);
            $table->boolean('is_payment_type_switching')->default(false);
            $table->boolean('has_attic')->default(false);
            $table->integer('shop_length_area')->nullable();
            $table->integer('shop_width_area')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('contact_identity')->nullable();
            $table->string('contact_mobile1')->nullable();
            $table->string('contact_mobile2')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('estates');
    }
}
