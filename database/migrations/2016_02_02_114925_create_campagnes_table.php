<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampagnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campagnes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('logo_entreprise');
            $table->string('nom_campagne');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('couleur');
            $table->string('url_icone');
            $table->string('text_accueil');
            $table->string('text_felicitation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('campagnes');
    }
}
