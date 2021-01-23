<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portals', function (Blueprint $table) {
            $table->increments('id');
			$table->string('shortcode');
			$table->string('division_id');
			$table->string('city');
			$table->string('portal');
			$table->string('position');
			$table->string('inbound_url');
			$table->string('outbound_url');
			$table->string('url');
			$table->string('status');
			$table->string('date');
			$table->string('count');
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
        Schema::dropIfExists('portals');
    }
}
