<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller role_permissions
 * @created on : Wednesday, 09-Oct-2019 09:13:08
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * @editor Jovin <hijovin@gmail.com>
 * Copyright 2019
 */

class Role_permissions extends Admin_Controller
{

    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('role_permissionss');
    }
    

    /**
    * List all data role_permissions
    *
    */
    public function index() 
    {
        $config = array(
            'base_url'          => site_url('role_permissions/index/'),
            'total_rows'        => $this->role_permissionss->count_all(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['role_permissionss']       = $this->role_permissionss->get_all($config['per_page'], $this->uri->segment(3));

        $this->template->add_js("
            var baseurl='".base_url('role_permissions')."/';
            
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
       
        $this->template->render('role_permissions/view',$data);
	      
    }
    public function getdtables(){
        header('Content-Type: application/json');
        echo ($this->dtables->select('role_id,perm_id,isactive,module_id,class,method,params,userid,created,modified,')->from('role_permissions')->generate());
    }
    

    /**
    * Call Form to Add  New role_permissions
    *
    */
    public function add() 
    {       
        $data['role_permissions'] = $this->role_permissionss->add();
        $data['action']  = 'role_permissions/save';
        
            $data['permissions'] = $this->role_permissionss->get_permissions();
        
            $data['permissions'] = $this->role_permissionss->get_permissions();
        
            $data['modules'] = $this->role_permissionss->get_modules();
        
        $this->template->add_js('
                $(document).ready(function(){
                // binds form submission and fields to the validation engine
                $("#form_role_permissions").parsley();
                        });','embed');
      
        $this->template->render('role_permissions/form',$data);
    }

    /**
    * Call Form to Modify role_permissions
    *
    */
    public function edit($id='') 
    {
        if ($id != '') 
        {

            $data['role_permissions']      = $this->role_permissionss->get_one($id);
            $data['action']       = 'role_permissions/save/' . $id;           
      
           $data['permissions'] = $this->role_permissionss->get_permissions();
       
           $data['permissions'] = $this->role_permissionss->get_permissions();
       
           $data['modules'] = $this->role_permissionss->get_modules();
       
            $this->template->add_js('
                     $(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    $("#form_role_permissions").parsley();
                                    });','embed');
            
            $this->template->render('role_permissions/form',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan','info'));
            redirect(site_url('role_permissions'));
        }
    }


    
    /**
    * Save & Update data  role_permissions
    *
    */
    public function save($id =NULL) 
    {
        // validation config
        $config = array(
                  
                    array(
                        'field' => 'role_id',
                        'label' => 'Role',
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
                        'field' => 'module_id',
                        'label' => 'Module',
                        'rules' => 'trim'
                        ),
                    
                    array(
                        'field' => 'class',
                        'label' => 'Class',
                        'rules' => 'trim'
                        ),
                    
                    array(
                        'field' => 'method',
                        'label' => 'Method',
                        'rules' => 'trim'
                        ),
                    
                    array(
                        'field' => 'params',
                        'label' => 'Params',
                        'rules' => 'trim'
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
                          
                          $this->role_permissionss->save();
                          $this->session->set_flashdata('notify', notify('Data berhasil ditambahkan','success'));
                          redirect('role_permissions');
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
                        $this->role_permissionss->update($id);
                        $this->session->set_flashdata('notify', notify('Data berhasil diupdate','success'));
                        redirect('role_permissions');
                    }
                } 
                else // If validation incorrect 
                {
                    $this->edit($id);
                }
         }
    }
    
    /**
    * Detail role_permissions
    *
    */
    public function show($id='') 
    {
        if ($id != '') 
        {
            $data['role_permissions'] = $this->role_permissionss->get_one($id);            
            $this->template->render('role_permissions/show',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan','info'));
            redirect(site_url('role_permissions'));
        }
    }
    
    /**
    * Search role_permissions like ""
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
            'base_url'          => site_url('role_permissions/search/'),
            'total_rows'        => $this->role_permissionss->count_all_search(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['pagination']     = $this->pagination->create_links();
        $data['role_permissionss']       = $this->role_permissionss->get_search($config['per_page'], $this->uri->segment(3));
       
        $this->template->render('role_permissions/view',$data);
    }
    
    /**
    * Delete role_permissions by ID
    *
    */
    public function destroy($id) 
    {        
        // Agar tabel dengan ID 0 bisa terhapus
        if ($id>=0) 
        {
            $this->role_permissionss->destroy($id);           
            $this->session->set_flashdata('notify', notify('Data berhasil dihapus','success'));
            redirect('role_permissions');
        }

    }
    public function activate(){
        $id=$this->input->post('id');
        $this->role_permissionss->activate($id);

    } 
    public function deactivate(){
        $id=$this->input->post('id');
        $this->role_permissionss->deactivate($id);
        
    }
}
?>