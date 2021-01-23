<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('week_no');
            $table->string('monday');
            $table->string('tuesday');
            $table->string('wednesday');
            $table->string('thrusday');
            $table->string('friday');
            $table->string('saturday');
            $table->string('sunday');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('created_by');
            $table->string('division_id');
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
        Schema::dropIfExists('reports');
    }
}
