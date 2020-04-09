<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of permissions
 * @created on : Wednesday, 09-Oct-2019 09:15:26
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 * Copyright 2019    
 */
 
 
class Permissionss extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Get All data permissions
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
        $this->db->update('permissions', $data);
        return $this->db->affected_rows();
    }   
    function deactivate($id){
        $data=[
             'isactive' => '0',
        ];
        $this->db->where('id', $id);
        $this->db->update('permissions', $data);
        return $this->db->affected_rows();
    }
    function __dropdown__(){
        $result = array();
        $array_keys_values = $this->db->get('permissions')->result();
        $result[0]="-- Pilih permissions --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->id." (".$row->id.")" ;
        }
        return $result;
    }

    public function get_all($limit, $offset) 
    {

        $result = $this->db->get('permissions', $limit, $offset);

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
     *  Count All permissions
     *    
     *  @return Integer
     *
     */
    public function count_all()
    {
        $this->db->from('permissions');
        return $this->db->count_all_results();
    }
    

    /**
    * Search All permissions
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
                
        $this->db->like('name', $keyword);  
                
        $this->db->like('description', $keyword);  
        
        $this->db->limit($limit, $offset);
        $result = $this->db->get('permissions');

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
    * Search All permissions
    * @param keyword : mixed
    *
    * @return Integer
    *
    */
    public function count_all_search()
    {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('permissions');        
                
        $this->db->like('name', $keyword);  
                
        $this->db->like('description', $keyword);  
        
        return $this->db->count_all_results();
    }


    
    
    
    /**
    *  Get One permissions
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('id', $id);
        $result = $this->db->get('permissions');

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
    *  Default form data permissions
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'name' => '',
            
                'description' => '',
            
                'isactive' => '',
            
                'create' => '',
            
                'read' => '',
            
                'update' => '',
            
                'delete' => '',
            
                'setup' => '',
            
                'report' => '',
            
                'print' => '',
            
                'export' => '',
            
                'import' => '',
            
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
        
            'name' => strip_tags($this->input->post('name', TRUE)),
        
            'description' => strip_tags($this->input->post('description', TRUE)),
        
            'isactive' => strip_tags($this->input->post('isactive', TRUE)),
        
            'create' => strip_tags($this->input->post('create', TRUE)),
        
            'read' => strip_tags($this->input->post('read', TRUE)),
        
            'update' => strip_tags($this->input->post('update', TRUE)),
        
            'delete' => strip_tags($this->input->post('delete', TRUE)),
        
            'setup' => strip_tags($this->input->post('setup', TRUE)),
        
            'report' => strip_tags($this->input->post('report', TRUE)),
        
            'print' => strip_tags($this->input->post('print', TRUE)),
        
            'export' => strip_tags($this->input->post('export', TRUE)),
        
            'import' => strip_tags($this->input->post('import', TRUE)),
        
            'userid' => strip_tags($this->input->post('userid', TRUE)),
        
            'created' => strip_tags($this->input->post('created', TRUE)),
        
            'modified' => strip_tags($this->input->post('modified', TRUE)),
        
        );
        
        //'created' => NOW(),
        //'modified' => NOW(),
        //'userid' => userid(),

        $this->db->insert('permissions', $data);
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
        
                'name' => strip_tags($this->input->post('name', TRUE)),
        
                'description' => strip_tags($this->input->post('description', TRUE)),
        
                'isactive' => strip_tags($this->input->post('isactive', TRUE)),
        
                'create' => strip_tags($this->input->post('create', TRUE)),
        
                'read' => strip_tags($this->input->post('read', TRUE)),
        
                'update' => strip_tags($this->input->post('update', TRUE)),
        
                'delete' => strip_tags($this->input->post('delete', TRUE)),
        
                'setup' => strip_tags($this->input->post('setup', TRUE)),
        
                'report' => strip_tags($this->input->post('report', TRUE)),
        
                'print' => strip_tags($this->input->post('print', TRUE)),
        
                'export' => strip_tags($this->input->post('export', TRUE)),
        
                'import' => strip_tags($this->input->post('import', TRUE)),
        
                'userid' => strip_tags($this->input->post('userid', TRUE)),
        
                'created' => strip_tags($this->input->post('created', TRUE)),
        
                'modified' => strip_tags($this->input->post('modified', TRUE)),
        
        );
        
        
        $this->db->where('id', $id);
        $this->db->update('permissions', $data);
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
        $this->db->delete('permissions');
        
    }







    



}
