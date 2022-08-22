<?php
class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function insert($data)
    {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    function verify_email($key)
    {
        $this->db->where('verification_key', $key);
        $this->db->where('email_is_verified', '0');
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            $data = array(
                'email_is_verified'  => '1'
            );
            $this->db->where('verification_key', $key);
            // var_dump($this->db->where('verification_key', $key));die();

            $this->db->update('users', $data);
            return true;
        } else {
            return false;
        }
    }

    function all()
    {
        $query = $this->db->get("users");
        return $query->result();
        
    }

    function get_where($para1,$para2){
        $dat = $this->db->get_where($para1,$para2)->row();
        return $dat;
    }
    
    function count(){
        $count = $this->db->count_all('users');
        return $count;
    }
}
