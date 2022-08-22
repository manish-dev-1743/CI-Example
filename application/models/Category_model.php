<?php
class Category_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function insert($data)
    {
        $this->db->insert('categories', $data);
        return $this->db->insert_id();
    }


    function all()
    {
        $query = $this->db->get("categories");
        return $query->result();
    }

    function find($data)
    {
        // $this->db->select('*');
        // $this->db->from('categories');
        // $this->db->where_in('name',$data);
        // $result = $this->db->get();
        // var_dump($result->result());die;

        if (array_key_exists("name", $data)) {
            $query = $this->db->select('*')->from('categories')->where_in('name', $data)->get();
            return $query->result();
        }

        if (array_key_exists("id", $data)) {
            $query = $this->db->select('*')->from('categories')->where_in('id', $data)->get();

            return $query->result();
        }
        return false;
    }

    function update($id, $data)
    {
        $cat = array();
        foreach ($data as $key => $value) {
            $cat[$key] = $value;
        }

        $this->db->update('categories', $cat, array('id' => $id));

        $arr = array(
            'id' => $id
        );
        $data =  $this->find($arr);

        return $data;
    }
    function del($data)
    {
        // var_dump($this->db->delete('categories', array('id' => $data['id'])));
        // die();
        // $this->db->delete('categories', array('id' => $data['id']))->get();
        // var_dump($this->db->delete('categories',['id', $data['id']]));die();
        //$this->db->where('id',$data['id']);
        //return $this->db->delete('categories');
        return $this->db->delete('categories',array('id'=>$data['id']));
     }
}
