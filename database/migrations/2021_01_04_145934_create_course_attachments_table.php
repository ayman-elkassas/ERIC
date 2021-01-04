<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_name',200);
            $table->string('file_path',200);
            $table->integer('size');
            $table->integer('course_id')->unsigned();//fk

            $table->timestamps();

            //Relationships
            $table->foreign('course_id')
                ->references('id')->on('courses')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_attachments');
    }
}
