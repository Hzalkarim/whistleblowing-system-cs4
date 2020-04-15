<?php
	class User extends WbModel{
		private $user_id;
		private $email;
		private $password;
		private $nama;
		private $role;


		function setUserId($user_id){
			$this->user_id = $user_id;
		}

		function getUserId(){
			return $this->user_id;
		}

		function setEmail($email){
			$this->email = $email;
		}

		function getEmail(){
			return $this->email;
		}

		function setNama($nama){
			$this->nama = $nama;
		}

		function getNama(){
			return $this->nama;
		}

		function setPassword($password){
			$this->password = $password;
		}

		function getPassword(){
			return $this->password;
		}

		function setRole($role){
			$this->role = $role;
		}

		function getRole(){
			return $this->role;
		}

		protected function setColumnFunc() {
			$colfun = Array(
				"user_id" => "UserId",
				"email" => "Email",
				"pwd" => "Password",
				"nama" => "Nama"
			);

			$this->columnFunc = $colfun;
		}
	}
?>
