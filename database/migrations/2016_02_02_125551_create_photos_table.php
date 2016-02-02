<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('id_participant')->unsigned();
            $table->foreign('id_participant')
                  ->references('id')
                  ->on('particiants')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
            $table->string('id_photo_facebook');
            $table->string('id_album_facebook');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('photos', function(Blueprint $table) {
            $table->dropForeign('photos_id_participant_foreign');
        });
        Schema::drop('photos');
    }
}
