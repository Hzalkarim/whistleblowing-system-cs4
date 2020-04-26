<?php
class Penugasan extends WbModel{
	private $user_id_admin;
	private $id_pegawai;
	private $id_pengaduan;

	public function getPrimaryKey(){
		return NULL;
	}

	protected function setColumnFunc() {
		$colfun = Array(
			"user_id_admin" => "UserIdAdmin",
			"id_pegawai" => "IdPegawai",
			"id_pengaduan" => "IdPengaduan"
		);

		$this->columnFunc = $colfun;
	}

	protected function setTableName() {
		$this->tableName = 'penugasan';
	}

	protected function setForeignKeys() {
		$fk = Array(
			'user' => 'user_id_admin',
			'penindak_lanjut' => 'id_pegawai',
			'pengaduan' => 'id_pengaduan'
		);

		$this->foreignKeys = $fk;
	}

	public function getUserIdAdmin(){
		return $this->user_id_admin;
	}

	public function setUserIdAdmin($user_id_admin) {
		$this->user_id_admin = $user_id_admin;
	}

  	public function getIdPegawai(){
		return $this->id_pegawai;
	}

	public function setIdPegawai($id_pegawai) {
		$this->id_pegawai = $id_pegawai;
	}

  	public function getIdPengaduan(){
		return $this->id_pengaduan;
	}

	public function setIdPengaduan($id_pengaduan) {
		$this->id_pengaduan = $id_pengaduan;
	}

}
