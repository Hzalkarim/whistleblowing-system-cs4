<?php

class UserController extends WbController {

    public function insert($newModel){
        $col = implode(", ", $newModel->getColumns());
        $valArr = array_map(
            function ($x) { return "'" . $x . "'"; },
            $newModel->getValues()
        );
        $val = implode(", ", $valArr);

        $sql = "INSERT INTO user ($col) VALUES ($val)";

        return mysqli_query($this->connection, $sql);
    }

    public function update($newModel){

    }

    public function delete(){

    }

    public function select(){
        $model = $this->getModel();
        $sql = "SELECT * FROM user WHERE {$model->getConditions()}";
        $resultOne = mysqli_query($this->connection, $sql);

        if (mysqli_num_rows($resultOne) == 1) {
            // $this->hasil = true;
            $data = mysqli_fetch_assoc($resultOne);
            $model->setAllValues($data);

            return $model;
        } else {
            return NULL;
        }
    }
}
