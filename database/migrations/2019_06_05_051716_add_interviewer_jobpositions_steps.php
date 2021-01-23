<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInterviewerJobpositionsSteps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_interviewer_jobpositions_steps', function (Blueprint $table) {
            $table->bigIncrements('id_steps');
            $table->bigInteger('jobPositionStep_name');
            $table->string('check_steps_name');
            $table->string('checked_not');
            $table->bigInteger('position_token');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('add_interviewer_jobpositions_steps');
    }
}
