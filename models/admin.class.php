<?php

class admin extends model{

    protected $id;
	protected $id_facebook;

    public function __construct($id = NULL,
								$id_facebook)
    {
        parent::__construct();
        $this->id = $id;
        $this->id_facebook = $id_facebook;
    }

    public static function loadById($adminId)
    {
        $errors = [];
        $adminArray = parent::getById($adminId);
        if(!isset($adminArray["errors"])) {
            $admin = self::adminFromArray($adminArray);
            return $admin;
        }
        $errors = $adminArray["errors"];
        return $errors;
    }

    public static function load()
    {
        $adminsArrays = parent::get();
        $admins = self::adminsFromAdminsArrays($adminsArrays);
        return $admins;
    }

    public static function checkAdminArray( $adminArray ) {
        $errors = [];

        if(!array_key_exists("nom_critere", $adminArray) || !isset($adminArray["nom_critere"])) {
            $errors["nom_critere"] = "Erreur : L'id du participant doit être renseigné.";
        }

        if(sizeof($errors) > 0) {
            return $errors;
        }
        return [];
    }

    public static function adminFromArray($adminArray) {
        $admin = new self((isset($adminArray["id"]) ? $adminArray["id"] : NULL),
                                    $adminArray["id_facebook"]);
        return $admin;
    }


    private static function adminsFromAdminsArrays($adminsArrays)
    {
        $admins = [];
        foreach ($adminsArrays as $adminArray) {
            $admins[] = self::adminFromArray($adminArray);
        }
        return $admins;
    }

    public static function isAdmin($idFacebook) {
        $admins = self::load();
        foreach ($admins as $admin) {
            if($admin->getIdFacebook() === $idFacebook) {
                return true;
            }
        }
        return false;
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

    /* id_facebook */
    public function getIdFacebook()
    {
        return $this->id_facebook;
    }

    public function setIdFacebook($id_facebook)
    {
        $this->id_facebook = $id_facebook;
    }

}