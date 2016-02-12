<?php

class model{

    protected $pdo;
    protected $table;

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
        $errors = [];
        $table = get_called_class();
        $model = new self($table);

        if (!$request = $model->pdo->query(
            "SELECT * FROM " . $model->table . " WHERE id = " . $modelId
        )) {
            $errors["errors"][] = "Erreur lors de la récupération de l'objet " . $model->table;
        } else {
             if(!$response = $request->fetch()) {
                $errors["errors"][] = "Erreur lors de la récupération de l'objet " . $model->table; 
            } else {
                return $response;
            }
        }

        return $errors; 
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
            foreach($data as $key => $value){
                $sql_column_update[] = ":".$key;
                $value[$key] = trim(preg_replace('/\s+/', ' ', nl2br(htmlentities($value[$key]), false)));
            }

            $columns = implode(",",array_keys($data));
            $values = implode(",",$sql_column_update);

            echo "INSERT INTO ".$this->table."(".$columns.") VALUES (".$values.")";
            exit();

            $request = $this->pdo->prepare(
                "INSERT INTO ".$this->table."(".$columns.") VALUES (".$values.")"
            );

            return $request->execute($data);
        }
        else{
            foreach($data as $key => $value){
                $sql_column_insert[] = ":".$key;
                $data[$key] = trim(preg_replace('/\s+/', ' ', nl2br(htmlentities($value), false)));
                if($data[$key] === 'on') {
                    $data[$key] = true;
                }
                if($data[$key] === 'off') {
                    $data[$key] = false;
                }
            }

            $columns = implode(",",array_keys($data));
            $values = implode(",",$sql_column_insert);

            $request = $this->pdo->prepare(
                "INSERT INTO ".$this->table."(".$columns.") VALUES (".$values.")"
            );

            return $request->execute($data);
        }
    }

    public function delete() {
        $errors = [];
        $data = get_object_vars($this);

        $id = $data['id'];
        var_dump($this->table);

        if(!$request = $this->pdo->query(
            "DELETE FROM ".$this->table." WHERE id = ".$id
        )) {
            $errors["errors"][] = "Erreur lors de la suppression de l'objet " . $model->table;
        };

        return $errors;
    }
}