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
        Schema::create('bookingpays', function (Blueprint $table) {
            $table->id('pay_id');
            $table->date('pay_date');
            $table->integer('pay_amount');
            $table->string('pay_img')->nullable();
            $table->integer('pay_status');
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
        Schema::dropIfExists('bookingpays');
    }
};
