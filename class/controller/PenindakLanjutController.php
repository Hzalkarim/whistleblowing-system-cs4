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

    public function joinSelect() {
        $condition = !is_null($this->condition) ? $this->condition : 1;

        $plj = new PenindakLanjut();
        $user = new User();

        $colPlj = array_map(
            function($x) { return 'penindak_lanjut.'.$x.' as p_'.$x; },
            array_slice($plj->getColumns(), 0, 2)
        );
        $colUser = array_map(
            function($x) { return 'user.'.$x.' as u_'.$x; },
            $user->getColumns()
        );
        $colArr = array_merge($colPlj, $colUser);
        $col = implode(", ", $colArr);

        $table = "penindak_lanjut LEFT JOIN user ON penindak_lanjut.user_id = user.id";

        $result = WbController::executeSelectQuery($col, $table, $condition);

        $modelClassArr = Array(
            "PenindakLanjut" => count($colPlj),
            "User" => count($colUser),
        );

        $resultArr = WbController::getArrayWithForeignModelFromQueryResult($result, $modelClassArr);
        return $resultArr;
    }

    public function joinSelectOne() {
        $result = $this->joinSelect();
        if (!is_null($result) && count($result) > 0)
            return $result[0];
    }

}
