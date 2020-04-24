<?php

class PengaduanController extends WbController {

    private $table_view;

    public function setTableOrView($table_view) {
        $this->table_view = $table_view;
        return $this;
    }

    public function insert($newModel){
        $newModel->setColumnFuncType($this->table_view);
        $col = implode(", ", $newModel->getColumns());
        $valArr = array_map(
            function ($x) { return $x == "NULL" ? $x : "'" . $x . "'"; },
            $newModel->getAllValues()
        );
        $val = implode(", ", $valArr);


        return WbController::executeInsertQuery('basic_pengaduan', $col, $val);
    }

    public function update($model){

    }

    public function delete(){

    }

    public function select(){
        $condition = $this->getPrimaryKeyCondition();
        $condition = is_null($condition) ? 1 : $condition;

        $p = new Pengaduan();
        $p->setColumnFuncType($this->table_view);
        $col = implode(', ', $p->getColumns());

        $result = WbController::executeSelectQuery($col, $this->table_view, $condition);

        if (!$result) return NULL;
        $arrResult = Array();
        $count = 0;
        if (mysqli_num_rows($result) > 0){
            while ($data = mysqli_fetch_array($result)){

                $pengaduan = new Pengaduan();
                $pengaduan->setColumnFuncType($this->table_view);
                $pengaduan->setAllValues($data);

                $arrResult[$count] = $pengaduan;
                $count++;
            }
        }

        return $arrResult;
    }

    public function getCount(){
        $sql = "CALL `get_pengaduan_count`()";
        $resultOne = mysqli_query(WbController::$stConnection, $sql);
        $data = mysqli_fetch_assoc($resultOne);

        return $data['total'];
    }

}
