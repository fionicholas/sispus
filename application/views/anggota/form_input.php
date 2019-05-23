
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
        
<h3>Data anggota</h3>

<?php
echo form_open('anggota/post');

?>

<table class="table tablebordered">

<tr>
<td width="200">Nama Anggota</td>
<td><div class="col-sm-8"><input type="text" name="nama" class="form-control" placeholder="Nama Anggota">
</div></td>
</tr>


<tr>
<td width="200">Alamat</td>
<td><div class="col-sm-8"><input type="text" name="alamat" class="form-control" placeholder="Alamat">
</div></td>
</tr>

<tr>
<td width="200">No Handphone</td>
<td><div class="col-sm-2"><input type="text" name="no_hp" class="form-control" placeholder="No Handphone">
</div></td>
</tr>

<tr>
<td width="200">Username</td>
<td><div class="col-sm-2"><input type="text" name="username" class="form-control" placeholder="Username">
</div></td>
</tr>

<tr>
<td width="200">Password</td>
<td><div class="col-sm-2"><input type="password" name="password" class="form-control" placeholder="Password">
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
	