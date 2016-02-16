<?php

class vote extends model{

    protected $id;
	protected $id_photo;
	protected $id_critere;
	protected $date;
	protected $valeur;

    public function __construct($id = NULL,
								$id_photo,
								$id_critere,
								$date,
								$valeur)
    {
        parent::__construct();
        $this->id = $id;
        $this->id_photo = $id_photo;
        $this->id_critere = $id_critere;
        $this->date = $date;
        $this->valeur = $valeur;
    }

    public static function loadById($voteId)
    {
        $errors = [];
        $voteArray = parent::getById($voteId);
        if(!isset($voteArray["errors"])) {
            $vote = self::voteFromArray($voteArray);
            return $vote;
        }
        $errors = $voteArray["errors"];
        return $errors;
    }

    public static function load()
    {
        $votesArrays = parent::get();
        $votes = self::votesFromVotesArrays($votesArrays);
        return $votes;
    }

    public static function checkVoteArray( $voteArray ) {
        $errors = [];

        if(!array_key_exists("id_photo", $voteArray) || !isset($voteArray["id_photo"])) {
            $errors["id_photo"] = "Erreur : L'id de la photo doit être renseigné.";
        }
        if(!array_key_exists("id_critere", $voteArray) || !isset($voteArray["id_critere"])) {
            $errors["id_critere"] = "Erreur : L'id fdu critère doit être renseigné.";
        }
        if(!array_key_exists("date", $voteArray) || !isset($voteArray["date"])) {
            $errors["date"] = "Erreur : La date doit être renseigné.";
        }
        if(!array_key_exists("valeur", $voteArray) || !isset($voteArray["valeur"])) {
            $errors["valeur"] = "Erreur : La valeur doit être renseignée.";
        }

        if(sizeof($errors) > 0) {
            return $errors;
        }
        return [];
    }

    public static function voteFromArray($voteArray) {
        $vote = new self((isset($voteArray["id"]) ? $voteArray["id"] : NULL),
                                    $voteArray["id_photo"],
                                    $voteArray["id_critere"],
                                    $voteArray["date"],
                                    $voteArray["valeur"]);
        return $participant;
    }


    private static function votesFromVotesArrays($votesArrays)
    {
        $votes = [];
        foreach ($votesArrays as $voteArray) {
            $votes[] = self::voteFromArray($voteArray);
        }
        return $votes;
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

    /* id_photo */
    public function getIdPhoto()
    {
        return $this->id_photo;
    }

    public function setIdPhoto($id_photo)
    {
        $this->id_photo = $id_photo;
    }

    /* id_critere */
    public function getIdCritere()
    {
        return $this->id_critere;
    }

    public function setIdCritere($id_critere)
    {
        $this->id_critere = $id_critere;
    }

    /* date */
    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    /* valeur */
    public function getValeur()
    {
        return $this->valeur;
    }

    public function setValeur($valeur)
    {
        $this->valeur = $valeur;
    }

}