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
        Schema::create('riderdeliveries', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('rider_name');
            $table->string('member_name');
            $table->string('member_address');
            $table->string('member_email');
            $table->string('organization_name');
            $table->string('organization_address');
            $table->string('distance');
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
        Schema::dropIfExists('riderdeliveries');
    }
};
