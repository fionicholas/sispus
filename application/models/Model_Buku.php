<?php
class Model_Buku extends CI_Model{

function tampilkan_data(){
	return $this->db->get('buku');
}

function tampilkan_data_paging($halaman)
{
	return $this->db->query("select * from buku limit $halaman,5"); 
}


function post(){

$data=array('judul' => $this->input->post('judul'),
			'penerbit' => $this->input->post('penerbit'),
			'tahun_terbit' => $this->input->post('tahun_terbit'),
			'stok' => $this->input->post('stok')
		
			);
	$this->db->insert('buku',$data);

}

function edit()
{
	$data=array(
		
			'judul' => $this->input->post('judul'),
			'penerbit' => $this->input->post('penerbit'),
			'tahun_terbit' => $this->input->post('tahun_terbit'),
			'stok' => $this->input->post('stok')
		


		);
	$this->db->where('buku_id', $this->input->post('id')); 
	$this->db->update('buku',$data);

}



function get_one($id)
{
	$param = array('buku_id'=>$id);
	return $this->db->get_where('buku',$param);
}

function delete($id)
{
	$this->db->where('buku_id', $id); 
	$this->db->delete('buku');
}

}