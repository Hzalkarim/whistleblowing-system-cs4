<?php
	class WakabidMhs{
		private $nama;
		private $NIDN;
		private $email;
		private $password;
		private $alamat;
		private $noTelp;
		private $gender;

		function set_nama($nama){
			$this->nama = $nama;
		}

		function get_nama(){
			return $this->nama;
		}

		function set_NIDN($NIDN){
			$thsi->NIDN = $NIDN;
		}

		function get_NIDN(){
			return $this->NIDN;
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

		function set_alamat($alamat){
			$this->alamat = $alamat;
		}

		function get_alamat(){
			return $this->alamat;
		}

		function set_noTelp($noTelp){
			$this->noTelp = $noTelp;
		}

		function get_noTelp(){
			return $this->noTelp;
		}

		function set_gender($gender){
			$this->gender = $gender;
		}

		function get_gender(){
			return $this->gender;
		}
	}
?>