<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InterviewerDb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addinterviewer', function (Blueprint $table) {
            $table->bigIncrements('addinterviewerid');
            $table->string('employeeName');
            $table->string('intervieweremail');
            $table->string('intervieweremailpass');
            $table->string('monday');
            $table->string('tuesday');
            $table->string('wednesday');
            $table->string('thrusday');
            $table->string('friday');
            $table->string('saturday');
            $table->string('sunday');
            $table->string('main');
            $table->string('add_interview_token');
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
        Schema::dropIfExists('employeedivision');
    }
}
