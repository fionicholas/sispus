
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
		
		<h3>Data Peminjaman </h3>

		<?php
			echo anchor('transaksi/post','Tambah Peminjaman',array('class'=>'btn btn-danger btn-sm'))
		?>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
		<table class="table table-bordered">
	<tr>
		<th>No</th>
		<th>Judul Buku</th>
		<th>Anggota Peminjam</th>
		<th>Tanggal Pinjam</th>
		<th>Tanggal Pengembalian</th>
		<th>Denda</th>
		<th>Status</th>
		
		<th colspan="2">Operasi</th>
	</tr>

	<?php
	$no=1+$this->uri->segment(3);
foreach ($record->result() as $r) 

{
echo "<tr>
		
		<td>$no</td>
		<td>$r->judul</td>
		<td>$r->nama</td>
		<td>$r->tanggal_pinjam</td>
		<td>$r->tanggal_kembali</td>
		<td>$r->denda</td>
		<td>$r->status</td>



		<td width='10'>".anchor('buku/edit/'.$r->peminjaman_id,'Edit')."</td>
		<td width='10'>".anchor('buku/delete/'.$r->peminjaman_id,'Delete')."</td>
	</tr>";

	$no++;

}
?>
</table>



<?php

echo $paging;

?>
	
        </div>
        <!-- /.box-body -->
        
      </div>
      <!-- /.box -->

    </section>
	<!-- /.content -->
	


