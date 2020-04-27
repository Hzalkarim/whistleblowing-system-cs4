<?php

class MahasiswaController extends WbController {

    public function insert($newModel){
        $col = implode(", ", $newModel->getColumns());
        $valArr = array_map(
            function ($x) { return $x == "NULL" ? $x : "'" . $x . "'"; },
            $newModel->getAllValues()
        );
        $val = implode(", ", $valArr);

        return WbController::executeInsertQuery('mahasiswa', $col, $val);
    }

    public function update($model){

    }

    public function delete(){

    }

    public function select(){

        $condition = $this->getPrimaryKeyCondition();
        $condition = is_null($condition) ? 1 : $condition;

        $mhs = new Mahasiswa();
        $col = implode(', ', $mhs->getColumns());

        $result = WbController::executeSelectQuery($col, 'mahasiswa', $condition);

        $arrResult = WbController::getArrayFromQueryResult($result, 'Mahasiswa');


        return $arrResult;
    }

    public function getNimFromUserId($user_id) {
        $resultOne = WbController::executeSelectQuery('nim', 'mahasiswa', "user_id = '{$user_id}'");

        if (mysqli_num_rows($resultOne) == 1) {
            // $this->hasil = true;
            $data = mysqli_fetch_assoc($resultOne);

            return $data['nim'];
        } else {
            return 0;
        }
    }
}
