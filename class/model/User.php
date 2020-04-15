<?php
	class User{
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

		public function setAllValues($data) {
			$col = $this->getColumns();

			$this->setUserId($data[$col[0]]);
			$this->setEmail($data[$col[1]]);
			$this->setPassword($data[$col[2]]);
			$this->setNama($data[$col[3]]);
		}

		public function getColumns(){
			$columns = Array(
				"user_id", "email", "pwd", "nama"
			);

			return $columns;
		}

		public function getConditions() {
			$conditions = Array();

			$db_wb_user = Array(
				"user_id" => $this->getUserId(),
				"email" => $this->getEmail(),
				"pwd" => $this->getPassword(),
				"nama" => $this->getNama()
			);

			foreach ($db_wb_user as $col => $val) {
				if (is_null($val)) continue;

				$conditions[] = "{$col} = '{$val}'";
			}

			return implode(", ", $conditions);
		}

		public function getValues() {
			$values = Array();

			$db_wb_user = Array(
				$this->getUserId(),
				$this->getEmail(),
				$this->getPassword(),
				$this->getNama()
			);

			foreach ($db_wb_user as $val) {
				if (is_null($val)){
					$values[] = "NULL";
				} else {
					$values[] = $val;
				}
			}

			return $values;
		}
	}
?>
