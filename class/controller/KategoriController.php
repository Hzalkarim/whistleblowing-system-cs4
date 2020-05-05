<?php

class KategoriController extends WbController {

    public function insert($model){

    }

    public function update($model){

    }

    public function delete(){

    }

    public function select(){

        $kt = new Kategori();
        $col = implode(', ', $kt->getColumns());

        $ktTable = $kt->getTableName();

        $result = WbController::executeSelectQuery($col, $ktTable, 1);

        $arrResult = WbController::getArrayFromQueryResult($result, 'Kategori');

        return $arrResult;
    }

}
