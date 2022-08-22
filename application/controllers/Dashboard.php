<?php

class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
		$this->load->model('user_model');
        if (empty($this->session->userdata('id'))) {
            $this->session->set_flashdata('login_error', 'Login Required');
            redirect('/');
        }
    }


    function index()
    {
        // var_dump($this->session->userdata('id'));die();
        $data['count'] = $this->user_model->count();
        // var_dump($data);die();
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/index',$data); // redirect to home
        $this->load->view('script_css/sc');

        $this->load->view('dashboard/footer');
    }
}
