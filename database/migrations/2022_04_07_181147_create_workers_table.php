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
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('fatherName');
            $table->bigInteger('academic_title_id')->unsigned()->nullable();
            $table->bigInteger('academic_degree_id')->unsigned()->nullable();
            $table->bigInteger('attraction_id')->unsigned()->nullable();
            $table->bigInteger('aducation_level_id')->unsigned()->nullable();
            $table->bigInteger('position_id')->unsigned()->nullable();
            $table->date('dateStart');
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
        Schema::dropIfExists('workers');
    }
};
