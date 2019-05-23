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
        'password' => $this->input->post('password')
		


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

function login($username, $password)
		{
			$chek = $this->db->get_where('anggota',array('username'=>$username,'password'=>md5($password)));

			if($chek->num_rows()>0)
			{
				return 1;
			}
			else {
				return 0;
			}
		}

		public function filter($search, $limit, $start, $order_field, $order_ascdesc){
			$this->db->like('buku_id', $search); // Untuk menambahkan query where LIKE
			$this->db->or_like('judul', $search); // Untuk menambahkan query where OR LIKE
			$this->db->or_like('penerbit', $search); // Untuk menambahkan query where OR LIKE
			$this->db->or_like('tahun_terbit', $search); // Untuk menambahkan query where OR LIKE
			$this->db->or_like('stok', $search); // Untuk menambahkan query where OR LIKE
			$this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
			$this->db->limit($limit, $start); // Untuk menambahkan query LIMIT
			return $this->db->get('buku')->result_array(); // Eksekusi query sql sesuai kondisi diatas
		  }
		  public function count_all(){
			return $this->db->count_all('buku'); // Untuk menghitung semua data siswa
		  }
		  public function count_filter($search){
			$this->db->like('buku_id', $search); // Untuk menambahkan query where LIKE
			$this->db->or_like('judul', $search); // Untuk menambahkan query where OR LIKE
			$this->db->or_like('penerbit', $search); // Untuk menambahkan query where OR LIKE
			$this->db->or_like('tahun_terbit', $search); // Untuk menambahkan query where OR LIKE
			$this->db->or_like('stok', $search); // Untuk menambahkan query where OR LIKE
			
			return $this->db->get('buku')->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian

		  }
		}