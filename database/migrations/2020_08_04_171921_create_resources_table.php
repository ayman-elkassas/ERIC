<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_name',200);
            $table->string('file_path',200);
            //todo:resource type (1=>txt,2=>pdf,3=>image,4=>video,5=>voice)
            $table->integer('type')->unsigned();
            $table->integer('size');
            $table->string('desc');
            $table->integer('user_id')->unsigned();//fk
            $table->integer('field_id')->unsigned();//fk
            $table->timestamps();

            //Relationships
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
        Schema::dropIfExists('resources');
    }
}
