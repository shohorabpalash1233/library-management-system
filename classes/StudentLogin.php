<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
	include_once ($filepath.'/../lib/Session.php');
	Session::init();
?>
<?php

	class StudentLogin
	{
		private $db;
		private $fm;

		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function StudentLogin($data){
			$username 		= $this->fm->validation($data['username']);
			$password 		= $this->fm->validation($data['password']);

			$username 		= mysqli_real_escape_string($this->db->link, $data['username']);
			$password 		= mysqli_real_escape_string($this->db->link, md5($data['password']));

			if (empty($username) || empty($password)) {
				$msg = "<span class='error'>Field must not be empty</span>";
				return $msg;
			}

			$query = "SELECT * FROM tbl_registration WHERE username = '$username' AND password = '$password' AND status = 'yes' ";
			$result = $this->db->select($query);

			if ($result != false) {
				$value = $result->fetch_assoc();
				Session::set("login", true);
				Session::set("stuid", $value['id']);
				Session::set("stuname", $value['username']);
				header("Location: index.php");
			} else {
				$msg = "<span class='error'>Username and Password Not Matched</span>";
				return $msg;
			}
		}



	}
?>