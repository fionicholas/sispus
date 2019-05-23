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
	function json(){
		$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
    $limit = $_POST['length']; // Ambil data limit per page
    $start = $_POST['start']; // Ambil data start
    $order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
    $order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
    $order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"
    $sql_total = $this->model_anggota->count_all(); // Panggil fungsi count_all pada Model
    $sql_data = $this->model_anggota->filter($search, $limit, $start, $order_field, $order_ascdesc); // Panggil fungsi filter pada Model
    $sql_filter = $this->model_anggota->count_filter($search); // Panggil fungsi count_filter pada model
    $callback = array(
        'draw'=>$_POST['draw'], // Ini dari datatablenya
        'recordsTotal'=>$sql_total,
        'recordsFiltered'=>$sql_filter,
        'data'=>$sql_data
    );
    header('Content-Type: application/json');
    echo json_encode($callback); // Convert array $callback ke json
    }


	function buku()
	{

		$id = $this->session->userdata['username'];
		$this->db->select('nama','username');
		$this->db->where('username', $id);
		$this->db->from('anggota');
		$query = $this->db->get();
		$data['query'] = $query->result();
	
		$this->template->load('master_anggota','anggota/lihat_buku',$data);
	}
	

	
    
}