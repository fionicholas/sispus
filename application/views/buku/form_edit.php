<!-- Main content -->
<section class="content">

<!-- Default box -->
<div class="box">
  <div class="box-header with-border">
  
<h3>Edit buku </h3>

<?php
echo form_open('buku/edit');

?>

<input type="hidden" value="<?php echo $record['buku_id']?>" name="id">

<table class="table table-bordered">

<tr>
<td>Judul Buku</td>
<td><div class="col-sm-8"><input type="text" name="judul" class="form-control" value ="<?php echo $record['judul']?>">
</div>
</td>
</tr>

<tr>
<td width="130">Penerbit</td>
<td><div class="col-sm-8"><input type="text" name="penerbit" class="form-control" value ="<?php echo $record['penerbit']?>">
</div></td>
</tr>

<tr>
<td width="130">Tahun Terbit</td>
<td><div class="col-sm-8"><input type="text" name="tahun_terbit" class="form-control" value ="<?php echo $record['tahun_terbit']?>">
</div></td>
</tr>

<tr>
<td width="130">Stok</td>
<td><div class="col-sm-8"><input type="text" name="stok" class="form-control" value ="<?php echo $record['stok']?>">
</div></td>
</tr>


<tr><td colspan="2"><button class="btn btn-danger" type="submit" name="submit">Update</button></td></tr>
</table>
</form>

</div>
        <!-- /.box-body -->
        
      </div>
      <!-- /.box -->

    </section>
	<!-- /.content -->