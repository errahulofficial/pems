<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JobPositionStep extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('JobPositionStep', function (Blueprint $table) {
            $table->bigIncrements('jobPositionStepId');
            $table->unsignedBigInteger('jobPositionId');
            $table->integer('stepno');
            $table->string('stepname');
            $table->integer('timespan');
            $table->binary('desc');
            $table->text('colorcode');
            $table->string('status');
            $table->timestamps();
            $table->foreign('jobPositionId')
            ->references('jobPositionId')
            ->on('jobposition')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('JobPositionStep');
    }
}
