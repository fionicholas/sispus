<h3>Profil Toko</h3>


<table class="table table-bordered">
	

	<?php
	$no=1+$this->uri->segment(3);
foreach ($query->result() as $r) 

{
echo "<tr>
		<td width='200'>ID Toko</td> <td colspan='2'>$r->penjual_id</td>
	</tr>
	<tr>
		<td width='200'>Nama Toko </td> <td colspan='2'>$r->nama</td>
	</tr>
	<tr>
		<td width='200'>Username</td> <td colspan='2'>$r->username</td>
	</tr>
	<tr>
		<td width='200'>Email</td> <td colspan='2'>$r->email</td>
	</tr>

	<tr>
		<td width='200'>Alamat Toko</td> <td colspan='2'>$r->alamat</td>
	</tr>
	";
	$no++;

}
?>
</table>


	