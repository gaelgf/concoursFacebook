<?php

class model{

    private $pdo;
    private $table;

    public function __construct($table = '')
    {

        if($table !== '') {
            $this->table = $table;
        } else {
            $this->table = get_called_class();
        }

        try {
            $this->pdo = new PDO('pgsql:dbname='.DATABASE.';host='.HOST, USERNAME, PASSWORD);
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    }

    public static function getById($modelId){

        $table = get_called_class();
        $model = new self($table);

        $request = $model->pdo->query(
            "SELECT * FROM " . $model->table . " WHERE id = " . $modelId
        );

        $response = $request->fetch();

        return $response;
    }

    public static function get(){

        $table = get_called_class();
        $model = new self($table);

        $request = $model->pdo->query(
            "SELECT * FROM " . $model->table
        );

        $response = $request->fetchAll();
        return $response;
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
            //TO DO: UPDATE
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