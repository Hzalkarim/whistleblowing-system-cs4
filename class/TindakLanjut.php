<?php
	class TindakLanjut{
		private $deskripsi;
		private $tanggal;

		function set_deskripsi($deskripsi){
			$this->deskripsi = $deskripsi;
		}

		function get_deskripsi(){
			return $this->deskripsi;
		}

		function set_tanggal($tanggal){
			$this->tanggal = $tanggal;
		}

		function get_tanggal(){
			return $this->tanggal;
		}
	}
?>