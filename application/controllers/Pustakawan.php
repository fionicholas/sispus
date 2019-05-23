<?php

class Pustakawan extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('model_pustakawan');
	}


	function login()
	{
		if(isset($_POST['submit'])){

			//proses login
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$hasil = $this->model_pustakawan->login($username,$password);
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
					redirect('pustakawan/home');
			}
			else {
				redirect('pustakawan/login');
				$this->session->set_flashdata('message', 'anda gagal login...!!!');

			}
		} 
		else {
		check_session_login();
		$this->load->view('pustakawan/login');
		}
		
	}
	function logout()
	{
		
		$this->session->sess_destroy();
		redirect('pustakawan/login');
	}

	function home()
	{
		$this->template->load('master_pustakawan','pustakawan/home');
	}

	

}