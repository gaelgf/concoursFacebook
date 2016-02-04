<?php

class model{

    private $pdo;
    private $table;
    private $dsn = 'mysql:dbname=projetfacebook;host=127.0.0.1';
    private $user = 'root';
    private $password = '';

    public function __construct()
    {
        $this->pdo = new pdo($this->dsn, $this->user, $this->password);
        $this->table = get_called_class();


    }

    public function save(){
        $data = get_object_vars($this);

        $id = $data['id'];
        if(!$id){
            unset($data["id"]);
        }

        unset($data["pdo"]);
        unset($data["table"]);

        if( $id ){

        }
        else{
            foreach($data as $key => $value){
                $sql_column_insert[] = ":".$key;
            }

            $columns = implode(",",array_keys($data));
            $values = implode(",",$sql_column_insert);


            $request = $this->pdo->prepare(
                "INSERT INTO ".$this->table."(".$columns.") VALUES (".$values.")"
            );

            $request->execute($data);
        }
    }
}