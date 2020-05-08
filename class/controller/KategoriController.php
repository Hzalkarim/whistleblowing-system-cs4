<?php

class KategoriController extends WbController {

    public function insert($model){
        $col = $newModel->getColumns()[1];
        $val = $newModel->getAllValues()[1];

        return WbController::executeInsertQuery('kategori', $col, $val);
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
