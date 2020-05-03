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

        $condition = !is_null($this->condition) ? $this->condition : 1;

        $pl = new PenindakLanjut();
        $col = implode(', ', $pl->getColumns());

        $result = WbController::executeSelectQuery($col, 'penindak_lanjut', $condition);

        $arrResult = WbController::getArrayFromQueryResult($result, 'PenindakLanjut');

        return $arrResult;
    }

}
