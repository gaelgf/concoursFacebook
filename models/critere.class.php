<?php

class critere extends model{

    protected $id;
	protected $nom_critere;

    public function __construct($id = NULL,
								$nom_critere)
    {
        parent::__construct();
        $this->id = $id;
        $this->nom_critere = $nom_critere;
    }

    public static function loadById($critereId)
    {
        $errors = [];
        $critereArray = parent::getById($critereId);
        if(!isset($critereArray["errors"])) {
            $critere = self::critereFromArray($critereArray);
            return $critere;
        }
        $errors = $critereArray["errors"];
        return $errors;
    }

    public static function load()
    {
        $criteresArrays = parent::get();
        $criteres = self::criteresFromCriteresArrays($criteresArrays);
        return $criteres;
    }

    public static function checkCritereArray( $critereArray ) {
        $errors = [];

        if(!array_key_exists("nom_critere", $critereArray) || !isset($critereArray["nom_critere"])) {
            $errors["nom_critere"] = "Erreur : L'id du participant doit être renseigné.";
        }

        if(sizeof($errors) > 0) {
            return $errors;
        }
        return [];
    }

    public static function critereFromArray($critereArray) {
        $critere = new self((isset($critereArray["id"]) ? $critereArray["id"] : NULL),
                                    $critereArray["nom_critere"]);
        return $critere;
    }


    private static function criteresFromCriteresArrays($criteresArrays)
    {
        $criteres = [];
        foreach ($criteresArrays as $critereArray) {
            $criteres[] = self::critereFromArray($critereArray);
        }
        return $criteres;
    }

    /* Id */
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    /* nom_critere */
    public function getNomCritere()
    {
        return $this->nom_critere;
    }

    public function setNomCritere($nom_critere)
    {
        $this->nom_critere = $nom_critere;
    }

}