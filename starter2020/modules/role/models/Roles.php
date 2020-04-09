<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of role
 * @created on : Tuesday, 08-Oct-2019 10:02:23
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 * Copyright 2019    
 */
 
 
class Roles extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Get All data role
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */
    public function get_all($limit, $offset) 
    {

        $result = $this->db->get('role', $limit, $offset);

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
     *  Count All role
     *    
     *  @return Integer
     *
     */
    public function count_all()
    {
        $this->db->from('role');
        return $this->db->count_all_results();
    }
    

    /**
    * Search All role
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
                
        $this->db->like('key', $keyword);  
        
        $this->db->limit($limit, $offset);
        $result = $this->db->get('role');

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
    * Search All role
    * @param keyword : mixed
    *
    * @return Integer
    *
    */
    public function count_all_search()
    {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('role');        
                
        $this->db->like('name', $keyword);  
                
        $this->db->like('description', $keyword);  
                
        $this->db->like('key', $keyword);  
        
        return $this->db->count_all_results();
    }


    
    
    
    /**
    *  Get One role
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('id', $id);
        $result = $this->db->get('role');

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
    *  Default form data role
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'name' => '',
            
                'description' => '',
            
                'isactive' => '',
            
                'userid' => '',
            
                'created' => '',
            
                'modified' => '',
            
                'deleted' => '',
            
                'key' => '',
            
        );

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
        
            'userid' => userid(),
        
            'created' => NOW(),
        
            'modified' => strip_tags($this->input->post('modified', TRUE)),
        
            'deleted' => strip_tags($this->input->post('deleted', TRUE)),
        
            'key' => strip_tags($this->input->post('key', TRUE)),
        
        );
        
        
        $this->db->insert('role', $data);
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
        
                'userid' => strip_tags($this->input->post('userid', TRUE)),
        
                'created' => strip_tags($this->input->post('created', TRUE)),
        
                'modified' => strip_tags($this->input->post('modified', TRUE)),
        
                'deleted' => strip_tags($this->input->post('deleted', TRUE)),
        
                'key' => strip_tags($this->input->post('key', TRUE)),
        
        );
        
        
        $this->db->where('id', $id);
        $this->db->update('role', $data);
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
        $this->db->delete('role');
        
    }







    



}
