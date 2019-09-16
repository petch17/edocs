<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('EMPCODE')->nullable(); //รหัสพนักงงาน
            $table->string('TITLE_TH')->nullable(); //คำนำหน้าชื่อ ไทย
            $table->string('FIRST_NAME_TH')->nullable(); //ชื่อ ไทย
            $table->string('LAST_NAME_TH')->nullable(); //นามสกุล ไทย
            $table->string('TITLE_EN')->nullable(); //คำนำหน้าชื่อ อังกฤษ
            $table->string('FIRST_NAME_EN')->nullable(); //ชื่อ อังกฤษ
            $table->string('LAST_NAME_EN')->nullable(); //นามสกุล อังกฤษ
            $table->string('POS_FULL')->nullable(); //ตำแหน่ง
            $table->string('DEP_ABBR')->nullable(); //แผนก ย่อ
            $table->string('DEP_FULL')->nullable(); //แผนก เต็ม
            $table->string('HIERACHY_CODE')->nullable(); //รหัสลำดับขั้น
            $table->string('ID4DIGIT')->nullable(); //เลขท้าย6ตัว ปชช.
            $table->string('EMAIL')->nullable(); //EMAIL
            $table->string('USER_NAME')->nullable(); //USER_NAME
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
