<?php
	class Kategori{
		private $IDKategori;
		private $Nama;

		function set_IDKategori($IDKategori){
			$this->IDKategori = $IDKategori;
		}

		function get_IDKategori(){
			return $this->IDKategori;
		}

		function set_nama($nama){
			$this->nama = $nama;
		}

		function get_nama(){
			return $this->nama;
		}
	}
?>