<?php
class Mahasiswa extends WbModel{
	private $nim;
	private $user;
	private $prodi;

	public function setTableName(){
		$this->tableName = 'mahasiswa';
	}

	protected function setColumnFunc(){
		$colfun = Array(
			"nim" => "Nim",
			"user" => "User",
			"kode_prodi" => "Prodi"
		);

		$this->columnFunc = $colfun;
	}

	public function getPrimaryKey() {
		return $this->getNim();
	}

	public function getNim(){
	    return $this->nim;
	}

    public function setNim($nim) {
	    $this->nim = $nim;
	}

	public function getUser(){
	    return $this->user;
	}

	public function setUser($user) {
	    $this->user = $user;
	}

	public function getProdi(){
	    return $this->prodi;
	}

	public function setProdi($prodi) {
	    $this->prodi = $prodi;
	}

}
