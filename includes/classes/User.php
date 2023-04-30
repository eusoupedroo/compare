<?php
	class User {

		private $con;
		private $username;
		private $mysqliData;


		private $email;
		private $cep;
		private $firstLastName;
		private $lastName;
		private $password;


		public function __construct($con, $username) {
			$this->con = $con;
			$this->username = $username;

			$query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$this->username'");
			$this->mysqliData = mysqli_fetch_array($query);


			$this->email = $this->mysqliData['email'];
			$this->cep = $this->mysqliData['cep'];
			$this->firstName = $this->mysqliData['firstName'];
			$this->lastName = $this->mysqliData['lastName'];
			$this->password = $this->mysqliData['password'];
		}

		public function getUsername() {
			return $this->username;
		}

		public function getEmail() {
			return $this->email;
		}

		public function getCEP() {
			return $this->cep;
		}

		public function getFirstName() {
			return $this->firstName;
		}

		public function getLastName() {
			return $this->lastName;
		}

		public function getPassword() {
			return $this->password;
		}

	}
?>