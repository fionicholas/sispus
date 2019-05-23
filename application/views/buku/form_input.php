
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
        
        <h3>Data Buku</h3>

<?php
echo form_open('buku/post');

?>

<table class="table tablebordered">

<tr>
<td width="200">Judul Buku</td>
<td><div class="col-sm-8"><input type="text" name="judul" class="form-control" placeholder="Judul Buku">
</div></td>
</tr>


<tr>
<td width="200">Penerbit</td>
<td><div class="col-sm-8"><input type="text" name="penerbit" class="form-control" placeholder="Penerbit">
</div></td>
</tr>

<tr>
<td width="200">Tahun Terbit</td>
<td><div class="col-sm-2"><input type="text" name="tahun_terbit" class="form-control" placeholder="Tahun Terbit">
</div></td>
</tr>

<tr>
<td width="200">Stok</td>
<td><div class="col-sm-2"><input type="text" name="stok" class="form-control" placeholder="Stok">
</div></td>
</tr>


<tr><td colspan="2"><button class="btn btn-success" type="submit" name="submit">Tambah</button></td></tr>
</table>
</form>

</div>
        <!-- /.box-body -->
        
      </div>
      <!-- /.box -->

    </section>
	<!-- /.content -->