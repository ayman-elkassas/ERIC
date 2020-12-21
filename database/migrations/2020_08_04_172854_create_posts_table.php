<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('desc');
            $table->string('post_cover')->nullable();
            //todo:type (text 1,image 2, video 3, audio 4)
            $table->integer('type')->unsigned();
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
        Schema::dropIfExists('posts');
    }
}
