<?php

class KategoriController extends WbController {

    public function insert($model){

    }

    public function update($model){

    }

    public function delete(){

    }

    public function select(){

        $condition = $this->getPrimaryKeyCondition();
        $condition = is_null($condition) ? 1 : $condition;

        $kt = new Kategori();
        $col = implode(', ', $kt->getColumns());

        $ktTable = $kt->getTableName();

        $result = WbController::executeSelectQuery($col, $ktTable, $condition);

        $arrResult = Array();
        if (!$result) return $arrResult;
        $count = 0;
        if (mysqli_num_rows($result) > 0){
            while ($data = mysqli_fetch_array($result)){

                $kategori = new Kategori();
                $kategori->setAllValues($data);

                $arrResult[$count] = $kategori;
                $count++;
            }
        }

        return $arrResult;
    }

}
