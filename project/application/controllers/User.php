<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		//echo "selamat datang ".$data['user']['name'];
		$data['title'] = "My Profile";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function edit()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = "Edit Profile";

		$this->form_validation->set_rules('name', 'Full Name', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/edit', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '2048';
				$config['upload_path'] = './assets/img/profile/';
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$old_image = $data['user']['image'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . 'assets/img/profile/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
					redirect('user');
				}
			}

			$this->db->set('name', $name);
			$this->db->where('email', $email);
			$this->db->update('user');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Profile Has Been Updated.</div>');
			redirect('user');
		}
	}

	public function changePassword()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		//echo "selamat datang ".$data['user']['name'];
		$data['title'] = "Change Password";

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/Changepassword', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if (!password_verify($current_password, $data['user']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Current Password!</div>');
				redirect('user/changePassword');
			} else {
				if ($current_password == $new_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New Password cannot be the same as current password</div>');
					redirect('user/changePassword');
				} else {
					//password ok
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Changed</div>');
					redirect('user/changePassword');
				}
			}
		}
	}


	public function map()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		//echo "selamat datang ".$data['user']['name'];
		$data['title'] = "Map";

		$this->form_validation->set_rules('geo', 'Location', 'required|trim', [
			'required' => 'Please Select your Location First By Clicking The Map',
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/map', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$data = [
				'location' => htmlspecialchars($this->input->post('geo', true)),
				'role_id' => 2,
				'user_send' => $this->session->email,
				'role_id' => $this->session->role_id,
				'date_created' => time()
			];
			$this->db->insert('user_map', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Has Been send to The Database</div>');
			redirect('user/map');
		}
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
