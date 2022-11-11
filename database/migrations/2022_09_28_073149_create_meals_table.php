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
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->integer('partner_id');
            $table->integer('user_id');
            $table->string('meal_name');
            $table->string('meal_type');
            $table->string('meal_image');
            $table->string('partner_organization');
            $table->string('partner_address');
            $table->string('partner_latitude');
            $table->string('partner_longitude');
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
        Schema::dropIfExists('meals');
    }
};
