<?php

class PenindakLanjutController extends WbController {

    public function insert($newModel){
        $col = implode(", ", $newModel->getColumns());
        $valArr = array_map(
            function ($x) { return $x == "NULL" ? $x : "'" . $x . "'"; },
            $newModel->getAllValues()
        );
        $val = implode(", ", $valArr);

        return WbController::executeInsertQuery('penindak_lanjut', $col, $val);
    }

    public function update($newModel){

    }

    public function delete(){

    }

    public function select(){

        $condition = $this->getPrimaryKeyCondition();
        $condition = is_null($condition) ? 1 : $condition;

        $pl = new PenindakLanjut();
        $col = implode(', ', $pl->getColumns());

        $result = WbController::executeSelectQuery($col, 'penindak_lanjut', $condition);

        if (!$result) return NULL;
        $arrResult = Array();
        $count = 0;
        if (mysqli_num_rows($result) > 0){
            while ($data = mysqli_fetch_array($result)){

                $pLanjut = new PenindakLanjut();
                $pLanjut->setAllValues($data);

                $arrResult[$count] = $pLanjut;
                $count++;
            }
        }

        return $arrResult;
    }

}
