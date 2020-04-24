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

        $arrResult = Array();
        if (!$result) return $arrResult;
        $count = 0;
        if (mysqli_num_rows($result) > 0){
            while ($data = mysqli_fetch_array($result)){

                $prodi = new ProgramStudi();
                $prodi->setAllValues($data);

                $arrResult[$count] = $prodi;
                $count++;
            }
        }

        return $arrResult;
    }
}
