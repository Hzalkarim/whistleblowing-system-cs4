<?php
	class Pengaduan{
		private $bidang;
		private $lAkademik;
		private $lSarPras;
		private $lKeuangan;
		private $lPerpus;

		function set_bidang($bidang){
			$this->bidang = $bidang;
		}

		function get_bidang(){
			return $this->bidang;
		}

		function set_lAkademik($lAkademik){
			$this->lAkademik = $lAkademik;
		}

		function get_lAkademik(){
			return $this->lAkademik;
		}

		function set_lSarPras($lSarPras){
			$this->lSarPras = $lSarPras;
		}

		function get_lSarPras(){
			return $this->lSarPras;
		}

		function set_lKeuangan($lKeuangan){
			$this->lKeuangan = $lKeuangan;
		}

		function get_lKeuangan(){
			return $this->lKeuangan;
		}

		function set_lPerpus($lPerpus){
			$this->lPerpus = $lPerpus;
		}

		function get_lPerpus(){
			return $this->lPerpus;
		}
	}
?>