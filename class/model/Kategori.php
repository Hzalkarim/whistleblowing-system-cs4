<?php
class Kategori extends WbModel{
	private $id;
	private $nama;

	protected function setTableName() {
		$this->tableName = 'kategori';
	}

	protected function setForeignKeys() {

	}

	protected function setColumnFunc(){
		$colfun = Array(
			'id' => 'Id',
			'nama' => 'Nama'
		);
		$this->columnFunc = $colfun;
	}

	public function getPrimaryKey(){
		return $this->getId();
	}

	public function getId(){
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

  	public function getNama(){
		return $this->nama;
	}

	public function setNama($nama) {
		$this->nama = $nama;
	}

}
