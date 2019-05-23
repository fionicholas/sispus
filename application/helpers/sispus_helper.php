<?php

function check_session()
{
	$SE= & get_instance();
	$session= $SE->session->userdata('status_login');
	if($session != 'oke')
	{
		redirect('auth/login');
	}
}

function check_session_login()
{
	$SE= & get_instance();
	$session= $SE->session->userdata('status_login');
	if($session == 'oke')
	{
		redirect('dashboard');
	}
}

?>