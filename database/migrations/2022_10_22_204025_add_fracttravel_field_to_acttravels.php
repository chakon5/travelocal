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
        Schema::table('acttravels', function (Blueprint $table) {
            $table->unsignedBigInteger('typetv_id')->nullable()->after('at_id');
            $table->foreign('typetv_id')->references('typetv_id')->on('type_travels')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('acttravels', function (Blueprint $table) {
            $table->dropColumn('typetv_id');
        });
    }
};
