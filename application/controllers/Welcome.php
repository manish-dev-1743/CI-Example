<?php
defined('BASEPATH') or exit('No direct script access allowed');




class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		$this->load->model('user_model');
		$this->load->library('session');
	}

	public function index()
	{

		if ($this->session->userdata('id')) {
			redirect('dashboard/index');
			
		}
		$this->load->view('welcome/index');
	}

	public function retrieve($site)
	{
		if ($this->session->userdata('id')) {
			redirect('dashboard/index');
			
		}
		if (!file_exists(APPPATH . 'views/welcome/' . $site . '.php')) {
			// Whoops, we don't have a page for that!
			show_404();
		}

		// $this->load->database();


		$this->load->view('welcome/' . $site);
	}


	function reg()
	{
		if ($this->session->userdata('id')) {
			redirect('dashboard/index');
		
		}

		$this->form_validation->set_rules('fname', 'fname', 'required|trim');
		$this->form_validation->set_rules('mname', 'mname', 'required|trim');
		$this->form_validation->set_rules('lname', 'lname', 'required|trim');
		$this->form_validation->set_rules('phone', 'phone', 'required');
		$this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('repass', 'repass', 'trim|required|matches[password]');
		// var_dump($this->input->post());die();
		if ($this->form_validation->run()) {
			$verification_key = md5(rand());
			$encrypted_password = $this->encrypt->encode($this->input->post('password'));
			$data = array(
				'fname'  => $this->input->post('fname'),
				'mname'  => $this->input->post('mname'),
				'lname'  => $this->input->post('lname'),
				'phone'  => $this->input->post('phone'),
				'email'  => $this->input->post('email'),
				'role'  => 'user',
				'password' => $encrypted_password,
				'verification_key' => $verification_key
			);

			$id = $this->user_model->insert($data);

			if ($id > 0) {
				$subject = "Please verify email for login";
				$message = "<p>Hi " . $this->input->post('fname') . "</p>
    <p>This is email verification mail from Admin Login Register system. For complete registration process and login into system. First you want to verify you email by click this <a href='" . base_url() . "register/verify_email/" . $verification_key . "'>link</a>.</p>
    <p>Once you click this link your email will be verified and you can login into system.</p>
    <p>Thanks,</p>";
				
				$this->load->library('email');
				$this->email->set_newline("\r\n");
				$this->email->from('devmanish1743@gmail.com');
				$this->email->to($this->input->post('email'));
				$this->email->subject($subject);
				$this->email->message($message);
				// var_dump($this->email->send());die();

				if ($this->email->send()) {

					$this->session->set_flashdata('message', 'Check in your email for email verification mail');
					redirect('/');
				}
			}
		} else {
			$this->load->view('welcome/register');
		}
	}

	function verify_email($ver_code)
	{
		if ($this->session->userdata('id')) {
			redirect('dashboard/index');
	
		}

		// var_dump($ver_code);die();
		if ($this->user_model->verify_email($ver_code)) {
			$data['message'] = '<h1 align="center">Your Email has been successfully verified, now you can login from <a href="' . base_url() . '/">here</a></h1>';
		} else {
			$data['message'] = '<h1 align="center">Invalid Link</h1>';
		}
		$this->load->view('welcome/email_verification', $data);
	}




	function loggin()
	{
		if ($this->session->userdata('id')) {
			redirect('dashboard/index');
			
		}
	
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		// var_dump($this->form_validation->run());die();

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('welcome/index');
		} else {

			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$user = $this->user_model->get_where('users', ['email' => $email]);

			if (!$user) {
				$this->session->set_flashdata('login_error', 'Please Enter correct email.', 5000);
				redirect(uri_string());
			}

			

			if ($this->encrypt->decode($user->password) != $password) {
				$this->session->set_flashdata('login_error', 'Please check your password and try again.', 5000);
				redirect(uri_string());
			}

			$da = array(
				'id' => $user->id,
			);


			$this->session->set_userdata($da);
			redirect('dashboard/index');
			
			
		}
	}

	function loggout()
	{
		
		$this->session->sess_destroy();
		redirect('/');
	}
}
