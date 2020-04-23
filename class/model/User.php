<?php

class User extends WbModel{

	private $id;
	private $email;
	private $password;
	private $role;
	private $nama;
	private $gender;
	private $alamat;
	private $no_telp;

	public function getPrimaryKey() {
		return $this->getId();
	}

	protected function setTableName() {
		$this->tableName = 'user';
	}

	protected function setForeignKeys() {
		return NULL;
	}

	protected function setColumnFunc() {
		$colfun = Array(
			"id" => "Id",
			"email" => "Email",
			"password" => "Password",
			"role" => "Role",
			"nama" => "Nama",
			"gender" => "Gender",
			"alamat" => "Alamat",
			"no_telp" => "NoTelp"
		);

		$this->columnFunc = $colfun;
	}

	function setId($id){
		$this->id = $id;
	}

	function getId(){
		return $this->id;
	}

	function setEmail($email){
		$this->email = $email;
	}

	function getEmail(){
		return $this->email;
	}

	function setNama($nama){
		$this->nama = $nama;
	}

	function getNama(){
		return $this->nama;
	}

	function setPassword($password){
		$this->password = $password;
	}

	function getPassword(){
		return $this->password;
	}

	function setRole($role){
		$this->role = $role;
	}

	function getRole(){
		return $this->role;
	}

	public function getGender(){
	    return $this->gender;
	}

    public function setGender($gender) {
	    $this->gender = $gender;
	}

  	public function getAlamat(){
	    return $this->alamat;
	}

    public function setAlamat($alamat) {
	    $this->alamat = $alamat;
	}

  	public function getNoTelp(){
	    return $this->no_telp;
	}

    public function setNoTelp($no_telp) {
	    $this->no_telp = $no_telp;
	}
}
