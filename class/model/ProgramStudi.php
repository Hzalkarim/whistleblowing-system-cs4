<?php

class ProgramStudi extends WbModel {

    private $kode;
    private $nama;

    public function getPrimaryKey() {
        return $this->getKode();
    }

    protected function setTableName() {
        $this->tableName = 'program_studi';
    }

    protected function setForeignKeys() {
        
    }

    protected function setColumnFunc() {
        $colfun = Array(
            "kode" => "Kode",
            "nama" => "Nama"
        );

        $this->columnFunc = $colfun;
    }

    public function getKode(){
        return $this->kode;
    }

    public function setKode($kode) {
        $this->kode = $kode;
    }

    public function getNama(){
        return $this->nama;
    }

    public function setNama($nama) {
        $this->nama = $nama;
    }

}
