<?php
	class Kategori{
		private $id_kategori;
		private $Nama;

		function setIdKategori($id_kategori){
			$this->Id_kategori = $Id_kategori;
		}

		function getIdKategori(){
			return $this->Id_kategori;
		}

		function setNama($nama){
			$this->nama = $nama;
		}

		function getNama(){
			return $this->nama;
		}
	}
?>