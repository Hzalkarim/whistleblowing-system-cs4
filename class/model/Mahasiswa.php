<?php
class Mahasiswa extends WbModel{
	private $nim;
	private $user_id;
	private $prodi;

	protected function setColumnFunc(){
		$colfun = Array(
			"nim" => "Nim",
			"user_id" => "UserId",
			"kode_prodi" => "Prodi"
		);

		$this->columnFunc = $colfun;
	}

	public function getNim(){
	    return $this->nim;
	}

	    public function setNim($nim) {
	    $this->nim = $nim;
	}

	public function getUserId(){
	    return $this->user_id;
	}

	public function setUserId($user_id) {
	    $this->user_id = $user_id;
	}

	public function getProdi(){
	    return $this->prodi;
	}

	public function setProdi($prodi) {
	    $this->prodi = $prodi;
	}

}
