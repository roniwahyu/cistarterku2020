<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of role_permissions
 * @created on : Wednesday, 09-Oct-2019 09:13:08
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 * Copyright 2019    
 */
 
 
class Role_permissionss extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Get All data role_permissions
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */
      function activate($id){
        $data=[
             'isactive' => '1',
        ];
        $this->db->where('id', $id);
        $this->db->update('role_permissions', $data);
        return $this->db->affected_rows();
    }   
    function deactivate($id){
        $data=[
             'isactive' => '0',
        ];
        $this->db->where('id', $id);
        $this->db->update('role_permissions', $data);
        return $this->db->affected_rows();
    }
    function __dropdown__(){
        $result = array();
        $array_keys_values = $this->db->get('role_permissions')->result();
        $result[0]="-- Pilih role_permissions --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->id." (".$row->id.")" ;
        }
        return $result;
    }

    public function get_all($limit, $offset) 
    {

        $result = $this->db->get('role_permissions', $limit, $offset);

        if ($result->num_rows() > 0) 
        {
            return $result->result_array();
        } 
        else 
        {
            return array();
        }
    }

    

    /**
     *  Count All role_permissions
     *    
     *  @return Integer
     *
     */
    public function count_all()
    {
        $this->db->from('role_permissions');
        return $this->db->count_all_results();
    }
    

    /**
    * Search All role_permissions
    *
    *  @param limit   : Integer
    *  @param offset  : Integer
    *  @param keyword : mixed
    *
    *  @return array
    *
    */
    public function get_search($limit, $offset) 
    {
        $keyword = $this->session->userdata('keyword');
                
        $this->db->like('class', $keyword);  
                
        $this->db->like('method', $keyword);  
                
        $this->db->like('params', $keyword);  
        
        $this->db->limit($limit, $offset);
        $result = $this->db->get('role_permissions');

        if ($result->num_rows() > 0) 
        {
            return $result->result_array();
        } 
        else 
        {
            return array();
        }
    }

    
    
    
    
    
    /**
    * Search All role_permissions
    * @param keyword : mixed
    *
    * @return Integer
    *
    */
    public function count_all_search()
    {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('role_permissions');        
                
        $this->db->like('class', $keyword);  
                
        $this->db->like('method', $keyword);  
                
        $this->db->like('params', $keyword);  
        
        return $this->db->count_all_results();
    }


    
    
    
    /**
    *  Get One role_permissions
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('id', $id);
        $result = $this->db->get('role_permissions');

        if ($result->num_rows() == 1) 
        {
            return $result->row_array();
        } 
        else 
        {
            return array();
        }
    }

    
    
    
    /**
    *  Default form data role_permissions
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'role_id' => '',
            
                'perm_id' => '',
            
                'isactive' => '',
            
                'module_id' => '',
            
                'class' => '',
            
                'method' => '',
            
                'params' => '',
            
                'userid' => '',
            
                'created' => '',
            
                'modified' => '',
            
        );
        //'created' => NOW(),
        //'modified' => NOW(),
        //'userid' => userid(),
        return $data;
    }

    
    
    
    
    /**
    *  Save data Post
    *
    *  @return void
    *
    */
    public function save() 
    {
        $data = array(
        
            'role_id' => strip_tags($this->input->post('role_id', TRUE)),
        
            'perm_id' => strip_tags($this->input->post('perm_id', TRUE)),
        
            'isactive' => strip_tags($this->input->post('isactive', TRUE)),
        
            'module_id' => strip_tags($this->input->post('module_id', TRUE)),
        
            'class' => strip_tags($this->input->post('class', TRUE)),
        
            'method' => strip_tags($this->input->post('method', TRUE)),
        
            'params' => strip_tags($this->input->post('params', TRUE)),
        
            'userid' => strip_tags($this->input->post('userid', TRUE)),
        
            'created' => strip_tags($this->input->post('created', TRUE)),
        
            'modified' => strip_tags($this->input->post('modified', TRUE)),
        
        );
        
        //'created' => NOW(),
        //'modified' => NOW(),
        //'userid' => userid(),

        $this->db->insert('role_permissions', $data);
    }
    
    
    

    
    /**
    *  Update modify data
    *
    *  @param id : Integer
    *
    *  @return void
    *
    */
    public function update($id)
    {
        $data = array(
        
                'role_id' => strip_tags($this->input->post('role_id', TRUE)),
        
                'perm_id' => strip_tags($this->input->post('perm_id', TRUE)),
        
                'isactive' => strip_tags($this->input->post('isactive', TRUE)),
        
                'module_id' => strip_tags($this->input->post('module_id', TRUE)),
        
                'class' => strip_tags($this->input->post('class', TRUE)),
        
                'method' => strip_tags($this->input->post('method', TRUE)),
        
                'params' => strip_tags($this->input->post('params', TRUE)),
        
                'userid' => strip_tags($this->input->post('userid', TRUE)),
        
                'created' => strip_tags($this->input->post('created', TRUE)),
        
                'modified' => strip_tags($this->input->post('modified', TRUE)),
        
        );
        
        
        $this->db->where('id', $id);
        $this->db->update('role_permissions', $data);
    }


    
    
    
    /**
    *  Delete data by id
    *
    *  @param id : Integer
    *
    *  @return void
    *
    */
    public function destroy($id)
    {       
        $this->db->where('id', $id);
        $this->db->delete('role_permissions');
        
    }







    
    
    // get permissions
    public function get_permissions() 
    {
      
        $result = $this->db->get('permissions')
                           ->result();

        $ret ['']= 'Pilih Permissions :';
        if($result)
        {
            foreach ($result as $key => $row)
            {
                $ret [$row->id] = $row->name;
            }
        }
        
        return $ret;
    }


    
    
    // get permissions
    public function get_permissions() 
    {
      
        $result = $this->db->get('permissions')
                           ->result();

        $ret ['']= 'Pilih Permissions :';
        if($result)
        {
            foreach ($result as $key => $row)
            {
                $ret [$row->id] = $row->name;
            }
        }
        
        return $ret;
    }


    
    
    // get modules
    public function get_modules() 
    {
      
        $result = $this->db->get('modules')
                           ->result();

        $ret ['']= 'Pilih Modules :';
        if($result)
        {
            foreach ($result as $key => $row)
            {
                $ret [$row->id] = $row->module;
            }
        }
        
        return $ret;
    }


    



}
