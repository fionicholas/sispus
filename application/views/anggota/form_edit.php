
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
<h3>Edit anggota </h3>

<?php
echo form_open('anggota/edit');

?>

<input type="hidden" value="<?php echo $record['anggota_id']?>" name="id">

<table class="table table-bordered">

<tr>
<td>Nama anggota</td>
<td><div class="col-sm-8"><input type="text" name="nama" class="form-control" value ="<?php echo $record['nama']?>">
</div>
</td>
</tr>

<tr>
<td width="130">Alamat</td>
<td><div class="col-sm-8"><input type="text" name="alamat" class="form-control" value ="<?php echo $record['alamat']?>">
</div></td>
</tr>

<tr>
<td width="130">No Handphone</td>
<td><div class="col-sm-8"><input type="text" name="no_hp" class="form-control" value ="<?php echo $record['no_hp']?>">
</div></td>
</tr>

<tr>
<td width="130">Username</td>
<td><div class="col-sm-8"><input type="text" name="username" class="form-control" value ="<?php echo $record['username']?>">
</div></td>
</tr>


<input type="hidden" name="password" class="form-control" value ="<?php echo $record['password']?>">


<tr><td colspan="2"><button class="btn btn-danger" type="submit" name="submit">Update</button></td></tr>
</table>
</form>

</div>
        <!-- /.box-body -->
        
      </div>
      <!-- /.box -->

    </section>
	<!-- /.content -->
	