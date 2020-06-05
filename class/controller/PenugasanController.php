<?php

class PenugasanController extends WbController {

    public function insert($model){
        $col = implode(", ", $model->getColumns());
        $valArr = array_map(
            function ($x) { return $x == "NULL" ? $x : "'" . $x . "'"; },
            $model->getAllValues()
        );
        $val = implode(", ", $valArr);

        return WbController::executeInsertQuery('penugasan', $col, $val);
    }

    public function update($model){}

    public function delete(){
        $condition = !is_null($this->condition) ? $this->condition : 0;

        return WbController::executeDeleteQuery('penugasan', $condition);
    }

    public function select(){
        $condition = !is_null($this->condition) ? $this->condition : 1;

        $tugas = new Penugasan();
        $col = implode(', ', $tugas->getColumns());

        $result = WbController::executeSelectQuery($col, 'penugasan', $condition);
        $arrResult = WbController::getArrayFromQueryResult($result, 'Penugasan');

        return $arrResult;
    }

    public function joinSelect() {
        $condition = !is_null($this->condition) ? $this->condition : 1;

        $png = new Penugasan();
        $adm = new User();
        $plj = new PenindakLanjut();
        $pgd = new Pengaduan();

        $colAdm = array_map(
            function($x) { return 'user.'.$x.' as u_'.$x; },
            $adm->getColumns()
        );
        $colPlj = array_map(
            function($x) { return 'penindak_lanjut.'.$x.' as pl_'.$x; },
            $plj->getColumns()
        );
        $colPgd = array_map(
            function($x) { return 'pengaduan.'.$x.' as pg_'.$x; },
            $pgd->getColumns()
        );
        $colArr = array_merge($colAdm, $colPlj, $colPgd);
        $col = implode(", ", $colArr);

        $table = "penugasan JOIN user ON penugasan.user_id_admin = user.id
                    JOIN penindak_lanjut ON penugasan.id_pegawai = penindak_lanjut.id_pegawai
                    JOIN pengaduan ON penugasan.id_pengaduan = pengaduan.id";

        $result = WbController::executeSelectQuery($col, $table, $condition);

        $modelClassArr = Array(
            "Penugasan" => 0,
            "User" => count($colAdm),
            "PenindakLanjut" => count($colPlj),
            "Pengaduan" => count($colPgd)
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
