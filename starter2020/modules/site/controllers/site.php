<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->temp->set_theme(THEMES);
		$this->temp->set_layout('dashboard');
	}

	public function index()
	{
		$this->temp->render('site');
	}

}

/* End of file site.php */
/* Location: ./application/controllers/site.php */ ?>