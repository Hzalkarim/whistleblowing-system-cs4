<?php

class UserController extends WbController {

    public function insert($newModel){

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
