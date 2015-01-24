<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		error_reporting(0);
		if($this->session->userdata("user")){
			redirect(base_url()."index.php/home");
		}
	}
	function returnMessage($status,$code,$message){
		header("Content-type:application/json");
		$response["status"] = $status;
		$response["code"] = $code;
		$response["message"] = $message;
		return json_encode($response,JSON_PRETTY_PRINT);
	}
	public function index()
	{
		$this->load->view('login');
	}
	public function facebookLogin(){
		$this->load->library('facebook');
		$url = $this->facebook->get_login_url();
		redirect($url);
	}
	public function checkFacebook()
	{
		$this->load->library('facebook');
		$fbToken = $this->session->userdata("fb_token");
		if($fbToken){
		$facebook =  $this->facebook->get_user();
		$statement = 'SELECT ID from users where facebookId = ?';
		$sql = $this->db->query($statement,array($facebook["id"]));
		if($sql->num_rows() == 0){
		$statement = 'INSERT INTO users 
		(name,
		surname,
		username,
		email,
		password,
		gender,
		birthday,
		location,
		isFbUser,
		facebookId,
		registrationDate,
		lastAccessDate) VALUES 
		(?,?,?,?,?,?,?,?,?,?,?,?)';
		$gender = 1;
		if($facebook["gender"]=="female"){
			$gender = 2;
		}
		$sql = $this->db->query($statement,array($facebook["first_name"],
							$facebook["last_name"],
							NULL,
							$facebook["email"],
							NULL,
							$gender,
							date('Y-m-d',strtotime($facebook["birthday"])),
							$facebook["location"]->name,
							1,
							$facebook["id"],
							date('Y-m-d H:i:s'),
							date('Y-m-d H:i:s')));
		}else{
			$statement = 'UPDATE users set lastAccessDate = ? where facebookId = ?';
			$sql = $this->db->query($statement,array(date('Y-m-d H:i:s'),$facebook["id"]));
		}
			$statement = "select id,name,surname,email,password from users where facebookId = ?";
			$sql = $this->db->query($statement,array($facebook["id"]));
			$row = $sql->row();
			$data = array(
				'user'  		=> $row->id,	
		                   	'first_name'  	=> $row->name,
		                   	'last_name'  	=> $row->surname,
		                   	'email'     	=> $row->email,
		                   	'facebookId'     => $facebook["id"],
		                   	'name'  	=> $row->name." ".$row->surname,
		                   	'logged_in' 	=> TRUE
		               );
			$this->session->set_userdata($data);
			$data['user'] =  $this->facebook->get_user();
			$userId = $data["user"]["id"];
			$data["pictures"] = $this->facebook->getProfilePictures();
			$sql = $this->db->query("select photo,photoThumb from photos where userId = $row->id");
			if($sql->num_rows() > 0){
				foreach ($sql->result() as $photoRow){
					$photo = $photoRow->photo;
					$photoThumb = $photoRow->photoThumb;
					unlink($photoThumb);
					unlink($photo);
				}
			}
			$sql = $this->db->query("delete from photos where userId = $row->id and isFbPhoto = 1");
			foreach ($data["pictures"]["thumbs"] as $key => $picture) {
				$getPicture = file_get_contents($picture);
				$getBigPicture = file_get_contents($data["pictures"]["originals"][$key]);
				$rand = microtime(true);
				$file = fopen('img/uploads/thumbs/'.$userId.$rand.$key.'.jpg', 'w+');
				$fileOrg = fopen('img/uploads/original/'.$userId.$rand.$key.'.jpg', 'w+');
				fputs($file, $getPicture);
				fputs($fileOrg, $getBigPicture);
				fclose($file);
				fclose($fileOrg);
				$statement = "insert into photos (userId,photo,photoThumb,isFbPhoto) values (?,?,?,?)";
				$sql = $this->db->query($statement,array($row->id,'img/uploads/original/'.$userId.$rand.$key.'.jpg','img/uploads/thumbs/'.$userId.$rand.$key.'.jpg',1));
	                        }
			redirect(base_url()."index.php/home");
		}else{
			redirect(base_url());
		}
	}
	function userLogin(){
		if($_POST){
		$username = @$_POST["username"];
		$password = @$_POST["password"];
		if(strlen($username) < 1){
			echo $this->returnMessage("error",3,"Please enter your username.");
		}else
		if(strlen($password) < 1){
			echo $this->returnMessage("error",3,"Please enter your password.");
		}else{
			$statement = "select id,name,surname,email,password,facebookId from users where username = ?";
			$sql = $this->db->query($statement,array($username));
			$row = $sql->row();
			if($sql->num_rows() > 0){
				if($password != $row->password){
					echo $this->returnMessage("error",2,"Your password is wrong.");	
				}else{
					$data = array(
						'user'  		=> $row->id,	
				                   	'first_name'  	=> $row->name,
				                   	'last_name'  	=> $row->surname,
				                   	'email'     	=> $row->email,
				                   	'facebookId'     => $row->facebookId,
				                   	'name'  	=> $row->name." ".$row->surname,
				                   	'logged_in' 	=> TRUE
				               );
					$this->session->set_userdata($data);
					echo $this->returnMessage("success",0,"Login successfull.");
					}
				}else{
					echo $this->returnMessage("error",1,"No such user found.");
				}
			}
		}else{
			echo $this->returnMessage("error",4,"You never think it lacked the common sense we wished for.");
		}
	}
}