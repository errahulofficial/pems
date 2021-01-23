<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('careersUserId');
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('role')->default('user');
            $table->string('phone')->unique();
            $table->string('city');
            $table->string('state');
            $table->string('zip');
			$table->string('territory');
            $table->string('gender');
			$table->string('home_address');
			$table->string('home_city');
			$table->string('home_state');
			$table->string('home_country');
			$table->string('home_zip');
			$table->string('business_address');
			$table->string('business_city');
			$table->string('business_state');
			$table->string('business_country');
			$table->string('business_zip');
			$table->string('confirm');
			$table->string('division_id');
            $table->string('image');
            $table->string('image_folder');
            $table->string('resume');
            $table->string('resume_folder');
            $table->string('docs');
            $table->string('docs_folder');
            $table->string('password');
            $table->string('skypeid');
			$table->string('manager_assign');
		$table->string('last_login');
		$table->string('password_text');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
