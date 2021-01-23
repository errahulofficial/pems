<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CareersUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('careers_users', function (Blueprint $table) {
            $table->bigIncrements('id');
			 $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('phone');
            $table->string('password');
            $table->rememberToken();
            $table->bigInteger('zipcode');
            $table->string('city');
            $table->string('state');
            $table->string('resume');
            $table->string('refer_id');
            $table->string('blacklisted');
            $table->string('time_on_steps_page');
            $table->string('time_on_survey_page');
            $table->string('survey_questions_correct');
            $table->string('survey_questions_wrong');
            $table->string('session_token');
            $table->string('interview_date');
            $table->string('day');
            $table->bigInteger('employee_id');
            $table->bigInteger('job_position');
            $table->bigInteger('job_position_step');
            $table->bigInteger('interview_time_select');
            $table->binary('note_for_interviewer');
            $table->bigInteger('interview_status_id');
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
        Schema::dropIfExists('careers_users');
    }
}
