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
            // $table->integer('edoc_id')->unsigned();
            // $table->foreign('edoc_id')->references('id')->on('edocs')->onDelete('cascade');
            $table->string('part_num')->nullable(); //เลขที่รับส่วนงาน
            $table->string('edoc_type')->nullable(); //ประเภทเอกสาร
            $table->string('objective')->nullable(); //วัตถุประสงค์
            $table->string('pos_abbr')->nullable(); //ตัวย่อหน่วยงานของผู้รับ
            $table->string('retirement')->nullable(); //เกษียณหนังสือ
            $table->string('file')->nullable(); //ชื่อไฟล์
            $table->string('real_filename')->nullable(); //ชื่อไฟล์ของจริง
            $table->date('date')->nullable();
            $table->time('times')->nullable();
            $table->integer('created_by')->nullable(); //สร้างโดยใคร
            $table->integer('select_manager')->nullable(); //เลือกผู้บริหาร
            //  $table->dateTime('start')->nullable(); //วันทีเริ่ม
            //  $table->dateTime('end')->nullable(); //วันที่สิ้นสุด
            $table->integer('width')->nullable(); //ความกว้าง
            $table->integer('height')->nullable();  //ความสูง
            $table->integer('getx')->nullable();
            $table->integer('gety')->nullable();
            $table->string('path')->nullable(); //path
            $table->integer('pagelength')->nullable();
            $table->string('signature')->nullable(); //ลายเซ็น
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
