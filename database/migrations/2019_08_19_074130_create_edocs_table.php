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
            $table->text('topic')->nullable(); //เรื่อง
            $table->string('edoc_type')->nullable(); //ประเภทเอกสาร
            $table->string('file')->nullable(); //ชื่อไฟล์
            $table->string('real_filename')->nullable(); //ชื่อไฟล์ของจริง
            $table->string('signature')->nullable(); //ลายเซ็น
            $table->integer('width')->nullable(); //ความกว้าง
            $table->integer('height')->nullable();  //ความสูง
            $table->integer('getx')->nullable(); //ค่า X
            $table->integer('gety')->nullable();  //ค่า Y
            $table->integer('pagelength')->nullable();
            $table->string('approveimage')->nullable();
            $table->string('status')->nullable(); //สถานะ
            // $table->integer('created_by')->nullable(); //สร้างโดยใคร
            $table->integer('select_manager')->nullable(); //เลือกผู้บริหาร
            // $table->string('POS_ABBR')->nullable(); //ส่งถึงใคร
            // $table->integer('objective_id')->unsigned();
            // $table->foreign('objective_id')->references('id')->on('objective')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('edocdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('edoc_id')->unsigned();
            $table->foreign('edoc_id')->references('id')->on('edocs')->onDelete('cascade');
            $table->integer('created_by')->nullable(); //สร้างโดยใคร
            $table->integer('sent_manager')->nullable(); //เลือกผู้บริหาร
            $table->string('status')->nullable(); //สถานะ
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
        Schema::dropIfExists('edocdetails');
    }
}
