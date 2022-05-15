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
        Schema::create('additional_aducations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('additional_type_id')->unsigned()->nullable();
            $table->bigInteger('document_type_id')->unsigned()->nullable();
            $table->date('dataFrom');
            $table->date('dataTo');
            $table->integer('courseVolume');
            $table->integer('certificateSeries');
            $table->integer('certificateNumber');
            $table->date('certificateDate');
            $table->timestamps();
            // FK
            $table->foreign('additional_type_id')->references('id')->on('additional_types');
            $table->foreign('document_type_id')->references('id')->on('document_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('additional_aducations');
    }
};
