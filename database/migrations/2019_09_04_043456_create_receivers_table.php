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
            $table->integer('edoc_id')->unsigned();
            $table->foreign('edoc_id')->references('id')->on('edocs')->onDelete('cascade');
            $table->date('date')->nullable();
            // $table->timeTz('time')->nullable();
            $table->string('part_num')->nullable(); //เลขที่รับส่วนงาน
            $table->string('edoc_type')->nullable(); //ประเภทเอกสาร
            $table->string('pos_abbr')->nullable(); //ตัวย่อหน่วยงานของผู้รับ
            // $table->integer('retirement')->nullable(); //เกษียณหนังสือ
            //  $table->dateTime('start')->nullable(); //วันทีเริ่ม
            //  $table->dateTime('end')->nullable(); //วันที่สิ้นสุด
            $table->integer('getx')->nullable();
            $table->integer('gety')->nullable();
            $table->string('path')->nullable(); //path
            $table->string('signnature')->nullable(); //ลายเซ็น
            $table->string('status')->nullable(); //สถานะเอกสาร


            $table->timestamps();
        });

        // Schema::create('rcdetails', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->integer('receiver_id')->unsigned();
        //     $table->foreign('receiver_id')->references('id')->on('receivers')->onDelete('cascade');
        //     $table->integer('created_by')->nullable(); //ผู้ส่งต่อ
        //     $table->integer('select_manager')->nullable(); //ผู้รับเอกสาร
        //     $table->string('status')->nullable(); //สถานะเอกสาร

        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receivers');
        // Schema::dropIfExists('rcdetails');
    }
}
