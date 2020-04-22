<?php

class KategoriController extends WbController {

    public function insert($model){

    }

    public function update($model){

    }

    public function delete(){

    }

    public function select(){
        $sql = "SELECT * FROM kategori";
        $result = mysqli_query($this->connection, $sql);
        $arrResult = Array();
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
