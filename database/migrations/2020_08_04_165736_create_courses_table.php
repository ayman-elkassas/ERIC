<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->string('desc', 300);
            $table->integer('type')->unsigned();
            $table->string('price');
            $table->string('course_cover')->nullable();
            $table->integer('user_id')->unsigned();//fk
            $table->integer('field_id')->unsigned();//fk

            $table->timestamps();

            //Relationship (1-M)
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('field_id')
                ->references('id')->on('fields')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
