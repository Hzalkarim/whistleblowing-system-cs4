<?php
	class User{
		private $email;
		private $password;
		private $role;

		function setEmail($email){
			$this->email = $email;
		}

		function getEmail(){
			return $this->email;
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
	}
?>