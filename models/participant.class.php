<?php

class participant extends model{

    protected $id;
	protected $id_campagne;
	protected $id_facebook;
	protected $nom;
	protected $prenom;
	protected $date_naissance;
	protected $validation;

    public function __construct($id = NULL,
								$id_campagne,
								$id_facebook,
								$nom,
								$prenom,
								$date_naissance,
								$validation)
    {
        parent::__construct();
        $this->id = $id;
        $this->id_campagne = $id_campagne;
        $this->id_facebook = $id_facebook;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->date_naissance = $date_naissance;
        $this->validation = $validation;

    }

    public function isParticipatingToCampagne($campagneId) {
        if($this->id_campagne === $campagneId) {
            return true;
        }
        return false;
    }

    public static function isAlreadyParticipating( $idFacebook , $idCampagne ){
        $participants = self::load();
        $res = false;

        foreach($participants as $participant){
            if($participant->getIdFacebook() == $idFacebook && $participant->getIdCampagne() == $idCampagne){
                $res = true;
            }
        }
        return $res;
    }


    public static function loadParticipantsByCampagneId($campagneId) {
        $errors = [];
        $table = get_called_class();
        $model = new parent($table);

        if (!$request = $model->pdo->query(
            "SELECT * FROM participants WHERE id_campagne = '" . $campagneId . "'"
        )) {
            $errors[] = "Erreur lors de la récupération de l'objet " . $table;
        }

        if ($participantArray = $request->fetch()) {
            $participant = self::participantFromArray($participantArray);
            return $participant;
        } else {
            $errors[] = "Erreur lors de la récupération de l'objet " . $table;
        }

        return $errors;
    }

    public static function loadById($participantId)
    {
        $errors = [];
        $participantArray = parent::getById($participantId);
        if(!isset($participantArray["errors"])) {
            $participant = self::participantFromArray($participantArray);
            return $participant;
        }
        $errors = $participantArray["errors"];
        return $errors;
    }


    public static function load()
    {
        $participantsArrays = parent::get();
        $participants = self::participantsFromParticipantsArrays($participantsArrays);
        return $participants;
    }

    public static function checkParticipantArray( $participantArray ) {
        $errors = [];

        if(!array_key_exists("id_campagne", $participantArray) || !isset($participantArray["id_campagne"])) {
            $errors["id_campagne"] = "Erreur : L'id de la campagne doit être renseigné.";
        }
        if(!array_key_exists("id_facebook", $participantArray) || !isset($participantArray["id_facebook"])) {
            $errors["id_facebook"] = "Erreur : L'id facebook du participant doit être renseigné.";
        }
        if(!array_key_exists("nom", $participantArray) || !isset($participantArray["nom"])) {
            $errors["nom"] = "Erreur : Le nom du particpant doit être renseigné.";
        }
        if(!array_key_exists("prenom", $participantArray) || !isset($participantArray["prenom"])) {
            $errors["prenom"] = "Erreur : Le prénom de début du particpant doit être renseigné.";
        }
        if(!array_key_exists("date_naissance", $participantArray) || !isset($participantArray["date_naissance"])) {
            $errors["date_naissance"] = "Erreur : La date de naissance du participant doit être renseignée.";
        }
        if(!array_key_exists("validation", $participantArray) || !isset($participantArray["validation"])) {
            $errors["validation"] = "Erreur : La validation doit être renseignée.";
        }

        if(sizeof($errors) > 0) {
            return $errors;
        }
        return [];
    }

    public static function participantFromArray($participantArray) {
        $participant = new self((isset($participantArray["id"]) ? $participantArray["id"] : NULL),
                                    $participantArray["id_campagne"],
                                    $participantArray["id_facebook"],
                                    $participantArray["nom"],
                                    $participantArray["prenom"],
                                    $participantArray["date_naissance"],
                                    $participantArray['validation']);
        return $participant;
    }

    public static function getIdParticipantByIdFacebook($idFacebook){
        $errors = [];
        $table = get_called_class();
        $model = new parent($table);

        if (!$request = $model->pdo->query(
            "SELECT * FROM participant WHERE id_facebook = '" . $idFacebook . "'"
        )) {
            $errors[] = "Erreur lors de la récupération de l'objet " . $table;
        }

        if ($participantArray = $request->fetch()) {
            $participant = self::participantFromArray($participantArray);
            return $participant;
        } else {
            $errors[] = "Erreur lors de la récupération de l'objet " . $table;
        }

        return $errors;
    }


    public static function getIdFacebookParticipantByIdParticipant($idParticipant){
        $errors = [];
        $table = get_called_class();
        $model = new parent($table);

        if (!$request = $model->pdo->query(
            "SELECT * FROM participant WHERE id = '" . $idParticipant . "'"
        )) {
            $errors[] = "Erreur lors de la récupération de l'objet " . $table;
        }

        if ($participantArray = $request->fetch()) {
            $participant = self::participantFromArray($participantArray);
            return $participant;
        } else {
            $errors[] = "Erreur lors de la récupération de l'objet " . $table;
        }

        return $errors;
    }


    private static function participantsFromParticipantsArrays($participantsArrays)
    {
        $participants = [];
        foreach ($participantsArrays as $participantArray) {
            $participants[] = self::participantFromArray($participantArray);
        }
        return $participants;
    }


    public static function getIdParticipant(){
        if( isset($_SESSION["id_participant"]) && !empty($_SESSION["id_participant"]) ){
            return $_SESSION["id_participant"];
        }
        else{
            return false;
        }
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

    /* id_campagne */
    public function getIdCampagne()
    {
        return $this->id_campagne;
    }

    public function setIdCampagne($id_campagne)
    {
        $this->id_campagne = $id_campagne;
    }

    /* id_facebook */
    public function getIdFacebook()
    {
        return $this->id_facebook;
    }

    public function setIdFacebook($id_facebook)
    {
        $this->id_facebook = $id_facebook;
    }

    /* nom */
    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /* prenom */
    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }


    /* date_naissance */
    public function getDateNaissance()
    {
        return $this->date_naissance;
    }

    public function setDateNaissance($date_naissance)
    {
        $this->date_naissance = $date_naissance;
    }

    /* validation */
    public function getValidation()
    {
        return $this->validation;
    }

    public function setValidation($validation)
    {
        $this->validation = $validation;
    }
}