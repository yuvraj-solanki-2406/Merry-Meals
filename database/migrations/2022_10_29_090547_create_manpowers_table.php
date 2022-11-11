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
        Schema::create('manpowers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('volnteer_manpower_name');
            $table->string('volnteer_manpower_email');
            $table->string('volnteer_manpower_phone');
            $table->string('volnteer_manpower_days');
            $table->string('volnteer_manpower_hours');
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
        Schema::dropIfExists('manpowers');
    }
};
