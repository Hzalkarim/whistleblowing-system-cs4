<?php
	class Pengaduan{
		private $IDPengaduan;
		private $bukti;
		private $tanggal;
		private $isi;
		private $judul;
		private $status;

		function set_IDPengaduan($IDPengaduan){
			$this->IDPengaduan = $IDPengaduan;
		}

		function get_IDPengaduan(){
			return $this->IDPengaduan;
		}

		function set_bukti($bukti){
			$this->bukti = $bukti;
		}

		function get_bukti(){
			return $this->bukti;
		}

		function set_tanggal($tanggal){
			$this->tanggal = $tanggal;
		}

		function get_tanggal(){
			return $this->tanggal;
		}

		function set_isi($isi){
			$this->isi = $isi;
		}

		function get_isi(){
			return $this->isi;
		}

		function set_judul($judul){
			$this->judul = $judul;
		}

		function get_judul(){
			return $this->judul;
		}
		function set_status($status){
			$this->status = $status;
		}

		function get_status(){
			return $this->status;
		}
	}
?>