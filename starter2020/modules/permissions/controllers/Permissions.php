<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller permissions
 * @created on : Wednesday, 09-Oct-2019 09:15:26
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * @editor Jovin <hijovin@gmail.com>
 * Copyright 2019
 */

class Permissions extends Admin_Controller
{

    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('permissionss');
    }
    

    /**
    * List all data permissions
    *
    */
    public function index() 
    {
        $config = array(
            'base_url'          => site_url('permissions/index/'),
            'total_rows'        => $this->permissionss->count_all(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['permissionss']       = $this->permissionss->get_all($config['per_page'], $this->uri->segment(3));

        $this->template->add_js("
            var baseurl='".base_url('permissions')."/';
            
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
       
        $this->template->render('permissions/view',$data);
	      
    }
    public function getdtables(){
        header('Content-Type: application/json');
        echo ($this->dtables->select('name,description,isactive,create,read,update,delete,setup,report,print,export,import,userid,created,modified,')->from('permissions')->generate());
    }
    

    /**
    * Call Form to Add  New permissions
    *
    */
    public function add() 
    {       
        $data['permissions'] = $this->permissionss->add();
        $data['action']  = 'permissions/save';
        
        $this->template->add_js('
                $(document).ready(function(){
                // binds form submission and fields to the validation engine
                $("#form_permissions").parsley();
                        });','embed');
      
        $this->template->render('permissions/form',$data);
    }

    /**
    * Call Form to Modify permissions
    *
    */
    public function edit($id='') 
    {
        if ($id != '') 
        {

            $data['permissions']      = $this->permissionss->get_one($id);
            $data['action']       = 'permissions/save/' . $id;           
      
            $this->template->add_js('
                     $(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    $("#form_permissions").parsley();
                                    });','embed');
            
            $this->template->render('permissions/form',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan','info'));
            redirect(site_url('permissions'));
        }
    }


    
    /**
    * Save & Update data  permissions
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
                        'rules' => 'trim|required'
                        ),
                    
                    array(
                        'field' => 'isactive',
                        'label' => 'Isactive',
                        'rules' => 'trim'
                        ),
                    
                    array(
                        'field' => 'create',
                        'label' => 'Create',
                        'rules' => 'trim'
                        ),
                    
                    array(
                        'field' => 'read',
                        'label' => 'Read',
                        'rules' => 'trim'
                        ),
                    
                    array(
                        'field' => 'update',
                        'label' => 'Update',
                        'rules' => 'trim'
                        ),
                    
                    array(
                        'field' => 'delete',
                        'label' => 'Delete',
                        'rules' => 'trim'
                        ),
                    
                    array(
                        'field' => 'setup',
                        'label' => 'Setup',
                        'rules' => 'trim'
                        ),
                    
                    array(
                        'field' => 'report',
                        'label' => 'Report',
                        'rules' => 'trim'
                        ),
                    
                    array(
                        'field' => 'print',
                        'label' => 'Print',
                        'rules' => 'trim'
                        ),
                    
                    array(
                        'field' => 'export',
                        'label' => 'Export',
                        'rules' => 'trim'
                        ),
                    
                    array(
                        'field' => 'import',
                        'label' => 'Import',
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
                          
                          $this->permissionss->save();
                          $this->session->set_flashdata('notify', notify('Data berhasil ditambahkan','success'));
                          redirect('permissions');
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
                        $this->permissionss->update($id);
                        $this->session->set_flashdata('notify', notify('Data berhasil diupdate','success'));
                        redirect('permissions');
                    }
                } 
                else // If validation incorrect 
                {
                    $this->edit($id);
                }
         }
    }
    
    /**
    * Detail permissions
    *
    */
    public function show($id='') 
    {
        if ($id != '') 
        {
            $data['permissions'] = $this->permissionss->get_one($id);            
            $this->template->render('permissions/show',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan','info'));
            redirect(site_url('permissions'));
        }
    }
    
    /**
    * Search permissions like ""
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
            'base_url'          => site_url('permissions/search/'),
            'total_rows'        => $this->permissionss->count_all_search(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['pagination']     = $this->pagination->create_links();
        $data['permissionss']       = $this->permissionss->get_search($config['per_page'], $this->uri->segment(3));
       
        $this->template->render('permissions/view',$data);
    }
    
    /**
    * Delete permissions by ID
    *
    */
    public function destroy($id) 
    {        
        // Agar tabel dengan ID 0 bisa terhapus
        if ($id>=0) 
        {
            $this->permissionss->destroy($id);           
            $this->session->set_flashdata('notify', notify('Data berhasil dihapus','success'));
            redirect('permissions');
        }

    }
    public function activate(){
        $id=$this->input->post('id');
        $this->permissionss->activate($id);

    } 
    public function deactivate(){
        $id=$this->input->post('id');
        $this->permissionss->deactivate($id);
        
    }
}
?>