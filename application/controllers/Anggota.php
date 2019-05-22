<?php
class Anggota extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('model_anggota');
			
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
    
}