<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CareersStepsPage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('careers_steps_page', function (Blueprint $table) {
            $table->bigIncrements('step_id');
            $table->bigInteger('job_position_id');
            $table->binary('introduction');
            $table->string('step1');
            $table->string('step1Type');
            $table->binary('step2');
            $table->string('step3');
            $table->string('step3Type');
            $table->string('step4');
            $table->string('step5');
            $table->string('random_token');
            $table->enum('available_status',['0','1'])->default('1');
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
        Schema::dropIfExists('careers_steps_page');
    }
}
