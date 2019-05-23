<?php
class Model_pustakawan extends CI_Model{


		function login($username, $password)
		{
			$chek = $this->db->get_where('pustakawan',array('username'=>$username,'password'=>md5($password)));

			if($chek->num_rows()>0)
			{
				return 1;
			}
			else {
				return 0;
			}
		}

		function tampil_data()
		{
			return $this->db->get('pustakawan');
		}

function get_one($id)
{
	$param = array('pustakawan_id'=>$id);
	return $this->db->get_where('pustakawan',$param);
}
}