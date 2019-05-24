<?php
class Model_transaksi extends CI_Model {
    function tampil_data()
	{
		$query = "SELECT b.judul, a.nama, p.tanggal_pinjam, p.tanggal_kembali, p.denda, p.status, p.peminjaman_id FROM buku as b,anggota as a, peminjaman as p WHERE b.buku_id=p.buku_id AND a.anggota_id=p.anggota_id";
		return $this->db->query($query);
    }
    
    function post($data)
	{
		$this->db->insert('peminjaman', $data);
	}

	function get_one($id)
	{
		$param = array('peminjaman_id'=>$id);
	return $this->db->get_where('peminjaman',$param);
	}

	function edit($data, $id)
	{
		$this->db->where('peminjaman_id',$id);
		$this->db->update('peminjaman', $data);
	}
	function delete($id)
{
	$this->db->where('peminjaman_id', $id); 
	$this->db->delete('peminjaman');
}
}

?>