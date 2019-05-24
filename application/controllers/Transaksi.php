<?php
class Transaksi extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('model_transaksi');
			
	}

	function index()
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/transaksi/index/';
		$config['total_rows'] = $this->model_transaksi->tampil_data()->num_rows();
		$config['per_page'] = 5;
		$this->pagination->initialize($config);
		$data['paging'] = $this->pagination->create_links();

		$halaman = $this->uri->segment(3);
		$halaman = $halaman ==''?0:$halaman;
		$data['record'] = $this->model_transaksi->tampil_data($halaman);
	
		$this->template->load('master_pustakawan','transaksi/lihat_data',$data);
		}
		
		function post()
	{
		if(isset($_POST['submit'])){
				//proses transaksi
				$judul = $this->input->post('judul');
			$nama = $this->input->post('nama');
			$tanggal_pinjam = $this->input->post('tanggal_pinjam');
			$tanggal_kembali = $this->input->post('tanggal_kembali');
			$denda = $this->input->post('denda');
			$status = $this->input->post('status');
			$data = array('buku_id'=>$judul,'anggota_id'=>$nama,'tanggal_pinjam'=>$tanggal_pinjam,'tanggal_kembali'=>$tanggal_kembali,
									'denda'=>$denda, 'status'=>$status );
			$this->model_transaksi->post($data);
			redirect('transaksi');
		}
		else {
			$this->load->model('model_buku');
			$this->load->model('model_anggota');
			$data['buku'] = $this->model_buku->tampilkan_data()->result();
			$data['anggota'] = $this->model_anggota->tampilkan_data()->result();
			$this->template->load('master_pustakawan','transaksi/form_input', $data);

		}
    
}

}