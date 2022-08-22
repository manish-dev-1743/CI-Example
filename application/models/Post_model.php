<?php
class Post_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    // 'title' => $this->input->post('title'),
    // 'description' => $this->input->post('description'),
    // 'cat_id' => $this->input->post('cat_id'),
    // 'user_id' => $this->session->userdata('id'),
    // 'imgname' => json_encode($dataInfo)



    function insert($data)
    {
        $dat = array(
            'title' => $data['title'],
            'description' => $data['description'],
            'cat_id' => $data['cat_id'],
            'user_id' => $data['user_id']
        );
        $this->db->insert('posts', $dat);
        $id = $this->db->insert_id();
        $img = json_decode($data['imgname']);
        foreach($img as $imgname){
            $idat = array(
                'post_id' => $id,
                'imgname' => $imgname
            );
        $this->db->insert('post_imgs', $idat);

        }
        return $id;
    }


    // function all()
    // {
    //     $query = $this->db->get("categories");
    //     return $query->result();
    // }

    function find($data)
    {
        // $this->db->select('*');
        // $this->db->from('categories');
        // $this->db->where_in('name',$data);
        // $result = $this->db->get();
        // var_dump($result->result());die;
        if(array_key_exists('user_id', $data)){
            $query = $this->db->select('*')->from('posts')->where_in('user_id', $data)->get()->result();
            foreach($query as $q){
                $q2 = $this->db->select('id, imgname')->from('post_imgs')->where_in('post_id',$q->id)->get()->result();
               $q->post_imgs = json_encode($q2);
            }
            return $query;


        }

        if (array_key_exists("title", $data)) {
            $query = $this->db->select('*')->from('posts')->where_in('title', $data)->get();
            return $query->result();
        }

        if (array_key_exists("id", $data)) {
            $query = $this->db->select('*')->from('posts')->where_in('id', $data)->get();

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
