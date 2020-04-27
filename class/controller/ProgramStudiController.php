<?php

class ProgramStudiController extends WbController {

    public function insert($model){

    }

    public function update($model){

    }

    public function delete(){

    }

    public function select(){

        $condition = $this->getPrimaryKeyCondition();
        $condition = is_null($condition) ? 1 : $condition;

        $pr = new ProgramStudi();
        $col = implode(', ', $pr->getColumns());

        $result = WbController::executeSelectQuery($col, 'program_studi', $condition);

        $arrResult = WbController::getArrayFromQueryResult($result, 'ProgramStudi');

        return $arrResult;
    }
}
