<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Signup extends CI_Controller {

	public function index()
	{
		$this->load->view('signup');
	}
	function returnMessage($status,$code,$message){
		header("Content-type:application/json");
		$response["code"] = $code;
		$response["status"] = $status;
		$response["message"] = $message;
		return json_encode($response,JSON_PRETTY_PRINT);
	}
	public function register()
	{
		if($_POST){
			$fname = @$_POST["fname"];
			$lname = @$_POST["lname"];
			$uname = @$_POST["uname"];
			$pass = @$_POST["pass"];
			$email = @$_POST["email"];
			if(strlen($fname) < 1){
				echo $this->returnMessage("error",1,"Please enter your first name.");
			}else
			if(strlen($lname) < 1){
				echo $this->returnMessage("error",1,"Please enter your last name.");
			}else
			if(strlen($uname) < 1){
				echo $this->returnMessage("error",1,"Please enter your username.");
			}else
			if(strlen($pass) < 1){
				echo $this->returnMessage("error",1,"Please enter your password.");
			}else
			if(strlen($email) < 1){
				echo $this->returnMessage("error",1,"Please enter your email.");
			}else{
				if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					echo $this->returnMessage("error",2,"Please enter a valid email.");	
				}else{
					$statement = "select id from users where username = ? or email = ?";
					$sql = $this->db->query($statement,array($uname,$email));
					if($sql->num_rows() > 0){
						echo $this->returnMessage("error",3,"You have already registered.");
					}else{
					$statement = "insert into users (name,surname,username,password,email,registrationDate,lastAccessDate) values (?,?,?,?,?,?,?)";
					$sql = $this->db->query($statement,array($fname,$lname,$uname,$pass,$email,date('Y-m-d H:i:s'),date('Y-m-d H:i:s')));
					if(!$sql){
						echo $this->returnMessage("error",4,"Server down. Please try again later");
					}else{
						echo $this->returnMessage("success",0,"Registration successfully completed.");
					}
					}
				}
			}
		}else{
			echo $this->returnMessage("error","You never think it lacked the common sense we wished for");
		}
	}
}