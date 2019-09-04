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
            $table->bigIncrements('id');
            $table->date('date')->nullable();
            // $table->text('topic')->nullable();
             $table->string('part_id'); //เลขที่รับส่วนงาน
            //  $table->string('booknum')->nullable();
             $table->string('edoc_type')->nullable(); //ประเภทเอกสาร
             $table->dateTime('start')->nullable(); //วันทีเริ่ม
             $table->dateTime('end')->nullable(); //วันที่สิ้นสุด
            //  $table->text('detail')->nullable();
             $table->string('retirement')->nullable(); //เกษียนหนังสือ
            // $table->string('position')->nullable();
            // $table->string('important')->nullable();
            // $table->string('from')->nullable();
            // $table->string('created_by')->nullable();
            // $table->string('status')->nullable();
            $table->integer('edoc_id')->unsigned();
            $table->foreign('edoc_id')->references('id')->on('edocs')->onDelete('cascade');


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
