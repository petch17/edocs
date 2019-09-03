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
            $table->string('number')->nullable();
            $table->date('date')->nullable();
            $table->text('topic')->nullable();

            // $table->string('part_id'); //เลขที่รับส่วนงาน
            $table->string('booknum')->nullable();
            $table->string('edoc_type')->nullable();
            $table->dateTime('start')->nullable(); //วันทีเริ่ม
            $table->dateTime('end')->nullable(); //วันที่สิ้นสุด
            $table->text('detail')->nullable();
            $table->string('file')->nullable();
            $table->string('retirement')->nullable();
            $table->string('position')->nullable();
            $table->string('important')->nullable();
            $table->string('from')->nullable();
            $table->string('created_by')->nullable();
            $table->string('status')->nullable();
            $table->integer('objective_id')->unsigned();
            $table->foreign('objective_id')->references('id')->on('objective')->onDelete('cascade');

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
