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
        Schema::create('comptetence_workers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('competence_id')->unsigned()->nullable();
            $table->bigInteger('worker_id')->unsigned()->nullable();
            $table->timestamps();
            // FK
            $table->foreign('competence_id')->references('id')->on('competences');
            $table->foreign('worker_id')->references('id')->on('workers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comptetence_workers');
    }
};
