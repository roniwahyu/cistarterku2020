<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Members extends Admin_Controller{
	function __construct(){
		parent::__construct();
		
        //Load IgnitedDatatables Library
        $this->temp->set_theme(THEMES);
        $this->temp->set_layout('dashboardv0');
       
        // $this->load->model('members_model','mdb',TRUE);
       
     
        if ( !$this->ion_auth->logged_in()): 
                    redirect('auth/login', 'refresh');
        else:
            //Officers
            if(!$this->ion_auth->in_group(2)){
                redirect('auth/login', 'refresh');
            }
        endif;
      
	}
	function index(){
     
        $user = $this->ion_auth->user()->row();
        $datax=array();
        // print_r($user->username);
        // $mhs=$this->cek_mhs($user->username);
        // print_r($mhs);
        
        $this->temp->render('site',['mhs'=>$user]);

    }
    function cek_mhs($nim){
        $user=$this->ion_auth->user()->row();
        // $nim=$user->username;
        $id=$user->id;
        $mhs=$this->mdb->get_one_mhs($nim);
        // print_r($mhs);
        return $mhs;
    }

    function isi_form($nim){

    }

    

    

    
}

 ?>
