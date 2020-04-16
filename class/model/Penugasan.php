<?php
	class Penugasan extends WbModel{
		private $user_id_admin;
		private $id_pegawai;
		private $id_pengaduan;

		function setUserIdAdmin($user_id_admin){
			$this->user_id_admin = $user_id_admin;
		}

		function getUserIdAdmin(){
			return $this->user_id_admin;
		}

		function setIdPegawai($id_pegawai){
			$this->id_pegawai = $id_pegawai;
		}

		function getIdPegawai(){
			return $this->id_pegawai;
		}

		function setIdPengaduan($id_pengaduan){
			$this->id_pengaduan = $id_pengaduan;
		}

		function getIdPengaduan(){
			return $this->id_pengaduan;
		}

		protected function setColumnFunc() {
			$colfun = Array(
				"user_id_admin" => "UserIdAdmin",
				"id_pegawai" => "IdAdmin",
				"id_pengaduan" => "IdPegawai"
			);

			$this->columnFunc = $colfun;
		}
	}
?>