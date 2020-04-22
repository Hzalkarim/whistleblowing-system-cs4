<?php

class MahasiswaController extends WbController {

    public function insert($newModel){
        $col = implode(", ", $newModel->getColumns());
        $valArr = array_map(
            function ($x) { return $x == "NULL" ? $x : "'" . $x . "'"; },
            $newModel->getAllValues()
        );
        $val = implode(", ", $valArr);

        $sql = "INSERT INTO mahasiswa ($col) VALUES ($val)";

        return mysqli_query($this->connection, $sql);
    }
    public function update($model){}
    public function delete(){}
    public function select(){}

    public function getNimFromUserId($user_id) {
        $sql = "SELECT nim FROM mahasiswa WHERE user_id = '{$user_id}'";

        $resultOne = mysqli_query($this->connection, $sql);

        if (mysqli_num_rows($resultOne) == 1) {
            // $this->hasil = true;
            $data = mysqli_fetch_assoc($resultOne);

            return $data['nim'];
        } else {
            return 0;
        }
    }
}
