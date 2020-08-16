<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrefersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prefers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();//fk
            $table->integer('field_id')->unsigned();//fk
            $table->timestamps();

            //Relationships
            $table->foreign('user_id')
                ->references('id')->on('p_users')
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
        Schema::dropIfExists('prefers');
    }
}
