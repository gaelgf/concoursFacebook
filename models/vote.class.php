<?php

class vote extends model{

    protected $id;
	protected $id_photo;
	protected $id_critere;
	protected $date;
	protected $valeur;
    protected $id_participant;

    public function __construct($id = NULL,
								$id_photo,
								$id_critere,
								$date,
								$valeur,
                                $id_participant)
    {
        parent::__construct();
        $this->id = $id;
        $this->id_photo = $id_photo;
        $this->id_critere = $id_critere;
        $this->date = $date;
        $this->valeur = $valeur;
        $this->id_participant = $id_participant;
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

    public static function loadIdsPhotosFromVotesWhereParticipantIdVoted($participantId)
    {
        $errors = [];
        $table = get_called_class();
        $model = new parent($table);

        if (!$request = $model->pdo->query(
            "SELECT DISTINCT id_photo FROM " . $model->table . " WHERE id_participant = " . $participantId
        )) {
           $errors[] = "Erreur lors de la récupération des votes du participant";
        }

        if($photosIdsArray = $request->fetchAll()) {
            $photosIds = [];
            for ($i=0; $i < count($photosIdsArray); $i++) {
               $photosIds[] = $photosIdsArray[$i]["id_photo"];
            }
            return $photosIds;
        } else {
            $errors[] = "Erreur lors de la récupération des votes du participant";
        }

        return $errors;
    }

    public static function loadVotesByPhotoId($photoId) {
        $errors = [];
        $table = get_called_class();
        $model = new parent($table);

        if (!$request = $model->pdo->query(
            "SELECT * FROM " . $model->table . " WHERE id_photo = '" . $photoId . "'"
        )) {
            $errors[] = "Erreur lors de la récupération des votes pour la photo " . $photoId;
        }

        if ($VotesArrays = $request->fetchAll()) {
            $votes = self::votesFromVotesArrays($VotesArrays);
            return $votes;
        } else {
            $errors[] = "Erreur lors de la récupération des votes pour la photo " . $photoId;
        }

        return $errors;
    }

    public static function loadByPhotoIds($photosIds)
    {

        $errors = [];
        $table = get_called_class();
        $model = new parent($table);

        $stringRequest = "SELECT * FROM " . $table . " WHERE ";
        foreach ($photosIds as $key => $photoId) {
            if($key !== count($photosIds)-1) {
                $stringRequest .= "id_photo = '" . $photoId . "' OR ";
            } else {
                $stringRequest .= "id_photo = '" . $photoId . "'";
            }
        }

        if (!$request = $model->pdo->query(
            $stringRequest
        )) {
            $errors[] = "Erreur lors de la récupération de l'objet " . $table;
        }

        if ($votesArrays = $request->fetchAll()) {
            $votes = self::votesFromVotesArrays($votesArrays);
            return $votes;
        } else {
            $errors[] = "Erreur lors de la récupération de l'objet " . $table;
        }

        return $errors;
    }

    public static function load()
    {
        $votesArrays = parent::get();
        $votes = self::votesFromVotesArrays($votesArrays);
        return $votes;
    }


    public static function loadByParticipantId( $idParticipant ){

        $table = get_called_class();
        $model = new parent($table);

        $request = $model->pdo->query(
            "SELECT * FROM " . $model->table . " WHERE id_participant = " . $idParticipant
        );

        return $request->fetchAll();
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
        if(!array_key_exists("id_participant", $voteArray) || !isset($voteArray["id_participant"])) {
            $errors["id_participant"] = "Erreur : L'id du participant doit être renseignée.";
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
                                    $voteArray["valeur"],
                                    $voteArray["id_participant"]);
        return $vote;
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

    /* id_participant */
    public function getIdParticipant()
    {
        return $this->id_participant;
    }

    public function setIdParticipant($id_participant)
    {
        $this->id_participant = $id_participant;
    }

}