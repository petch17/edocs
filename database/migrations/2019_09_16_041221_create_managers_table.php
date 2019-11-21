<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('EMPCODE')->nullable(); //รหัสพนักงงาน
            $table->string('TITLE_TH')->nullable(); //คำนำหน้าชื่อ ไทย
            $table->string('FIRST_NAME_TH')->nullable(); //ชื่อ ไทย
            $table->string('LAST_NAME_TH')->nullable(); //นามสกุล ไทย
            $table->string('TITLE_EN')->nullable(); //คำนำหน้าชื่อ อังกฤษ
            $table->string('FIRST_NAME_EN')->nullable(); //ชื่อ อังกฤษ
            $table->string('LAST_NAME_EN')->nullable(); //นามสกุล อังกฤษ
            $table->string('POS_ABBR')->nullable(); //ตำแหน่งย่อ
            $table->string('POS_FULL')->nullable(); //ตำแหน่งเต็ม
            $table->string('DEP_ABBR')->nullable(); //แผนก ย่อ
            $table->string('DEP_FULL')->nullable(); //แผนก เต็ม
            $table->string('HIERACHY_CODE')->nullable(); //รหัสลำดับขั้น
            $table->string('ID4DIGIT')->nullable(); //เลขท้าย6ตัว ปชช.
            $table->string('EMAILINTRA')->nullable(); //อีเมล์
            $table->string('PHONENUMER')->nullable(); //หมายเลขโทรศัพท์
            $table->boolean('VERIFY_STATUS')->default(false); //อีเมล์
            $table->string('save_signature')->nullable(); //USER_NAME
            $table->string('USER_NAME')->nullable(); //save_signature

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
        Schema::dropIfExists('managers');
    }
}
