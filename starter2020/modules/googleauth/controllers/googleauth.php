<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class googleauth extends CI_Controller {
	 function __construct() {
        parent::__construct();
        $this->load->library('google');
        $this->load->config('google_config');
        $this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['url', 'language']);
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

    }

	public function index(){
		$data['google_login_url']=$this->google->get_login_url();
		$this->cek_google_ion_auth();
		// print_r($this->config->item('google_redirect_url'));
		// echo "<img src='".$this->session->userdata('profile_pic')."'>";
		// print_r($google_data);
		$this->load->view('home',$data);
	}
	function getsession(){
		$session=$this->session->userdata();
		// print_r($session);
		return $session;
	}
	function cek_google_ion_auth(){
		$this->CI =& get_instance();
		$userdata=$this->getsession();
		if(!empty($userdata['email_google'])){
			print_r($userdata['email_google']);
			$this->dummypass = '@passwordnyagoogle123456#';
			// echo "<pre>";
			// print_r($this->CI->ion_auth_model->identity_check($userdata['email_google']));

			if(!$this->CI->ion_auth_model->identity_check($userdata['email_google'])){
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
							// if you want to add more facebook-related fields, you will have to add them in the user table
							//'fb_id'       => $user->id,
							//'fb_info'     => serialize($user),
						));
					}
					$login = $this->CI->ion_auth->login($userdata['email_google'], $this->dummypass, 1);
		}else{
			return false;
		}
	}
	public function oauth2callback(){
		$google_data=$this->google->validate_oauth2();
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
			redirect(base_url('googleauth'));
	}
	public function oauth2callbackx(){
		$google_data=$this->google->validate();
		$session_data=array(
				'name'=>$google_data['name'],
				'email'=>$google_data['email'],
				'source'=>'google',
				'profile_pic'=>$google_data['profile_pic'],
				'link'=>$google_data['link'],
				'sess_logged_in'=>1
				);
			$this->session->set_userdata($session_data);
			redirect(base_url());
	}
	public function logout(){
		session_destroy();
		unset($_SESSION['access_token']);
			$session_data=array(
				'sess_logged_in'=>0);
		$this->session->set_userdata($session_data);
		redirect(base_url());
	}
}
