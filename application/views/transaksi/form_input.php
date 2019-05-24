
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
        
        <h3>Data Buku</h3>

<?php
echo form_open('transaksi/post');

?>

<table class="table tablebordered">

<tr>
<td>Judul Buku</td>
<td>
<div class="col-sm-6">
<select name="judul" class="form-control">
	<?php
	foreach($buku as $b)
	{
		echo"<option value='$b->buku_id'>$b->judul</option>";
	}
	?>

</select>	
</div>
</td>
</tr>

<tr>
<td>Nama Anggota</td>
<td>
<div class="col-sm-6">
<select name="nama" class="form-control">
	<?php
	foreach($anggota as $a)
	{
		echo"<option value='$a->anggota_id'>$a->nama</option>";
	}
	?>

</select>	
</div>
</td>
</tr>


<tr>
<td width="200">Tanggal Peminjaman</td>
<td><div class="col-sm-4"><input type="date" name="tanggal_pinjam" class="form-control" placeholder="Tanggal Peminjaman">
</div></td>
</tr>

<tr>
<td width="200">Tanggal Pengembalian</td>
<td><div class="col-sm-4"><input type="date" name="tanggal_kembali" class="form-control" placeholder="Tanggal Pengembalian">
</div></td>
</tr>

<tr>
<td width="200">Denda</td>
<td><div class="col-sm-4"><input type="text" name="denda" class="form-control" placeholder="Denda">
</div></td>
</tr>

<tr>
<td width="200">status</td>
<td><div class="col-sm-2"><input type="text" name="status" class="form-control" placeholder="status">
</div></td>
</tr>


<tr><td colspan="2"><button class="btn btn-success" type="submit" name="submit">Tambah Peminjaman</button></td></tr>
</table>
</form>

</div>
        <!-- /.box-body -->
        
      </div>
      <!-- /.box -->

    </section>
	<!-- /.content -->