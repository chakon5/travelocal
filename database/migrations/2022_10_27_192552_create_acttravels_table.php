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
        Schema::create('acttravels', function (Blueprint $table) {
            $table->id('acttravel_id');
            $table->string('acttravel_name');
            $table->string('acttravel_type');
            $table->string('acttravel_list');
            $table->string('acttravel_note');
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
        Schema::dropIfExists('acttravels');
    }
};
