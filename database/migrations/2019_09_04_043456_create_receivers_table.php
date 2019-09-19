<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receivers', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date')->nullable();
            $table->string('part_id')->nullable(); //เลขที่รับส่วนงาน
             $table->string('edoc_type')->nullable(); //ประเภทเอกสาร
             $table->dateTime('start')->nullable(); //วันทีเริ่ม
             $table->dateTime('end')->nullable(); //วันที่สิ้นสุด
            //  $table->text('detail')->nullable();
            // $table->string('retirement')->nullable(); //เกษียนหนังสือ
            // $table->string('position')->nullable();
            // $table->string('important')->nullable();
            // $table->string('from')->nullable();
            // $table->string('created_by')->nullable();
            $table->integer('edoc_id')->unsigned();
            $table->foreign('edoc_id')->references('id')->on('edocs')->onDelete('cascade');
            $table->integer('getx')->nullable();
            $table->integer('gety')->nullable();
            $table->string('path')->nullable();
            $table->string('signnature')->nullable();
            $table->string('status')->nullable();


            $table->timestamps();
        });

        Schema::create('rcdetail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reciver_id')->unsigned();
            $table->foreign('reciver_id')->references('id')->on('receivers')->onDelete('cascade');
            $table->integer('created_by')->nullable(); //ผู้ส่งต่อ
            $table->integer('select_emp')->nullable(); //ผู้รับเอกสาร

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
        Schema::dropIfExists('receivers');
    }
}
