<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InterviewStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviewstatus', function (Blueprint $table) {
            $table->bigIncrements('interviewstatusid');
            $table->string('name');
            $table->string('colorcode');
            $table->string('jobPositionId');
            $table->string('jobPositionStepid');
            $table->string('jobPositionStepName');
            $table->string('emailSubject');
            $table->string('EmailFromAddress');
            $table->string('EmailFromAddressPass');
            $table->string('EmailFromName');
            $table->string('variables');
            $table->longText('HTMLMessage');
            $table->longText('TextMessage');
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
        Schema::dropIfExists('interviewstatus');
    }
}
