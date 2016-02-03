<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campagne extends Model
{
    public $timestamps = false;

    protected $fillable=[
        'nom_campagne',
        'logo_entreprise',
        'date_debut',
        'date_fin',
        'couleur',
        'url_icone',
        'text_accueil',
        'text_felicitations'
    ];
}
