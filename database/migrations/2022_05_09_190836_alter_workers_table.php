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
        Schema::table('workers', function (Blueprint $table) {
            $table->foreign('academic_title_id')->references('id')->on('academic_titles');
            $table->foreign('academic_degree_id')->references('id')->on('academic_degrees');
            $table->foreign('attraction_id')->references('id')->on('attractions');
            $table->foreign('aducation_level_id')->references('id')->on('aducation_levels');
            $table->foreign('additional_aducation_id')->references('id')->on('additional_aducations');
            $table->foreign('preparation_id')->references('id')->on('preparations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
