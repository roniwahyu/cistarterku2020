<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller users_permissions
 * @created on : Wednesday, 09-Oct-2019 09:11:38
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * @editor Jovin <hijovin@gmail.com>
 * Copyright 2019
 */

class Users_permissions extends Admin_Controller
{

    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('users_permissionss');
    }
    

    /**
    * List all data users_permissions
    *
    */
    public function index() 
    {
        $config = array(
            'base_url'          => site_url('users_permissions/index/'),
            'total_rows'        => $this->users_permissionss->count_all(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['users_permissionss']       = $this->users_permissionss->get_all($config['per_page'], $this->uri->segment(3));

        $this->template->add_js("
            var baseurl='".base_url('users_permissions')."/';
            
            ",'embed');
        $this->template->add_js('
            var dtables;
            dtables=$("#datatables").DataTable({
                "ajax":{
                    "url":baseurl+"getdtables",
                    "dataType": "json",
                    
                }, 
            "sServerMethod": "POST",
            "bServerSide": true,

                });
            ','embed');
        $this->template->add_js('apps.js');
       
        $this->template->render('users_permissions/view',$data);
	      
    }
    public function getdtables(){
        header('Content-Type: application/json');
        echo ($this->dtables->select('user_id,perm_id,isactive,userid,created,modified,')->from('users_permissions')->generate());
    }
    

    /**
    * Call Form to Add  New users_permissions
    *
    */
    public function add() 
    {       
        $data['users_permissions'] = $this->users_permissionss->add();
        $data['action']  = 'users_permissions/save';
        
        $this->template->add_js('
                $(document).ready(function(){
                // binds form submission and fields to the validation engine
                $("#form_users_permissions").parsley();
                        });','embed');
      
        $this->template->render('users_permissions/form',$data);
    }

    /**
    * Call Form to Modify users_permissions
    *
    */
    public function edit($id='') 
    {
        if ($id != '') 
        {

            $data['users_permissions']      = $this->users_permissionss->get_one($id);
            $data['action']       = 'users_permissions/save/' . $id;           
      
            $this->template->add_js('
                     $(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    $("#form_users_permissions").parsley();
                                    });','embed');
            
            $this->template->render('users_permissions/form',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan','info'));
            redirect(site_url('users_permissions'));
        }
    }


    
    /**
    * Save & Update data  users_permissions
    *
    */
    public function save($id =NULL) 
    {
        // validation config
        $config = array(
                  
                    array(
                        'field' => 'user_id',
                        'label' => 'User',
                        'rules' => 'trim|required'
                        ),
                    
                    array(
                        'field' => 'perm_id',
                        'label' => 'Perm',
                        'rules' => 'trim|required'
                        ),
                    
                    array(
                        'field' => 'isactive',
                        'label' => 'Isactive',
                        'rules' => 'trim|required'
                        ),
                    
                    array(
                        'field' => 'userid',
                        'label' => 'Userid',
                        'rules' => 'trim'
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
                               
                  );
            
        // if id NULL then add new data
        if(!$id)
        {    
                  $this->form_validation->set_rules($config);

                  if ($this->form_validation->run() == TRUE) 
                  {
                      if ($this->input->post()) 
                      {
                          
                          $this->users_permissionss->save();
                          $this->session->set_flashdata('notify', notify('Data berhasil ditambahkan','success'));
                          redirect('users_permissions');
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
                        $this->users_permissionss->update($id);
                        $this->session->set_flashdata('notify', notify('Data berhasil diupdate','success'));
                        redirect('users_permissions');
                    }
                } 
                else // If validation incorrect 
                {
                    $this->edit($id);
                }
         }
    }
    
    /**
    * Detail users_permissions
    *
    */
    public function show($id='') 
    {
        if ($id != '') 
        {
            $data['users_permissions'] = $this->users_permissionss->get_one($id);            
            $this->template->render('users_permissions/show',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan','info'));
            redirect(site_url('users_permissions'));
        }
    }
    
    /**
    * Search users_permissions like ""
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
            'base_url'          => site_url('users_permissions/search/'),
            'total_rows'        => $this->users_permissionss->count_all_search(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['pagination']     = $this->pagination->create_links();
        $data['users_permissionss']       = $this->users_permissionss->get_search($config['per_page'], $this->uri->segment(3));
       
        $this->template->render('users_permissions/view',$data);
    }
    
    /**
    * Delete users_permissions by ID
    *
    */
    public function destroy($id) 
    {        
        // Agar tabel dengan ID 0 bisa terhapus
        if ($id>=0) 
        {
            $this->users_permissionss->destroy($id);           
            $this->session->set_flashdata('notify', notify('Data berhasil dihapus','success'));
            redirect('users_permissions');
        }

    }
    public function activate(){
        $id=$this->input->post('id');
        $this->users_permissionss->activate($id);

    } 
    public function deactivate(){
        $id=$this->input->post('id');
        $this->users_permissionss->deactivate($id);
        
    }
}
?>