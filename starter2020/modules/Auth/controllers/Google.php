<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Google\Client;
class Google extends CI_Controller {
	function __construct(){
		parent::__construct();
		
		$this->load->library(['ion_auth', 'form_validation','session']);
		$this->load->config('google_config');
		$this->load->model('ion_auth_model','authdb',true);
		$this->load->helper(['url', 'language']);
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));


        $this->client = new Google_Client();
		$this->client->setClientId($this->config->item('google_client_id'));
		$this->client->setClientSecret($this->config->item('google_client_secret'));
		$this->client->setRedirectUri($this->config->item('google_redirect_url'));
		$this->client->setScopes(array(
			"https://www.googleapis.com/auth/plus.login",
			"https://www.googleapis.com/auth/plus.me",
			"https://www.googleapis.com/auth/userinfo.email",
			"https://www.googleapis.com/auth/userinfo.profile",
			// "https://www.googleapis.com/auth/user.birthday.read"
			)
		);
	}
	public function get_login_url(){
		return  $this->client->createAuthUrl();

	}
	public function validate(){
		if (isset($_GET['code'])) {
		  $this->client->authenticate($_GET['code']);
		  $_SESSION['access_token'] = $this->client->getAccessToken();

		}
		if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
		  $this->client->setAccessToken($_SESSION['access_token']);
		  $this->client->addScope("email");
    		$this->client->addScope("profile");
    		// $this->client->addScope("login");
    		$service = new Google_Service_Oauth2($this->client);
    		// $people=$service->user->get();
    		$user = $service->userinfo->get(); //get user info 
    		// echo "<pre>";
    		// print_r($user);
			$info['id']=$user->id;
			$info['email']=$user->email;
			$info['name']=$user->name;
			$info['link']=$user->link;
			$info['profile_pic']=$user->picture;
	

		   	return  $info;
		}
	}
	public function index()
	{
		$data['google_login_url']=$this->get_login_url();
		
		// print_r($this->config->item('google_redirect_url'));
		// echo "<img src='".$this->session->userdata('profile_pic')."'>";
		// print_r($google_data);
		$this->load->view('google/home',$data);
	}
	public function oauth2callback(){
		$google_data=$this->validate();
		$session_data=array(
				'id_google'=>$google_data['id'],
				'name_google'=>$google_data['name'],
				'email_google'=>$google_data['email'],
				'source'=>'google',
				'profile_pic_google'=>$google_data['profile_pic'],
				'link_google'=>$google_data['link'],
				'sess_logged_in'=>1
				);
			$this->session->set_userdata($session_data);
			$this->cek_google_ion_auth();
			// redirect(base_url('auth/google'));
			redirect(base_url('members'));
	}
	function getsession(){
		$session=$this->session->userdata();
		// print_r($session);
		return $session;
	}
	function cek_google_ion_auth(){
		$this->CI =& get_instance();
		// $auth=$this->load->module('auth');
		$userdata=$this->getsession();
		if(!empty($userdata['email_google'])){
			print_r($userdata['email_google']);
			$this->dummypass = '@passwordnyagoogle123456#';
			// echo "<pre>";
			// print_r($this->CI->ion_auth_model->identity_check($userdata['email_google']));

			if(!$this->CI->ion_auth_model->identity_check($userdata['email_google'])){
			// if(!$this->authdb->identity_check($userdata['email_google'])){
						$username = 'user_google_'.$userdata['id_google']; // generate username with facebook id
						$name=explode(" ",$userdata['name_google']);
						$register = $this->CI->ion_auth->register($username, $this->dummypass, $userdata['email_google'], array(
							'first_name'  => $name[0],
							'last_name'   => !empty($name[1])?$name[1]:'',
							'oauth_provider'   => 'google',
							'oauth_uid'=>$userdata['id_google'],
							'picture'=>$userdata['profile_pic_google'],
							'active'=>1,
							'created'=>now(),
					));
			}
			// $login = $auth->login($userdata['email_google'], $this->dummypass, 1);
			$login = $this->CI->ion_auth->login($userdata['email_google'], $this->dummypass, 1);
			// print_r($login);
		}else{
			return false;
		}
	}

}

/* End of file Google.php */
/* Location: .//D/xampp7/htdocs/cipasarumkm/pasarumkm/modules/Auth/controllers/Google.php */ ?>