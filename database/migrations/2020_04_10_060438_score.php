<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Score extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('score', function (Blueprint $table) {
            $table->increments('id');
			
			$table->string('applicant_id');
			$table->string('scored_by');
			$table->string('score');
			$table->string('int_ques1');
			$table->string('int_ques2');
			$table->string('int_ques3');
			$table->string('int_ques4');
			$table->string('int_ques5');
			$table->string('int_ques6');
			$table->string('int_ques7');
			$table->string('int_ques8');
			$table->string('int_ques9');
			$table->string('int_ques10');
			$table->string('int_ques11');
			$table->string('int_ques12');
			$table->string('int_ques13');
			$table->string('int_ques14');
			$table->string('int_ques15');
			$table->string('int_ques16');
			$table->string('int_ques17');
			$table->string('int_ques18');
			$table->string('int_ques19');
			$table->string('int_ques20');
			$table->string('int_ques21');
			$table->string('int_ques22');
			$table->string('int_ques23');
			$table->string('int_ques24');
			$table->string('int_ques25');
			
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
        Schema::dropIfExists('interviewer_notes');
    }
}
