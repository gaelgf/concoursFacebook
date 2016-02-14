<?php


class campagne extends model{

    protected $id;
    protected $logo_entreprise;
    protected $nom_campagne;
    protected $date_debut;      
    protected $date_fin;     
    protected $couleur;
    protected $text_accueil;      
    protected $text_felicitations;
    protected $is_active;
    protected $nom_lot;   
    protected $description_lot;
    protected $image_lot;
    protected $photo_accueil_one;
    protected $photo_accueil_two;
    protected $photo_accueil_three;
    protected $icone_coeur;
    protected $icone_principale;

    public function __construct($id = NULL,
                                $logo_entreprise,
                                $nom_campagne,
                                $date_debut,
                                $date_fin,
                                $couleur,
                                $text_accueil,
                                $text_felicitations,
                                $is_active,
                                $nom_lot,
                                $description_lot,
                                $image_lot,
                                $image_accueil_one,
                                $image_accueil_two,
                                $image_accueil_three,
                                $icone_coeur,
                                $icone_principale)
    {
        parent::__construct();
        $this->id = $id;
        $this->logo_entreprise = $logo_entreprise;
        $this->nom_campagne = $nom_campagne;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->couleur = $couleur;
        $this->text_accueil = $text_accueil;
        $this->text_felicitations = $text_felicitations;
        $this->is_active = $is_active;
        $this->nom_lot = $nom_lot;
        $this->description_lot = $description_lot;
        $this->image_lot = $image_lot;
        $this->image_accueil_one = $image_accueil_one;
        $this->image_accueil_two = $image_accueil_two;
        $this->image_accueil_three = $image_accueil_three;
        $this->icone_coeur = $icone_coeur;
        $this->icone_principale = $icone_principale;
    }

    public static function loadCurrent()
    {
        $errors = [];
        $table = get_called_class();
        $model = new parent($table);

        $currentDate = date("Y-m-d");

        if (!$request = $model->pdo->query(
            "SELECT * FROM " . $model->table . " WHERE date_debut <= '" . $currentDate . "' AND date_fin >= '" . $currentDate . "'"
        )) {
           $errors[] = "Erreur lors de la récupération de l'objet " . $table;
        }

        if($campagneArray = $request->fetch()) {
            $campagne = self::campagneFromArray($campagneArray);
            return $campagne;
        } else {
            $errors[] = "Erreur lors de la récupération de l'objet " . $table;
        }

        return $errors;        
    }

    public static function loadById($campagneId)
    {
        $errors = [];
        $campagneArray = parent::getById($campagneId);
        if(!isset($campagneArray["errors"])) {
            $campagne = self::campagneFromArray($campagneArray);
            return $campagne;
        }
        $errors = $campagneArray["errors"];
        return $errors;
    }

    public static function loadByName($campagneName)
    {
        $errors = [];
        $table = get_called_class();
        $model = new parent($table);

        if (!$request = $model->pdo->query(
            "SELECT * FROM " . $model->table . " WHERE nom_campagne = '" . $campagneName . "'"
        )) {
           $errors[] = "Erreur lors de la récupération de l'objet " . $table;
        }

        if($campagneArray = $request->fetch()) {
            $campagne = self::campagneFromArray($campagneArray);
            return $campagne;
        } else {
            $errors[] = "Erreur lors de la récupération de l'objet " . $table;
        }

        return $errors;        
    }

    public static function load()
    {
        $campagnesArrays = parent::get();
        $campagnes = self::campagnesFromCompagnesArrays($campagnesArrays);
        return $campagnes;
    }

    public static function checkCampagneArray( $campagneArray ) {
        $errors = [];
        if(!array_key_exists("logo_entreprise", $campagneArray) || !isset($campagneArray["logo_entreprise"])) {
            $errors["logo_entreprise"] = "Erreur : Le logo de l'entreprise doit être renseigné.";
        }
        if(!array_key_exists("nom_campagne", $campagneArray) || !isset($campagneArray["nom_campagne"])) {
            $errors["nom_campagne"] = "Erreur : Le nom de la campagne doit être renseigné.";
        }
        if(!array_key_exists("date_debut", $campagneArray) || !isset($campagneArray["date_debut"])) {
            $errors["date_debut"] = "Erreur : La date de début de la campagne doit être renseigné.";
        }
        if(!array_key_exists("date_fin", $campagneArray) || !isset($campagneArray["date_fin"])) {
            $errors["date_fin"] = "Erreur : La date de fin de la campagne doit être renseigné.";
        }
        if(!array_key_exists("couleur", $campagneArray) || !isset($campagneArray["couleur"])) {
            $errors["couleur"] = "Erreur : La couleur de la campagne doit être renseigné.";
        }
        if(!array_key_exists("text_accueil", $campagneArray) || !isset($campagneArray["text_accueil"])) {
            $errors["text_accueil"] = "Erreur : Le texte d'accueil de la campagne doit être renseigné.";
        }
        if(!array_key_exists("text_felicitations", $campagneArray) || !isset($campagneArray["text_felicitations"])) {
            $errors["text_felicitations"] = "Erreur : Le texte de félicitations de la campagne doit être renseigné.";
        }
        if(!array_key_exists("nom_lot", $campagneArray) || !isset($campagneArray["nom_lot"])) {
            $errors["nom_lot"] = "Erreur : Le nom du lot de la campagne doit être renseigné.";
        }
        if(!array_key_exists("description_lot", $campagneArray) || !isset($campagneArray["description_lot"])) {
            $errors["description_lot"] = "Erreur : La description du lot de la campagne doit être renseignée.";
        }
        if(!array_key_exists("image_lot", $campagneArray) || !isset($campagneArray["image_lot"])) {
            $errors["image_lot"] = "Erreur : L'image du lot de la campagne doit être renseignée.";
        }
        if(!array_key_exists("photo_accueil_one", $campagneArray) || !isset($campagneArray["photo_accueil_one"])) {
            $errors["photo_accueil_one"] = "Erreur : Choisissez une premiere photo pour l'accueil.";
        }
        if(!array_key_exists("photo_accueil_two", $campagneArray) || !isset($campagneArray["photo_accueil_two"])) {
            $errors["photo_accueil_two"] = "Erreur : Choisissez une seconde photo pour l'accueil.";
        }
        if(!array_key_exists("photo_accueil_three", $campagneArray) || !isset($campagneArray["photo_accueil_three"])) {
            $errors["photo_accueil_three"] = "Erreur : Choisissez une troisieme photo pour l'accueil.";
        }
        if(!array_key_exists("icone_coeur", $campagneArray) || !isset($campagneArray["icone_coeur"])) {
            $errors["icone_coeur"] = "Erreur : Choisissez une icone pour les votes.";
        }
        if(!array_key_exists("icone_principale", $campagneArray) || !isset($campagneArray["icone_principale"])) {
            $errors["icone_principale"] = "Erreur : Choisissez une icone principale.";
        }

        if(sizeof($errors) > 0) {
            return $errors;
        }
        return [];
    }

    public static function campagneFromArray($campagneArray) {
        $campagne = new self((isset($campagneArray["id"]) ? $campagneArray["id"] : NULL),
                                    $campagneArray["logo_entreprise"],
                                    $campagneArray["nom_campagne"],
                                    $campagneArray["date_debut"],
                                    $campagneArray["date_fin"],
                                    $campagneArray["couleur"],
                                    $campagneArray['text_accueil'],
                                    $campagneArray['text_felicitations'],
                                    $campagneArray['is_active'],
                                    $campagneArray['nom_lot'],
                                    $campagneArray['description_lot'],
                                    $campagneArray['image_lot'],
                                    $campagneArray['photo_accueil_one'],
                                    $campagneArray['photo_accueil_two'],
                                    $campagneArray['photo_accueil_three'],
                                    $campagneArray['icone_coeur'],
                                    $campagneArray['icone_principale']);
        return $campagne;
    }

    private static function campagnesFromCompagnesArrays($campagnesArrays) {
        $campagnes = [];
        foreach ($campagnesArrays as $campagneArray) {
            $campagnes[] = self::campagneFromArray($campagneArray);
        }
        return $campagnes;
    }

    /* id */
    public function getId(){
        return $this->id;
    }
    public function setId( $id ){
        $this->id = $id;
    }

    /* logo_entreprise */
    public function getLogoEntreprise(){
        return $this->logo_entreprise;
    }
    public function setLogoEntreprise( $logo_entreprise ){
        $this->logo_entreprise = $logo_entreprise;
    }

    /* nom_campagne */
    public function getNomCampagne(){
        return $this->nom_campagne;
    }
    public function setNomCampagne( $nom_campagne ){
        $this->nom_campagne = $nom_campagne;
    }

    /* date_debut */
    public function getDateDebut(){
        return $this->date_debut;
    }
    public function setDateDebut( $date_debut ){
        $this->date_debut = $date_debut;
    }

    /* date_fin */
    public function getDateFin(){
        return $this->date_fin;
    }
    public function setDateFin( $date_fin ){
        $this->date_fin = $date_fin;
    }

    /* couleur */
    public function getCouleur(){
        return $this->couleur;
    }
    public function setCouleur( $couleur ){
        $this->couleur = $couleur;
    }

    /* text_accueil */
    public function getTextAccueil(){
        return $this->text_accueil;
    }
    public function setTextAccueil( $text_accueil ){
        $this->text_accueil = $text_accueil;
    }

    /* text_felicitations */
    public function getTextFelicitations(){
        return $this->text_felicitations;
    }
    public function setTextFelicitations( $text_felicitations ){
        $this->text_felicitations = $text_felicitations;
    }

    /* is_active */
    public function getIsActive(){
        return $this->is_active;
    }
    public function setIsActive( $is_active ){
        $this->is_active = $is_active;
    }

    /* nom_lot */
    public function getNomLot(){
        return $this->nom_lot;
    }
    public function setNomLot( $nom_lot ){
        $this->nom_lot = $nom_lot;
    }

    /* description_lot */
    public function getDescriptionLot(){
        return $this->description_lot;
    }
    public function setDescriptionLot( $description_lot ){
        $this->description_lot = $description_lot;
    }

    /* image_lot */
    public function getImageLot(){
        return $this->image_lot;
    }
    public function setImageLot( $image_lot ){
        $this->image_lot = $image_lot;
    }

    /* image_accueil_one */
    public function getPhotoAccueilOne(){
        return $this->photo_accueil_one;
    }
    public function setPhotoAccueilOne( $image_accueil_one ){
        $this->image_accueil_one = $image_accueil_one;
    }
    /* image_accueil_two */
    public function getPhotoAccueilTwo(){
        return $this->photo_accueil_two;
    }
    public function setPhotoAccueilTwo( $image_accueil_two ){
        $this->image_accueil_two = $image_accueil_two;
    }
    /* image_accueil_three */
    public function getPhotoAccueilThree(){
        return $this->image_accueil_three;
    }
    public function setPhotoAccueilThree( $image_accueil_three ){
        $this->image_accueil_three = $image_accueil_three;
    }

    /* image_coeur */
    public function getIconeCoeur(){
        return $this->icone_coeur;
    }
    public function setIconeCoeur( $icone_coeur ){
        $this->icone_coeur = $icone_coeur;
    }


    /* icone_principale */
    public function getIconePrincipale(){
        return $this->icone_principale;
    }
    public function setIconePrincipale( $icone_principale ){
        $this->icone_principale = $icone_principale;
    }
}