<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of groups_permissions
 * @created on : Sunday, 13-Oct-2019 14:55:13
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 * Copyright 2019    
 */
 
 
class Groups_permissionss extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Get All data groups_permissions
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
        $this->db->update('groups_permissions', $data);
        return $this->db->affected_rows();
    }   
    function deactivate($id){
        $data=[
             'isactive' => '0',
        ];
        $this->db->where('id', $id);
        $this->db->update('groups_permissions', $data);
        return $this->db->affected_rows();
    }
    function __dropdown__(){
        $result = array();
        $array_keys_values = $this->db->get('groups_permissions')->result();
        $result[0]="-- Pilih groups_permissions --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->id." (".$row->id.")" ;
        }
        return $result;
    }

    public function get_all($limit, $offset) 
    {

        $result = $this->db->get('groups_permissions', $limit, $offset);

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
     *  Count All groups_permissions
     *    
     *  @return Integer
     *
     */
    public function count_all()
    {
        $this->db->from('groups_permissions');
        return $this->db->count_all_results();
    }
    

    /**
    * Search All groups_permissions
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
        
        $this->db->limit($limit, $offset);
        $result = $this->db->get('groups_permissions');

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
    * Search All groups_permissions
    * @param keyword : mixed
    *
    * @return Integer
    *
    */
    public function count_all_search()
    {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('groups_permissions');        
        
        return $this->db->count_all_results();
    }


    
    
    
    /**
    *  Get One groups_permissions
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('id', $id);
        $result = $this->db->get('groups_permissions');

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
    *  Default form data groups_permissions
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'groups_id' => '',
            
                'perm_id' => '',
            
                'isactive' => '',
            
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
        
            'groups_id' => strip_tags($this->input->post('groups_id', TRUE)),
        
            'perm_id' => strip_tags($this->input->post('perm_id', TRUE)),
        
            'isactive' => strip_tags($this->input->post('isactive', TRUE)),
        
            'userid' => strip_tags($this->input->post('userid', TRUE)),
        
            'created' => strip_tags($this->input->post('created', TRUE)),
        
            'modified' => strip_tags($this->input->post('modified', TRUE)),
        
        );
        
        //'created' => NOW(),
        //'modified' => NOW(),
        //'userid' => userid(),

        $this->db->insert('groups_permissions', $data);
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
        
                'groups_id' => strip_tags($this->input->post('groups_id', TRUE)),
        
                'perm_id' => strip_tags($this->input->post('perm_id', TRUE)),
        
                'isactive' => strip_tags($this->input->post('isactive', TRUE)),
        
                'userid' => strip_tags($this->input->post('userid', TRUE)),
        
                'created' => strip_tags($this->input->post('created', TRUE)),
        
                'modified' => strip_tags($this->input->post('modified', TRUE)),
        
        );
        
        
        $this->db->where('id', $id);
        $this->db->update('groups_permissions', $data);
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
        $this->db->delete('groups_permissions');
        
    }







    
    
    // get groups
    public function get_groups() 
    {
      
        $result = $this->db->get('groups')
                           ->result();

        $ret ['']= 'Pilih Groups :';
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


    



}
