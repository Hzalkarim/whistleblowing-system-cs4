<?php
	class Admin{
		private $nama;
		private $no_telp;
		private $email;
		private $password;
		private $alamat;
		private $gender;

		function setNama($nama){
			$this->nama = $nama;
		}

		function getNama(){
			return $this->nama;
		}

		function setNoTelp($no_telp){
			$this->no_telp = $no_telp;
		}

		function getNoTelp(){
			return $this->no_telp;
		}

		function setEmail($email){
			$this->email = $email;
		}

		function getEmail(){
			return $this->email;
		}

		function setPassword($password){
			$this->password = $password;
		}

		function getPassword(){
			return $this->password;
		}

		function setAlamat($alamat){
			$this->alamat = $alamat;
		}

		function getAlamat(){
			return $this->alamat;
		}

		function setGender($gender){
			$this->gender = $gender;
		}

		function getGender(){
			return $this->gender;
		}
	}
?>