<?php

class PengaduanController extends WbController {

    private $table_view;

    public function setTableOrView($table_view) {
        $this->table_view = $table_view;
        return $this;
    }

    public function insert($newModel){
        $newModel->setColumnFuncType($this->table_view);
        $col = implode(", ", $newModel->getColumns());
        $valArr = array_map(
            function ($x) { return $x == "id" ? $x : "'" . $x . "'"; },
            $newModel->getValues()
        );
        $val = implode(", ", $valArr);

        $sql = "INSERT INTO basic_pengaduan ($col) VALUES ($val)";

        return mysqli_query($this->connection, $sql);
    }

    public function update($model){

    }

    public function delete(){

    }

    public function select(){
        $model = $this->getModel();
        $model->setColumnFuncType($this->table_view);
        $sql = "SELECT * FROM {$this->table_view} WHERE {$model->getConditions()}";
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
