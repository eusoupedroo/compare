<?php 
    
    class Account {

        private $con;
		private $errorArray;

		public function __construct($con) {
			$this->con = $con;
			$this->errorArray = array();
		}

		public function authenticateUser($username, $password){
            $password = md5($password);

            $verifyAccount = mysqli_query($this->con, "SELECT * FROM users WHERE username = '$username' AND password = '$password' ");
            if(mysqli_num_rows($verifyAccount) == 1){
                return true;
            } else {
                array_push($this->errorArray, Constants::$loginFailed);
                return;
            }
        }

        public function register($username, $firstName, $lastName, $emailUser, $cepUser, $addressUser, $passwordUser, $confirmPasswordUser) {
			$this->validateUsername($username);
			$this->validateFirstName($firstName);
			$this->validateLastName($lastName);
			$this->validateEmails($emailUser);
			$this->validateCepUser($cepUser);
			$this->validateAddressUsers($addressUser);
			$this->validatePasswords($passwordUser, $confirmPasswordUser);

			if(empty($this->errorArray) == true) {
				//Insert into db
				return $this->insertUserDetails($username, $firstName, $lastName, $emailUser, $cepUser, $addressUser, $passwordUser);
			}
			else {
				return false;
			}
		}

        public function getError($error) {
			if(!in_array($error, $this->errorArray)) {
				$error = "";
			}
			return "<span class='errorMessage'>$error</span>";
		}

        private function validateUsername($username){
            if(strlen($username) > 25 || strlen($username) < 5) {
				array_push($this->errorArray, Constants::$usernameCharacters);
				return;
			}

			$checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username='$username'");
			if(mysqli_num_rows($checkUsernameQuery) != 0) {
				array_push($this->errorArray, Constants::$usernameTaken);
				return;
			} 
        }

        private function validateFirstName($firstName) {
			if(strlen($firstName) > 25 || strlen($firstName) < 2) {
				array_push($this->errorArray, Constants::$firstNameCharacters);
				return;
			}
		}

		private function validateLastName($lastName) {
			if(strlen($lastName) > 25 || strlen($lastName) < 2) {
				array_push($this->errorArray, Constants::$lastNameCharacters);
				return;
			}
		}

		private function validateEmails($emailUser) {
			if(!filter_var($emailUser, FILTER_VALIDATE_EMAIL)) {
				array_push($this->errorArray, Constants::$emailInvalid);
				return;
			}

			$checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email='$emailUser'");
			if(mysqli_num_rows($checkEmailQuery) != 0) {
				array_push($this->errorArray, Constants::$emailTaken);
				return;
			}
		}

		private function validateCepUser($cepUser) {
            $cep = preg_replace("/[^0-9]/", "", $cepUser);
            
            if (strlen($cep) != 8) {
                array_push($this->errorArray, Constants::$cepInvalidCharacters);
                return;
            }
            return true;
		}

        private function validateAddressUsers($addressUser){
            if(strlen($addressUser) < 10){
                array_push($this->errorArray, Constants::$addressUserTaken);
				return;
            }
        }

        private function validatePasswords($passwordUser, $confirmPasswordUser){
            if($passwordUser != $confirmPasswordUser) {
				array_push($this->errorArray, Constants::$passwordsDoNoMatch);
				return;
			}

			if(preg_match('/[^A-Za-z0-9]/', $passwordUser)) {
				array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
				return;
			}

			if(strlen($passwordUser) > 30 || strlen($passwordUser) < 5) {
				array_push($this->errorArray, Constants::$passwordCharacters);
				return;
			}
        }

        private function insertUserDetails($username, $firstName, $lastName, $emailUser, $cepUser, $addressUser, $passwordUser) {
			$encryptedPw = md5($passwordUser);
			$date = date("Y-m-d");

			$result = mysqli_query($this->con, "INSERT INTO users VALUES ('', '$firstName', '$lastName', '$cepUser', '$addressUser', '$emailUser', '$date', '$username', '$encryptedPw')");

			return $result;
		}
        
    }
?>