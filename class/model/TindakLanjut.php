<?php
	class TindakLanjut{
		private $deskripsi;
		private $tanggal;

		function setDeskripsi($deskripsi){
			$this->deskripsi = $deskripsi;
		}

		function getDeskripsi(){
			return $this->deskripsi;
		}

		function setTanggal($tanggal){
			$this->tanggal = $tanggal;
		}

		function getTanggal(){
			return $this->tanggal;
		}
	}
?>