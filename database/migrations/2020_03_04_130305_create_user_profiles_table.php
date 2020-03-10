<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('height');
            $table->string('marital_status');
            $table->string('language1');
            $table->string('language2');
            $table->string('occupation');
            $table->string('education');
            $table->string('smoking_status');
            $table->string('relocate_status');
            $table->string('cast_status');
            $table->string('converted_to_islam');
            $table->string('major_disabilities');
            $table->string('have_children');
            $table->string('hijab_status');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('user_profiles');
    }
}
