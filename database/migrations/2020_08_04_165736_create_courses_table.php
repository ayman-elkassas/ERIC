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
            $table->string('field_name');
            $table->string('type_media')->nullable();
            $table->integer('price')->nullable();
            $table->string('category_name')->nullable();
            $table->integer('user_id')->unsigned();//fk
            $table->timestamps();

            //Relationship (1-M)
            $table->foreign('user_id')
                ->references('id')->on('p_users')
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
