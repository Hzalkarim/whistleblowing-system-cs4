<?php
	class PenindakLanjut{
		private $nama;
		private $id_pegawai;
		private $alamat;
		private $no_telp;
		private $gender;
		private $bidang;

		function setNama($nama){
			$this->nama = $nama;
		}

		function getNama(){
			return $this->nama;
		}

		function setIdPegawai($id_pegawai){
			$this->id_pegawai = $id_pegawai;
		}

		function getIdPegawai(){
			return $this->id_pegawai;
		}

		function setAlamat($alamat){
			$this->alamat = $alamat;
		}

		function getAlamat(){
			return $this->alamat;
		}

		function setNoTelp($no_telp){
			$this->no_telp = $no_telp;
		}

		function getNoTelp(){
			return $this->no_telp;
		}

		function setGender($gender){
			$this->gender = $gender;
		}

		function getGender(){
			return $this->gender;
		}

		function setBidang($bidang){
			$this->bidang = $bidang;
		}

		function getBidang(){
			return $this->bidang;
		}
	}
?>
