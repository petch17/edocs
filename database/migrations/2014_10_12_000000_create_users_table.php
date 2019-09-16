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
        Schema::create('empcode', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('EMPCODE')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->string('TITLE_TH')->nullable();
            // $table->string('FIRST_NAME_TH')->nullable();
            // $table->string('LAST_NAME_TH')->nullable();
            // $table->string('TITLE_EN')->nullable();
            // $table->string('FIRST_NAME_EN')->nullable();
            // $table->string('LAST_NAME_EN')->nullable();
            // $table->string('POS_FULL')->nullable();
            // $table->string('DEP_ABBR')->nullable();
            // $table->string('DEP_FULL')->nullable();
            // $table->string('HIERACHY_CODE')->nullable();
            // $table->string('ID4DIGIT')->nullable();
            // $table->string('EMAILINTRA')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->integer('EMPCODE')->unsigned()->nullable();
            // $table->foreign('EMPCODE_ID')->references('id')->on('empcode')->onDelete('cascade');
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
