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
        $sql = "INSERT INTO basic_pengaduan ($col) VALUES ($val)";

        return mysqli_query($this->connection, $sql);
    }

    public function update($model){

    }

    public function delete(){

    }

    public function select(){
        $condition = $this->getPrimaryKeyCondition();
        $condition = is_null($condition) ? 1 : $condition;

        $p = new Pengaduan();
        $col = implode(', ', $p->getColumns());

        $sql = "SELECT {$col} FROM {$this->table_view} WHERE {$condition}";
        $result = mysqli_query($this->connection, $sql);

        $arrResult = Array();
        if (!$result) return $arrResult;
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
        $resultOne = mysqli_query($this->connection, $sql);
        $data = mysqli_fetch_assoc($resultOne);

        return $data['total'];
    }

}
