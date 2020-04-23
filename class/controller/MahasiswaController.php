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

    public function update($model){

    }

    public function delete(){

    }

    public function select(){

        $condition = $this->getPrimaryKeyCondition();
        $condition = is_null($condition) ? 1 : $condition;

        $mhs = new Mahasiswa();
        $col = implode(', ' $mhs->getColumns());

        $sql = "SELECT {$col} FROM mahasiswa WHERE {$condition}";
        $result = mysqli_query($this->connection, $sql);

        $arrResult = Array();
        if (!$result) return $arrResult;
        $count = 0;
        if (mysqli_num_rows($result) > 0){
            while ($data = mysqli_fetch_array($result)){

                $mhs = new Mahasiswa();
                $mhs->setAllValues($data);

                $arrResult[$count] = $mhs;
                $count++;
            }
        }

        return $arrResult;
    }

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
