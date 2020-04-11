<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}


	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['map'] = $this->db->get('user_map')->result_array();
		//echo "selamat datang ".$data['user']['name'];
		$data['title'] = "Dashboard";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function role()
	{

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		//echo "selamat datang ".$data['user']['name'];
		$data['title'] = "Role";
		$data['role'] = $this->db->get('user_role')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role', $data);
		$this->load->view('templates/footer', $data);
	}

	public function roleaccess($role_id)
	{

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		//echo "selamat datang ".$data['user']['name'];
		$data['title'] = "Role Access";
		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('user_menu')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('templates/footer', $data);
	}

	public function changeaccess()
	{
		$role_id = $this->input->post('roleId');
		$menu_id = $this->input->post('menuId');
		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);
		if ($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access has been changed</div>');
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
			$this->load->view('admin/map', $data);
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
			redirect('admin');
		}
	}

	public function delete_map($id)
	{
		$this->db->where('id', $id);
		$this->db->delete("user_map");
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Has Been Deleted.</div>');
			redirect('admin');
		}
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
