<?php


class campagne extends model{

    protected $id;
    protected $logo_entreprise;
    protected $nom_campagne;
    protected $date_debut;      
    protected $date_fin;     
    protected $couleur;      
    protected $url_icone;          
    protected $text_accueil;      
    protected $text_felicitations;

    /* TO DO : ajouter ces attributs dans la table campagnes sur heroku */
    /*protected $iActive;
    protected $nom_lot;   
    protected $description_lot;
    protected $image_lot;*/

    public function __construct($id,
                                $logo_entreprise,
                                $nom_campagne,
                                $date_debut,
                                $date_fin,
                                $couleur,
                                $url_icone,
                                $text_accueil,
                                $text_felicitations)
    {
        parent::__construct();
        $this->id = $id;
        $this->logo_entreprise = $logo_entreprise;
        $this->nom_campagne = $nom_campagne;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->couleur = $couleur;
        $this->url_icone = $url_icone;
        $this->text_accueil = $text_accueil;
        $this->text_felicitations = $text_felicitations;
    }

    public static function loadById($campagneId)
    {
        $campagneArray = parent::getById($campagneId);
        $campagne = self::campagneFromArray($campagneArray);
        return $campagne;
    }

    public static function load()
    {
        $campagnesArrays = parent::get();
        $campagnes = self::campagnesFromCompagnesArrays($campagnesArrays);
        return $campagnes;
    }

    private static function campagneFromArray($campagneArray) {
        $campagne = new self($campagneArray["id"],
                             $campagneArray["logo_entreprise"],
                             $campagneArray["nom_campagne"],
                             $campagneArray["date_debut"],
                             $campagneArray["date_fin"],
                             $campagneArray["couleur"],
                             $campagneArray['url_icone'],
                             $campagneArray['text_accueil'],
                             $campagneArray['text_felicitations']);
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

    /* url_icone */
    public function getUrlIcone(){
        return $this->url_icone;
    }
    public function setUrlIcone( $url_icone ){
        $this->url_icone = $url_icone;
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

}