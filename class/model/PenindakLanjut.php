<?php
	class PenindakLanjut extends WbModel{
		private $id_pegawai;
		private $user_id;
		private $bidang;

		function setIdPegawai($id_pegawai){
			$this->id_pegawai = $id_pegawai;
		}

		function getIdPegawai(){
			return $this->id_pegawai;
		}

		function setUserId($user_id){
			$this->user_id = $user_id;
		}

		function getUserId(){
			return $this->user_id;
		}

		function setBidang($bidang){
			$this->bidang = $bidang;
		}

		function getBidang(){
			return $this->bidang;
		}

		protected function setColumnFunc() {
			$colfun = Array(
				"id_pegawai" => "IdPegawai",
				"user_id" => "UserId",
				"bidang" => "Bidang"
			);

			$this->columnFunc = $colfun;
		}
	}
?>
