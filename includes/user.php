<?php

/**
 * User Class For Account Creation and Login
 */
class User
{
	private $con;
	function __construct()
	{
		# code...
		include_once("../database/db.php");
		$db = new Database();
		$this->con = $db->connect();
	}

	// Check If User Is Registered Or Not

	private function emailExists($email){
		$pre_stmt = $this->con->prepare("SELECT id FROM user WHERE email = ?");
		$pre_stmt->bind_param("s", $email);
		$pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();

		if ($result->num_rows > 0) {
			# code...
			return 1;
		}else{
			return 0;
		}
	}

	public function createUserAccount($username,$email,$password,$usertype){
		// Use Of Prepared Statements To Protect Against SQL Attacks

		if ($this->emailExists($email)) {
			# code...
			return "Email Already Exits";
		}else{
			$pass_hash = password_hash($password, PASSWORD_BCRYPT, ["cost"=>8]);
			$date = date("Y-m-d");
			$note = "";

			$pre_stmt = $this->con->prepare("INSERT INTO `user`(`username`, `email`, `password`, `usertype`, `register_date`, `last_login`, `notes`) VALUES (?,?,?,?,?,?,?)");
			$pre_stmt->bind_param("sssssss", $username,$email,$pass_hash,$usertype,$date,$date,$note);
			$result = $pre_stmt->execute() or die($this->con->error);

			if ($result) {
				# code...
				return $this->con->insert_id;
			}else{
				return "SOME_ERROR";
			}
		}
		
	}

	public function userLogin($email,$password){
		$pre_stmt = $this->con->prepare("SELECT id,username,password,last_login,usertype FROM user WHERE email = ?");
		$pre_stmt->bind_param("s", $email);
		$pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();

		if ($result->num_rows < 1) {
			# code...
			return "Not Registered";
		}else{

			$row = $result->fetch_assoc();

			if (password_verify($password, $row["password"])) {
				# code...
				$_SESSION["userid"] = $row["id"];
				$_SESSION["username"] = $row["username"];
				$_SESSION["last_login"] = $row["last_login"];
				$_SESSION["usertype"] = $row["usertype"];
                

                //Update User Last_Login When Logged in
                $last_login = date("Y-m-d h:m:s");
				$pre_stmt = $this->con->prepare("UPDATE user SET last_login = ? WHERE email = ?");
				$pre_stmt->bind_param("ss", $last_login,$email);
				$result = $pre_stmt->execute() or die($this->con->error);

				if ($result) {
					# code...
					//return $this->con->insert_id;
					if ($row["usertype"] == "Admin") {
						# code...
						return "Admin";
					}else{

						return "Customer";
					}
				}else{
					return 0;
				}		
			}else{
				return "Password Doesnot Match";
			}
		}
	}
}

//$user = new User();
//echo $user->createUserAccount("Ed","goddyedmond1@gmail.com","1234567890","Admin"); 

//echo $user->userLogin("goddyedmond1@gmail.com","1234567890");

//echo $_SESSION["username"];

?>