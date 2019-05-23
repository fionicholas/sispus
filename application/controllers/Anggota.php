<?php
class Anggota extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('model_anggota');
		$this->load->model('model_buku');
			
	}

	function index()
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/anggota/index/';
		$config['total_rows'] = $this->model_anggota->tampilkan_data()->num_rows();
		$config['per_page'] = 5;
		$this->pagination->initialize($config);
		$data['paging'] = $this->pagination->create_links();

		$halaman = $this->uri->segment(3);
		$halaman = $halaman ==''?0:$halaman;
		$data['record'] = $this->model_anggota->tampilkan_data_paging($halaman);
	
		$this->template->load('master_pustakawan','anggota/lihat_data',$data);
	}

	function post()
	{
		if(isset($_POST['submit'])){
				//proses kategori
			$this->model_anggota->post();
			redirect('anggota');
		}
		else {
			
			$this->template->load('master_pustakawan','anggota/form_input');

		}
	}

	function edit()
	{
		if(isset($_POST['submit'])){
				//proses kategori
			$this->model_anggota->edit();
			redirect('anggota');
		}
		else {
			$id = $this->uri->segment(3);
		
			$data['record'] = $this->model_anggota->get_one($id)->row_array();

			$this->template->load('master_pustakawan','anggota/form_edit', $data);
		}
	}

	function delete()
	{
		$id = $this->uri->segment(3);
		$this->model_anggota->delete($id);
		redirect('anggota');
		}
		
		function home()
	{
		$id = $this->session->userdata['username'];
		$this->db->select('nama','username');
		$this->db->where('username', $id);
		$this->db->from('anggota');
		$query = $this->db->get();
		$data['query'] = $query->result();

		$this->template->load('master_anggota','anggota/home',$data);
	}

	function login()
	{
		if(isset($_POST['submit'])){

			//proses login
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$hasil = $this->model_anggota->login($username,$password);
			if($hasil==1)
			{
				// update last login
				$this->db->where('username', $username);
	

				$this->session->set_userdata(array('status_login'=>'oke','username'=>$username));

			 	$this->session->set_flashdata('info','<script type="text/javascript">
					setTimeout(function () {
				  swal({
            title: "Selamat",
            text:  "Anda berhasil login! ",
            type: "success",
            timer: 5000,
            showConfirmButton: true
        		});
						},10);
						</script>');
					redirect('anggota/home');
			}
			else {
				redirect('anggota/login');
				$this->session->set_flashdata('message', 'anda gagal login...!!!');

			}
		} 
		else {
		check_session_login();
		$this->load->view('anggota/login');
		}
		
	}
	function logout()
	{
		
		$this->session->sess_destroy();
		redirect('anggota/login');
	}

	function buku()
	{
		if(isset($_POST['submit'])){
			//proses kategori
		$this->model_anggota->pinjam();
		redirect('anggota/buku');
	}
	else {
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/buku/index/';
		$config['total_rows'] = $this->model_buku->tampilkan_data()->num_rows();
		$config['per_page'] = 5;
		$this->pagination->initialize($config);
		$data['paging'] = $this->pagination->create_links();

		$halaman = $this->uri->segment(3);
		$halaman = $halaman ==''?0:$halaman;
		$data['record'] = $this->model_buku->tampilkan_data_paging($halaman);

		$id = $this->session->userdata['username'];
		$this->db->select('nama','username');
		$this->db->where('username', $id);
		$this->db->from('anggota');
		$query = $this->db->get();
		$data['query'] = $query->result();
	
		$this->template->load('master_anggota','anggota/lihat_buku',$data);
	}
	}

	
    
}