<?php
class PenindakLanjut extends WbModel{
	private $id_pegawai;
	private $user_id;
	private $bidang;

	public function getPrimaryKey(){
		return $this->getIdPegawai();
	}

  	protected function setColumnFunc(){
		$colfun = Array(
			'id_pegawai' => 'IdPegawai',
			'bidang' => 'Bidang'
			//fk
			'user_id' => 'UserId',
		);

		$this->columnFunc = $colfun;
	}

  	protected function setTableName(){
		$this->tableName = "penindak_lanjut";
	}

	public function getIdPegawai(){
		return $this->id_pegawai;
	}

	public function setIdPegawai($id_pegawai) {
		$this->id_pegawai = $id_pegawai;
	}

	public function getUserId(){
		return $this->user_id;
	}

	public function setUserId($user_id) {
		$this->user_id = $user_id;
	}

	public function getBidang(){
		return $this->bidang;
	}

	public function setBidang($bidang) {
		$this->bidang = $bidang;
	}

}
