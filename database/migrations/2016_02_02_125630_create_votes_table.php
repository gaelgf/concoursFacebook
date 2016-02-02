<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('id_photo')->unsigned();
            $table->foreign('id_photo')
                  ->references('id')
                  ->on('photos')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
            $table->integer('id_critere')->unsigned();
            $table->foreign('id_critere')
                  ->references('id')
                  ->on('criteres')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
            $table->date('date');
            $table->integer('valeur');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('votes', function(Blueprint $table) {
            $table->dropForeign('votes_id_photo_foreign');
            $table->dropForeign('votes_id_critere_foreign');
        });
        Schema::drop('votes');
    }
}
