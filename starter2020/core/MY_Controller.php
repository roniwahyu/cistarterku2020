<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	
}
// class Dashboard_Controller extends MY_Controller {
class Dashboard_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->temp->set_theme(THEMES);
        $this->temp->set_layout('_dashboardv0');
        if (!$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
        // $this->load->library('response');
    }
}
class Admin_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
        $this->load->library(array('pagination','template','form_validation'));
        $this->template->set_layout('dashboardv0');
        $this->template->set_theme(THEMES);
    }
}
class User_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->temp->set_theme(THEMES);
        $this->temp->set_layout('_dashboardv0');
        if (!$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
        // $this->load->library('response');
    }
}

/* End of file MY_Controller.php */
/* Location: ./application/controllers/MY_Controller.php */ ?>