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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id')->constrained();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('vehicle_id')->constrained();
            $table->string("category");
            $table->string("liters")->nullable();
            $table->string("description");
            $table->double("amount");
            $table->string("attachment");
            $table->string("status");
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
        Schema::dropIfExists('expenses');
    }
};
