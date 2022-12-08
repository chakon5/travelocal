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
        Schema::create('menufoods', function (Blueprint $table) {
            $table->id('food_id');
            $table->string('food_name');
            $table->string('food_type');
            $table->string('food_list');
            $table->string('food_note');
            $table->string('food_img')->nullable();
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
        Schema::dropIfExists('menufoods');
    }
};
