<?php
class Buku extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('model_buku');
			
	}

	function index()
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/buku/index/';
		$config['total_rows'] = $this->model_buku->tampilkan_data()->num_rows();
		$config['per_page'] = 5;
		$this->pagination->initialize($config);
		$data['paging'] = $this->pagination->create_links();

		$halaman = $this->uri->segment(3);
		$halaman = $halaman ==''?0:$halaman;
		$data['record'] = $this->model_buku->tampilkan_data_paging($halaman);
	
		$this->template->load('master_pustakawan','buku/lihat_data',$data);
	}

	function post()
	{
		if(isset($_POST['submit'])){
				//proses kategori
			$this->model_buku->post();
			redirect('buku');
		}
		else {
			
			$this->template->load('master_pustakawan','buku/form_input');

		}
	}

	function edit()
	{
		if(isset($_POST['submit'])){
				//proses kategori
			$this->model_buku->edit();
			redirect('buku');
		}
		else {
			$id = $this->uri->segment(3);
		
			$data['record'] = $this->model_buku->get_one($id)->row_array();

			$this->template->load('master_pustakawan','buku/form_edit', $data);
		}
	}

	function delete()
	{
		$id = $this->uri->segment(3);
		$this->model_buku->delete($id);
		redirect('buku');
    }
    
}