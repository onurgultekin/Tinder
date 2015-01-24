<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(!$this->session->userdata("user")){
			redirect(base_url());
		}
	}
	function getPhotos(){
		$sql = $this->db->query("select photo,photoThumb from photos where userId = ".$this->session->userdata("user")."");
			if($sql->num_rows() > 0){
				$data["noPhoto"] = false;
				foreach ($sql->result() as $photoRow){
					$data["thumbs"][] = $photoRow->photoThumb;
					$data["originals"][] = $photoRow->photo;
				}
			}else{
				$data["noPhoto"] = true;
				$data["noPhotoMessage"] = "Henüz resim yüklemediniz.";
			}
			return $data;
	}
	function getUserInformation(){
		$userId = $this->session->userdata("user");
		$sql = $this->db->query("select * from users u where u.id = $userId");
			if($sql->num_rows() > 0){
				foreach ($sql->result() as $row){
					$data["location"] = new stdClass();
					$data["location"]->name = $row->location;
					$data["link"] = "https://www.facebook.com/app_scoped_user_id/".$row->facebookId."/";
					$data["name"] = $row->name." ".$row->surname;
				}
				return $data;
			}
	}
	public function index()
	{
		if($this->session->userdata("fb_token")){
			$this->load->library('facebook');
			$data['user'] =  $this->facebook->get_user();
		}else{
			$data["user"] = $this->getUserInformation();
		}
		$data["pictures"] = $this->getPhotos();
		$this->load->view('home',$data);
	}
}