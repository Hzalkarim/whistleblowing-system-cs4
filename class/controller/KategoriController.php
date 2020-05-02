<?php

class KategoriController extends WbController {

    public function insert($model){

    }

    public function update($model){

    }

    public function delete(){

    }

    public function select(){

        $condition = $this->getModel()->getConditions();
        $condition = is_null($condition) ? 1 : $condition;

        $kt = new Kategori();
        $col = implode(', ', $kt->getColumns());

        $ktTable = $kt->getTableName();

        $result = WbController::executeSelectQuery($col, $ktTable, $condition);

        $arrResult = WbController::getArrayFromQueryResult($result, 'Kategori');

        return $arrResult;
    }

}
