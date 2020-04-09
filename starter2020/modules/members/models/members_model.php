<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Members_model extends CI_Model {

	function get_one_mhs($nim) {
        $this->db->where('nim', $nim);
        $result = $this->db->get('01-view-mhs');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

}

/* End of file members.php */
/* Location: ./ */
 ?>