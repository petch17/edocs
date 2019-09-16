<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEdocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objective', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->timestamps();
        });

        Schema::create('edocs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('topic')->nullable();
            $table->string('file')->nullable();
            $table->string('real_filename')->nullable();
            $table->string('signature')->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();  
            $table->integer('getx')->nullable(); 
            $table->integer('gety')->nullable();  
            $table->integer('pagelength')->nullable(); 
            $table->string('approveimage')->nullable(); 
            $table->string('status')->nullable(); 
            $table->string('created_by')->nullble();
            // $table->integer('objective_id')->unsigned();
            // $table->foreign('objective_id')->references('id')->on('objective')->onDelete('cascade');

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
        Schema::dropIfExists('objective');
        Schema::dropIfExists('edocs');
    }
}
