<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller groups_permissions
 * @created on : Sunday, 13-Oct-2019 14:55:13
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * @editor Jovin <hijovin@gmail.com>
 * Copyright 2019
 */

class Groups_permissions extends Admin_Controller
{

    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('groups_permissionss');
    }
    

    /**
    * List all data groups_permissions
    *
    */
    public function index() 
    {
        $config = array(
            'base_url'          => site_url('groups_permissions/index/'),
            'total_rows'        => $this->groups_permissionss->count_all(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['groups_permissionss']       = $this->groups_permissionss->get_all($config['per_page'], $this->uri->segment(3));

        $this->template->add_js('
            var dtables;
            var baseurl="'.base_url('groups_permissions').'/";
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
       
        $this->template->render('groups_permissions/view',$data);
	      
    }
    public function getdtables(){
        header('Content-Type: application/json');
        $this->dtables->select('groups_id,perm_id,isactive,userid,created,modified,')->from('groups_permissions');
        $show=base_url('groups_permissions/show/');
        $edit=base_url('groups_permissions/edit/');
        $target="#kt_modal_4";

        $this->dtables->add_column('aksi','<div class="btn-group">$1 $2 $3</div>','viewbtn(id,'.$show.','.$target.'),editbtn(id,'.$edit.','.$target.'),delbtn(id)');

        echo $this->dtables->generate();
    }
    

    /**
    * Call Form to Add  New groups_permissions
    *
    */
    public function add() 
    {       
        $data['groups_permissions'] = $this->groups_permissionss->add();
        $data['action']  = 'groups_permissions/save';
        
            $data['groups'] = $this->groups_permissionss->get_groups();
        
            $data['permissions'] = $this->groups_permissionss->get_permissions();
        
        $this->template->add_js('
                $(document).ready(function(){
                // binds form submission and fields to the validation engine
                $("#form_groups_permissions").parsley();
                        });','embed');
      
        $this->template->render('groups_permissions/form',$data);
    }

    /**
    * Call Form to Modify groups_permissions
    *
    */
    public function edit($id='') 
    {
        //$id=$this->input->post('id'); 
        if ($id != '') 
        {

            $data['groups_permissions']      = $this->groups_permissionss->get_one($id);
            $data['action']       = 'groups_permissions/save/' . $id;           
      
           $data['groups'] = $this->groups_permissionss->get_groups();
       
           $data['permissions'] = $this->groups_permissionss->get_permissions();
       
            $this->template->add_js('
                     $(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    $("#form_groups_permissions").parsley();
                                    });','embed');
            
            $this->template->render('groups_permissions/form',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan','info'));
            redirect(site_url('groups_permissions'));
        }
    }


    
    /**
    * Save & Update data  groups_permissions
    *
    */
    public function save($id =NULL) 
    {
        $id=$this->input->post('id');
        // validation config
        $config = array(
                  
                    array(
                        'field' => 'groups_id',
                        'label' => 'Groups',
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
                          
                          $this->groups_permissionss->save();
                          $this->session->set_flashdata('notify', notify('Data berhasil ditambahkan','success'));
                          redirect('groups_permissions');
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
                        $this->groups_permissionss->update($id);
                        $this->session->set_flashdata('notify', notify('Data berhasil diupdate','success'));
                        redirect('groups_permissions');
                    }
                } 
                else // If validation incorrect 
                {
                    $this->edit($id);
                }
         }
    }
    
    /**
    * Detail groups_permissions
    *
    */
    public function show($id='') 
    {
        if ($id != '') 
        {
            $data['groups_permissions'] = $this->groups_permissionss->get_one($id);            
            $this->template->render('groups_permissions/show',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan','info'));
            redirect(site_url('groups_permissions'));
        }
    }
    
    /**
    * Search groups_permissions like ""
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
            'base_url'          => site_url('groups_permissions/search/'),
            'total_rows'        => $this->groups_permissionss->count_all_search(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['pagination']     = $this->pagination->create_links();
        $data['groups_permissionss']       = $this->groups_permissionss->get_search($config['per_page'], $this->uri->segment(3));
       
        $this->template->render('groups_permissions/view',$data);
    }
    
    /**
    * Delete groups_permissions by ID
    *
    */
    public function destroy($id) 
    {        
        // Agar tabel dengan ID 0 bisa terhapus
        if ($id>=0) 
        {
            $this->groups_permissionss->destroy($id);           
            $this->session->set_flashdata('notify', notify('Data berhasil dihapus','success'));
            redirect('groups_permissions');
        }

    }
    public function activate(){
        $id=$this->input->post('id');
        $this->groups_permissionss->activate($id);

    } 
    public function deactivate(){
        $id=$this->input->post('id');
        $this->groups_permissionss->deactivate($id);
        
    }
}
?>