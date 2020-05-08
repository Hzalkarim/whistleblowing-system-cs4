<?php

class PengaduanController extends WbController {

    private $table_view = "pengaduan";

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


        return WbController::executeInsertQuery('pengaduan', $col, $val);
    }

    public function update($model){
        $colArr = $newModel->getColumns();
        $valArr = $newModel->getAllValues();
        $setterArr = array_map(
            function ($col, $val) {
                $v = $val == "NULL" ? $val : "'" . $val . "'";
                return "{$col} = {$v}";
            }, $colArr, $valArr
        );

        array_shift($setterArr);

        $setter = implode(", ", $setterArr);

        $condition = 0;
        if (!is_null($this->condition))
            $condition = $this->condition;

        return WbController::executeUpdateQuery('pengaduan', $setter, $condition);
    }

    public function delete(){

    }

    public function select(){
        $condition = !is_null($this->condition) ? $this->condition : 1;
        $p = new Pengaduan();
        $p->setColumnFuncType($this->table_view);
        $col = implode(', ', $p->getColumns());

        $result = WbController::executeSelectQuery($col, $this->table_view, $condition);

        $arrResult = WbController::getArrayFromQueryResult($result, 'Pengaduan');


        return $arrResult;
    }

    public function joinSelect() {
        $condition = !is_null($this->condition) ? $this->condition : 1;

        $pgd = new Pengaduan();
        $mhs = new Mahasiswa();
        $kat = new Kategori();

        $colPgd = array_map(
            function($x) { return 'pengaduan.'.$x.' as p_'.$x; },
            array_slice($pgd->getColumns(), 0, 9)
        );
        $colMhs = array_map(
            function($x) { return 'mahasiswa.'.$x.' as m_'.$x; },
            $mhs->getColumns()
        );
        $colKat = array_map(
            function($x) { return 'kategori.'.$x.' as k_'.$x; },
            $kat->getColumns()
        );
        $colArr = array_merge($colPgd, $colMhs, $colKat);
        $col = implode(", ", $colArr);

        $table = "(pengaduan LEFT JOIN mahasiswa ON pengaduan.nim_mahasiswa = mahasiswa.nim)
                    LEFT JOIN kategori ON pengaduan.id_kategori = kategori.id";

        $result = WbController::executeSelectQuery($col, $table, $condition);

        $modelClassArr = Array(
            "Pengaduan" => count($colPgd),
            "Mahasiswa" => count($colMhs),
            "Kategori" => count($colKat)
        );

        $resultArr = WbController::getArrayWithForeignModelFromQueryResult($result, $modelClassArr);
        return $resultArr;
    }

    public function joinSelectOne(){
        $result = $this->joinSelect();
        if (!is_null($result) && count($result) > 0)
            return $result[0];
    }

    public function getCount(){
        $sql = "CALL `get_pengaduan_count`()";
        $resultOne = mysqli_query(WbController::$stConnection, $sql);
        $data = mysqli_fetch_assoc($resultOne);

        return $data['total'];
    }

}
