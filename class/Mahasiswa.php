<?php
	class Mahasiswa{
		private $nama;
		private $nim;
		private $email;
		private $password;
		private $noTelp;
		private $alamat;
		private $gender;
		private $prodi;

		function set_nama($nama){
			$this->nama = $nama;
		}

		function get_nama(){
			return $this->nama; 
		}

		function set_nim($nim){
			$this->nim = $nim;
		}

		function get_nim(){
			return $this->nim;
		}

		function set_email($email){
			$this->email = $email;
		}

		function get_email(){
			return $this->email;
		}

		function set_password($password){
			$this->password = $password;
		}

		function get_password(){
			return $this->password;
		}

		function set_noTelp($noTelp){
			$this->noTelp = $noTelp;
		}

		function get_noTelp(){
			return $this->noTelp;
		}

		function set_alamat($alamat){
			$this->alamat = $alamat;
		}

		function get_alamat(){
			return $this->alamat;
		}

		function set_gender($gender){
			$this->gender = $gender;
		}

		function get_gender(){
			return $this->gender;
		}

		function set_prodi($prodi){
			$this->prodi = $prodi;
		}

		function get_prodi(){
			return $this->prodi;
		}
	}
?>