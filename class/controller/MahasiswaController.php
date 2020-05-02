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

        $condition = !is_null($this->getModel()) ? $this->getModel()->getConditions() : 1;

        $mhs = new Mahasiswa();
        $col = implode(', ', $mhs->getColumns());

        $result = WbController::executeSelectQuery($col, 'mahasiswa', $condition);
        $arrResult = WbController::getArrayFromQueryResult($result, 'Mahasiswa');

        return $arrResult;
    }

    public function joinSelect() {
        $condition = !is_null($this->getModel()) ? $this->getModel()->getConditions() : 1;

        $mhs = new Mahasiswa();
        $user = new User();
        $prodi = new ProgramStudi();

        $colMhs = array_map(
            function($x) { return 'a.' . $x },
            array_slice($mhs->getColumns(), 0, 1)
        );
        $colUser = array_map(function($x) { return 'b.' . $x }, $user->getColumns());
        $colProdi = array_map(function($x) { return 'c.' . $x }, $user->getColumns());
        $colArr = array_merge($colMhs, $colUser, $colProdi);
        $col = implode(", ", $colArr);

        $table = "(mahasiswa a LEFT JOIN user b ON a.user_id = b.id)
                    LEFT JOIN program_studi c ON a.kode_prodi = c.kode";

        $result = WbController::executeSelectQuery($col, $table, $condition);

        $modelClassArr = Array(
            "Mahasiswa" => count($colMhs),
            "User" => count($colUser),
            "ProgramStudi" => count($colProdi)
        );

        $resultArr = WbController::getArrayWithForeignModelFromQueryResult($result, $modelClassArr);

        return $resultArr;
    }

    public function joinSelectOne() {
        $result = $this->joinSelect();
        if (!is_null($result) && count($result) > 0)
            return $result[0];
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
