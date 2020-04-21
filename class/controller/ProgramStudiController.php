<?php

class ProgramStudiController extends WbController {

    public function insert($model){

    }

    public function update($model){

    }

    public function delete(){

    }

    public function select(){
        $sql = "SELECT * FROM program_studi";
        $result = mysqli_query($this->connection, $sql);
        $arrResult = Array();
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
