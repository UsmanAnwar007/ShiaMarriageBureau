<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('nationality')->nullable();
            $table->string('country');
            $table->string('city')->nullable();
            $table->integer('country_code');
            $table->string('phonenumber')->unique();
            $table->string('ethnicity')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->text('description')->nullable();
            $table->integer('status')->default('0');
            $table->string('type')->default('user');
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
