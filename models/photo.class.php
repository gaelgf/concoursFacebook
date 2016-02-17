<?php

class photo extends model{

    protected $id;
	protected $id_participant;
	protected $id_photo_facebook;
	protected $id_album_facebook;

    public function __construct($id = NULL,
								$id_participant,
								$id_photo_facebook,
								$id_album_facebook)
    {
        parent::__construct();
        $this->id = $id;
        $this->id_participant = $id_participant;
        $this->id_photo_facebook = $id_photo_facebook;
        $this->id_album_facebook = $id_album_facebook;
    }

    public static function loadById($photoId)
    {
        $errors = [];
        $photoArray = parent::getById($photoId);
        if(!isset($photoArray["errors"])) {
            $photo = self::photoFromArray($photoArray);
            return $photo;
        }
        $errors = $photoArray["errors"];
        return $errors;
    }

    public static function load()
    {
        $photosArrays = parent::get();
        $photos = self::photosFromPhotosArrays($photosArrays);
        return $photos;
    }

    public static function checkPhotoArray( $photoArray ) {
        $errors = [];

        if(!array_key_exists("id_participant", $photoArray) || !isset($photoArray["id_participant"])) {
            $errors["id_participant"] = "Erreur : L'id du participant doit être renseigné.";
        }
        if(!array_key_exists("id_photo_facebook", $photoArray) || !isset($photoArray["id_photo_facebook"])) {
            $errors["id_photo_facebook"] = "Erreur : L'id de la photo facebook doit être renseigné.";
        }
        if(!array_key_exists("id_album_facebook", $photoArray) || !isset($photoArray["id_album_facebook"])) {
            $errors["id_album_facebook"] = "Erreur : L'id de l'album facebook doit être renseigné.";
        }

        if(sizeof($errors) > 0) {
            return $errors;
        }
        return [];
    }

    public static function photoFromArray($photoArray) {
        $vote = new self((isset($photoArray["id"]) ? $photoArray["id"] : NULL),
                                    $photoArray["id_participant"],
                                    $photoArray["id_photo_facebook"],
                                    $photoArray["id_album_facebook"]);
        return $vote;
    }


    private static function photosFromPhotosArrays($photosArrays)
    {
        $photos = [];
        foreach ($photosArrays as $photoArray) {
            $photos[] = self::photoFromArray($photoArray);
        }
        return $photos;
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

    /* id_participant */
    public function getIdParticipant()
    {
        return $this->id_participant;
    }

    public function setIdParticipant($id_participant)
    {
        $this->id_participant = $id_participant;
    }

    /* id_photo_facebook */
    public function getIdPhotoFacebook()
    {
        return $this->id_photo_facebook;
    }

    public function setIdPhotoFacebook($id_photo_facebook)
    {
        $this->id_photo_facebook = $id_photo_facebook;
    }

    /* id_album_facebook */
    public function getAlbumFacebook()
    {
        return $this->id_album_facebook;
    }

    public function setAlbumFacebook($id_album_facebook)
    {
        $this->id_album_facebook = $id_album_facebook;
    }

}