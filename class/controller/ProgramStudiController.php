<?php

class ProgramStudiController extends WbController {

    public function insert($model){
        $col = implode(", ", $newModel->getColumns());
        $valArr = array_map(
            function ($x) { return $x == "NULL" ? $x : "'" . $x . "'"; },
            $newModel->getAllValues()
        );
        $val = implode(", ", $valArr);

        return WbController::executeInsertQuery('program_studi', $col, $val);
    }

    public function update($model){

    }

    public function delete(){

    }

    public function select(){

        $pr = new ProgramStudi();
        $col = implode(', ', $pr->getColumns());
        $result = WbController::executeSelectQuery($col, 'program_studi', 1);

        $arrResult = WbController::getArrayFromQueryResult($result, 'ProgramStudi');

        return $arrResult;
    }
}
