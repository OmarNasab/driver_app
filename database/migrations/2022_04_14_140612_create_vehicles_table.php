<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string("traffic_plate_number")->unique();
            $table->string("type");
            $table->string("model");
            $table->string("place_of_issue");
            $table->date("registration_date");
            $table->date("expiration_date");
            $table->date("insurance_expiration_date");
            $table->string("kilometrage")->nullable();
            $table->string("license_front_side");
            $table->string("license_back_side");
            $table->string("status")->default("0");
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
        Schema::dropIfExists('vehicles');
    }
};
