<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php

	class Student
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
		    		$query = "INSERT into tbl_registration(firstname, lastname, username, password, email, contact, sem, enrollmentno, status) 		  
		    		VALUES 
			    	('$firstname', '$lastname', '$username', '$password', '$email', '$contact', '$sem', '$enrollmentno', 'no')";

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

		public function getAllStudent(){
			$query = "SELECT * FROM tbl_registration";
			$result = $this->db->select($query);
			return $result;
		}

				public function disableUser($disable){
			$query = "UPDATE tbl_registration
					  SET
					  status = 'no' 
					  WHERE id = '$disable' ";
			$update = $this->db->update($query);
			if ($update) {
				$msg = "<span class='success'>User disabled!</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>User Not disabled!</span>";
				return $msg;
			}
		}

		public function enableUser($enable){
			$query = "UPDATE tbl_registration
					  SET
					  status = 'yes' 
					  WHERE id = '$enable' ";
			$update = $this->db->update($query);
			if ($update) {
				$msg = "<span class='success'>User enabled!</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>User Not enabled!</span>";
				return $msg;
			}
		}

		public function removeUser($remove){
			$query = "DELETE FROM tbl_registration
					  WHERE id = '$remove' ";
			$update = $this->db->delete($query);
			if ($update) {
				$msg = "<span class='success'>User removed!</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>User Not removed!</span>";
				return $msg;
			}
		}

	}
?>