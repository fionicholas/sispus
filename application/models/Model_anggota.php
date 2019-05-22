<?php
class Model_anggota extends CI_Model{

function tampilkan_data(){
	return $this->db->get('anggota');
}

function tampilkan_data_paging($halaman)
{
	return $this->db->query("select * from anggota limit $halaman,5"); 
}


function post(){

$data=array('nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_hp' => $this->input->post('no_hp'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password'))
		
			);
	$this->db->insert('anggota',$data);

}

function edit()
{
	$data=array(
		
        'nama' => $this->input->post('nama'),
        'alamat' => $this->input->post('alamat'),
        'no_hp' => $this->input->post('no_hp'),
        'username' => $this->input->post('username'),
		


		);
	$this->db->where('anggota_id', $this->input->post('id')); 
	$this->db->update('anggota',$data);

}



function get_one($id)
{
	$param = array('anggota_id'=>$id);
	return $this->db->get_where('anggota',$param);
}

function delete($id)
{
	$this->db->where('anggota_id', $id); 
	$this->db->delete('anggota');
}

}