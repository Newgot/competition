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
        Schema::create('aducation_levels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('code');
            $table->bigInteger('preparation_level_id')->unsigned()->nullable();
            $table->timestamps();
            // FK
            $table->foreign('preparation_level_id')->references('id')->on('preparation_levels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aducation_levels');
    }
};
