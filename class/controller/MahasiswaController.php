<?php

class MahasiswaController extends WbController {

    public function insert($newModel){
        $col = implode(", ", $newModel->getColumns());
        $valArr = array_map(
            function ($x) { return $x == "user_id" ? $x : "'" . $x . "'"; },
            $newModel->getValues()
        );
        $val = implode(", ", $valArr);

        $sql = "INSERT INTO mahasiswa ($col) VALUES ($val)";

        return mysqli_query($this->connection, $sql);
    }
    public function update($model){}
    public function delete(){}
    public function select(){}
}
