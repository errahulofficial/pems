<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospects', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('commit_stage');
			$table->string('project_id');
			$table->string('project_name');
			$table->string('website');
			$table->string('company_name');
			$table->string('company_address');
			$table->string('facebook_url');
			$table->string('whatsapp');
			$table->string('contact_phone');
			$table->string('contact_name');
			$table->string('contact_surname');
			$table->string('contact_email');
			$table->string('commit_complete');
			$table->string('commit_schedule');
			$table->string('commit_confirm');
			$table->string('note_title');
			$table->binary('note_description');
			$table->string('created_by');
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
        Schema::dropIfExists('prospects');
    }
}
