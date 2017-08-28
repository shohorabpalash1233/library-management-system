<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php

	class Registration
	{
		private $db;
		private $fm;

		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}


		public function studentRegister($data){
			$firstname 		= $this->fm->validation($data['firstname']);
			$lastname 		= $this->fm->validation($data['lastname']);
			$username 		= $this->fm->validation($data['username']);
			$password 		= $this->fm->validation($data['password']);
			$email 			= $this->fm->validation($data['email']);
			$contact 		= $this->fm->validation($data['contact']);
			$sem 			= $this->fm->validation($data['sem']);
			$enrollmentno 	= $this->fm->validation($data['enrollmentno']);
			

			$firstname 		= mysqli_real_escape_string($this->db->link, $data['firstname']);
			$lastname 		= mysqli_real_escape_string($this->db->link, $data['lastname']);
			$username 		= mysqli_real_escape_string($this->db->link, $data['username']);
			$password 		= mysqli_real_escape_string($this->db->link, md5($data['password']));
			$email 			= mysqli_real_escape_string($this->db->link, $data['email']);
			$contact 		= mysqli_real_escape_string($this->db->link, $data['contact']);
			$sem 			= mysqli_real_escape_string($this->db->link, $data['sem']);
			$enrollmentno 	= mysqli_real_escape_string($this->db->link, $data['enrollmentno']);
			
			if ($firstname == "" || $lastname == "" || $username == "" || $password == "" || $email == "" || $contact == "" || $sem == "" || $enrollmentno == "") {

		    	$msg = "<span class='error'>Fields Must Not Be Empty</span>";
				return $msg;

		    	}

		    	$mailQuery = "SELECT * FROM tbl_registration WHERE email = '$email' LIMIT 1";
		    	$mailCheck = $this->db->select($mailQuery);
		    	if ($mailCheck != false) {
		    		$msg = "<span class='error'>Email Already Exists!</span>";
					return $msg;
		    	}else{
		    		$query = "INSERT into tbl_registration(firstname, lastname, username, password, email, contact, sem, enrollmentno) 		  
		    		VALUES 
			    	('$firstname', '$lastname', '$username', '$password', '$email', '$contact', '$sem', '$enrollmentno')";

					$customerIns = $this->db->insert($query);

					if ($customerIns) {
						$msg = "<span class='success'>Student Registered successfully</span>";
						return $msg;
					} else {
						$msg = "<span class='error'>Student is not registered!</span>";
						return $msg;
					}
		    }
		}
	}
?>