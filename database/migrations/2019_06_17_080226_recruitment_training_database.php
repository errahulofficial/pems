<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecruitmentTrainingDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment_training', function (Blueprint $table) {
            $table->bigIncrements('recruitment_training_id');
            $table->bigInteger('recruitment_training_category_id');
            $table->string('title');
            $table->string('duration');
            $table->string('video');
            $table->string('documents');
            $table->enum('completed',['1','0'])->default('0');
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
        Schema::dropIfExists('recruitment_training');
    }
}
