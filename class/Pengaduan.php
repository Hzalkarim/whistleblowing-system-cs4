<?php
	class Pengaduan{
		private $id_pengaduan;
		private $bukti;
		private $tanggal;
		private $isi;
		private $judul;
		private $status;

		function setIdPengaduan($id_pengaduan){
			$this->id_pengaduan = $id_pengaduan;
		}

		function getIdPengaduan(){
			return $this->id_pengaduan;
		}

		function setBukti($bukti){
			$this->bukti = $bukti;
		}

		function getBukti(){
			return $this->bukti;
		}

		function setTanggal($tanggal){
			$this->tanggal = $tanggal;
		}

		function getTanggal(){
			return $this->tanggal;
		}

		function setIsi($isi){
			$this->isi = $isi;
		}

		function getIsi(){
			return $this->isi;
		}

		function setJudul($judul){
			$this->judul = $judul;
		}

		function getJudul(){
			return $this->judul;
		}
		function setStatus($status){
			$this->status = $status;
		}

		function getStatus(){
			return $this->status;
		}
	}
?>