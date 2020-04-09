<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller role
 * @created on : Tuesday, 08-Oct-2019 10:02:23
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * @editor Jovin <hijovin@gmail.com>
 * Copyright 2019
 */

class Role extends Admin_Controller
{

    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('roles');
    }
    

    /**
    * List all data role
    *
    */
    public function index() 
    {
        $config = array(
            'base_url'          => site_url('role/index/'),
            'total_rows'        => $this->roles->count_all(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['roles']       = $this->roles->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('role/view',$data);
	      
    }

    

    /**
    * Call Form to Add  New role
    *
    */
    public function add() 
    {       
        $data['role'] = $this->roles->add();
        $data['action']  = 'role/save';
        
        $this->template->add_js('
                $(document).ready(function(){
                // binds form submission and fields to the validation engine
                $("#form_role").parsley();
                        });','embed');
      
        $this->template->render('role/form',$data);
    }

    /**
    * Call Form to Modify role
    *
    */
    public function edit($id='') 
    {
        if ($id != '') 
        {

            $data['role']      = $this->roles->get_one($id);
            $data['action']       = 'role/save/' . $id;           
      
            $this->template->add_js('
                     $(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    $("#form_role").parsley();
                                    });','embed');
            
            $this->template->render('role/form',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan','info'));
            redirect(site_url('role'));
        }
    }


    
    /**
    * Save & Update data  role
    *
    */
    public function save($id =NULL) 
    {
        // validation config
        $config = array(
                  
                    array(
                        'field' => 'name',
                        'label' => 'Name',
                        'rules' => 'trim|required'
                        ),
                    
                    array(
                        'field' => 'description',
                        'label' => 'Description',
                        'rules' => 'trim'
                        ),
                    
                    array(
                        'field' => 'isactive',
                        'label' => 'Isactive',
                        'rules' => 'trim|required'
                        ),
                    
                    array(
                        'field' => 'userid',
                        'label' => 'Userid',
                        'rules' => 'trim|required'
                        ),
                    
                    array(
                        'field' => 'created',
                        'label' => 'Created',
                        'rules' => 'trim'
                        ),
                    
                    array(
                        'field' => 'modified',
                        'label' => 'Modified',
                        'rules' => 'trim'
                        ),
                    
                    array(
                        'field' => 'deleted',
                        'label' => 'Deleted',
                        'rules' => 'trim'
                        ),
                    
                    array(
                        'field' => 'key',
                        'label' => 'Key',
                        'rules' => 'trim'
                        ),
                               
                  );
            
        // if id NULL then add new data
        if(!$id)
        {    
                  $this->form_validation->set_rules($config);

                  if ($this->form_validation->run() == TRUE) 
                  {
                      if ($this->input->post()) 
                      {
                          
                          $this->roles->save();
                          $this->session->set_flashdata('notify', notify('Data berhasil ditambahkan','success'));
                          redirect('role');
                      }
                  } 
                  else // If validation incorrect 
                  {
                      $this->add();
                  }
         }
         else // Update data if Form Edit send Post and ID available
         {               
                $this->form_validation->set_rules($config);

                if ($this->form_validation->run() == TRUE) 
                {
                    if ($this->input->post()) 
                    {
                        $this->roles->update($id);
                        $this->session->set_flashdata('notify', notify('Data berhasil diupdate','success'));
                        redirect('role');
                    }
                } 
                else // If validation incorrect 
                {
                    $this->edit($id);
                }
         }
    }
    
    /**
    * Detail role
    *
    */
    public function show($id='') 
    {
        if ($id != '') 
        {
            $data['role'] = $this->roles->get_one($id);            
            $this->template->render('role/show',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan','info'));
            redirect(site_url('role'));
        }
    }
    
    /**
    * Search role like ""
    *
    */   
    public function search()
    {
        if($this->input->post('q'))
        {
            $keyword = $this->input->post('q');
            
            $this->session->set_userdata(
                        array('keyword' => $this->input->post('q',TRUE))
                    );
        }
        
         $config = array(
            'base_url'          => site_url('role/search/'),
            'total_rows'        => $this->roles->count_all_search(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['pagination']     = $this->pagination->create_links();
        $data['roles']       = $this->roles->get_search($config['per_page'], $this->uri->segment(3));
       
        $this->template->render('role/view',$data);
    }
    
    /**
    * Delete role by ID
    *
    */
    public function destroy($id) 
    {        
        // Agar tabel dengan ID 0 bisa terhapus
        if ($id>=0) 
        {
            $this->roles->destroy($id);           
            $this->session->set_flashdata('notify', notify('Data berhasil dihapus','success'));
            redirect('role');
        }

    }
}
?>