<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('id_campagne')->unsigned();
            $table->foreign('id_campagne')
                  ->references('id')
                  ->on('campagnes')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
            $table->string('id_facebook');
            $table->string('nom');
            $table->string('prenom');
            $table->string('date_naissance');
            $table->boolean('validation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('participants', function(Blueprint $table) {
            $table->dropForeign('participants_id_campagne_foreign');
        });
        Schema::drop('participants');
    }
}
