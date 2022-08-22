<?php

class Post extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');

        $this->load->model('post_model');
        $this->load->model('category_model');

        if (empty($this->session->userdata('id'))) {
            $this->session->set_flashdata('login_error', 'Login Required');
            redirect('/');
        }
    }


    function index()
    {
        $data = array(
            'category' => $this->category_model->all()
        );
        $this->load->view('dashboard/header');
        $this->load->view('script_css/sc');

        $this->load->view('post/index', $data);
        $this->load->view('dashboard/footer');
    }




    function add()
    {
        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        if ($this->form_validation->run()) {
            $this->load->library('upload');
            $dataInfo = array();
            $files = $_FILES;
            $cpt = count($_FILES['imgname']['name']);
            for ($i = 0; $i < $cpt; $i++) {
                $_FILES['imgname']['name'] =$this->session->userdata('id').$files['imgname']['name'][$i];
                $_FILES['imgname']['type'] = $files['imgname']['type'][$i];
                $_FILES['imgname']['tmp_name'] = $files['imgname']['tmp_name'][$i];
                $_FILES['imgname']['error'] = $files['imgname']['error'][$i];
                $_FILES['imgname']['size'] = $files['imgname']['size'][$i];

                $this->upload->initialize($this->set_upload_options());
                $this->upload->do_upload('imgname');

                $dataInfo[] = $_FILES['imgname']['name'];
            }
            $data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'cat_id' => $this->input->post('cat_id'),
                'user_id' => $this->session->userdata('id'),
                'imgname' => json_encode($dataInfo)
            );
            $rs = $this->post_model->insert($data);
            if($rs){
                $this->session->set_flashdata('success', '<div class="alert alert-dismissable alert-success">Post Successfully Created.</div>');
                redirect('post/index');
            }
            else {
                redirect('post/index');           
            }
        }else{
            $this->index(); 
        }
    }



    private function set_upload_options()
    {
        //upload an image options
        $config = array();
        $config['upload_path'] = "./assets/img/posts/";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = '0';
        $config['overwrite']     = TRUE;

        return $config;
    }



    function alldat(){

        $this->load->view('dashboard/header');
        $this->load->view('script_css/sc');

        $this->load->view('post/view');
        $this->load->view('dashboard/footer');
        
    }

    function all(){
        if ($this->input->post('name') == 'posts') {
            $data = array(
                'user_id' => $this->session->userdata('id')
            );
            $view = $this->post_model->find($data);
            echo json_encode($view);
            return;
        }
    }
}

    // function addcategory()
    // {

    //     $this->form_validation->set_rules('name', 'Name', 'required|trim');
    //     if ($this->form_validation->run()) {
    //         $data = array(
    //             'name'  => $this->input->post('name'),

    //         );
    //         $cat = $this->category_model->find($data);
    //         if ($cat != NULL) {
    //             $this->session->set_flashdata('error', '<div class="alert alert-dismissable alert-danger">Category already exists.
    //             </div>');
    //             redirect('category/index');
    //         }
    //         $id = $this->category_model->insert($data);
    //         if ($id > 0) {
    //             $this->session->set_flashdata('success', '<div class="alert alert-dismissable alert-success">

    //             Category Successfully Added.
    //         </div>');
    //             redirect('category/index');
    //         }
    //     } else {
    //         redirect('category/index');
    //     }
    // }
    // function all()
    // {
    //     $this->load->view('dashboard/header');
    //     $this->load->view('script_css/sc');

    //     $this->load->view('categories/view');

    //     $this->load->view('dashboard/footer');
    // }

    // function datasall()
    // {

    //     if ($this->input->post('name') == 'categories') {
    //         $data = $this->category_model->all();


    //         echo json_encode($data);
    //         return;
    //     }
    // }


    // function editcat()
    // {

    //     if ($this->input->post()) {
    //         $id = $this->input->post('id');
    //         $data = array(
    //             'id' => $id
    //         );

    //         $suc = $this->category_model->find($data);
    //         if ($suc) {
    //             echo json_encode($suc);
    //             return;
    //         } else {
    //             echo '<div class="alert alert-dismissable alert-danger"> Unable to find the category.</div>';
    //             return;
    //         }
    //     }
    // }

    // function updatecat()
    // {
    //     if ($this->input->post()) {


    //         $this->form_validation->set_rules('name', 'Name', 'required|trim');

    //         if ($this->form_validation->run()) {
    //             $id = $this->input->post('id');

    //             $name = $this->input->post('name');
    //             $data = array(
    //                 'name' => $name
    //             );
    //             $dat = $this->category_model->update($id, $data);
    //             if($dat){
    //                 $this->session->set_flashdata('error', '<div class="alert alert-dismissable alert-success">Category Updated.</div>');
    //                 redirect('categories');
    //             }
    //         } else {
    //             $this->session->set_flashdata('error', '<div class="alert alert-dismissable alert-danger">Category already exists.</div>');
    //             redirect('categories');
    //         }
    //     }
    // }

    // function delcat(){
    //     if ($this->input->get()) {
    //         $id = $this->input->get('id');
    //         $data = array(
    //             'id' => $id
    //         );
    //         $del = $this->category_model->del($data);
    //         if($del){
    //            echo('<div class="alert alert-dismissable alert-success">Category Successfully Deleted.</div>');
    //             return;
    //         }

    //     }

    // }

