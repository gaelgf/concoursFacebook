<?php


class campagne extends model{

    protected $id;
    protected $title;
    protected $description;

    public function __construct()
    {
        parent::_construct();

    }

    public function getId(){
        return $this->id;
    }
    public function setId( $id ){
        $this->id = $id;
    }

    public function getTitle(){
        return $this->title;
    }
    public function setTitle( $title ){
        $this->title = $title;
    }

    public function getDescription(){
        return $this->description;
    }
    public function setDescription( $description ){
        $this->description = $description;
    }

}