<?php
	class PenindakLanjut{
		private $nama;
		private $IDPegawai;
		private $alamat;
		private $noTelp;
		private $gender;
		private $bidang;

		function set_nama($nama){
			$this->nama = $nama;
		}

		function get_nama(){
			return $this->nama;
		}

		function set_IDPegawai($IDPegawai){
			$thsi->IDPegawai = $IDPegawai;
		}

		function get_IDPegawai(){
			return $this->IDPegawai;
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

		function set_bidang($bidang){
			$this->bidang = $bidang;
		}

		function get_bidang(){
			return $this->bidang;
		}
	}
?>