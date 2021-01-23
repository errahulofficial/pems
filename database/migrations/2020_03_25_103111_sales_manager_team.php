<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SalesManagerTeam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_team', function (Blueprint $table) {
            $table->bigIncrements('teamid');
            $table->string('sales_person_id');
			$table->string('sales_person_name');
			$table->string('sales_person_email');
			$table->string('sales_person_skype');
			$table->string('sales_person_phone');
            $table->string('assigned_manager_id');
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
         Schema::dropIfExists('sales_team');
    }
}
