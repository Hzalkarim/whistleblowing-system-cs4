<?php
	class Mahasiswa{
		private $nama;
		private $nim;
		private $no_telp;
		private $alamat;
		private $gender;
		private $prodi;

		function setNama($nama){
			$this->nama = $nama;
		}

		function getNama(){
			return $this->nama; 
		}

		function setNim($nim){
			$this->nim = $nim;
		}

		function getNim(){
			return $this->nim;
		}

		function setNoTelp($no_telp){
			$this->no_telp = $no_telp;
		}

		function getNoTelp(){
			return $this->no_telp;
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

		function setProdi($prodi){
			$this->prodi = $prodi;
		}

		function getProdi(){
			return $this->prodi;
		}
	}
?>