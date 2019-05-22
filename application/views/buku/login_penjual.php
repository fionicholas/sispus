<!DOCTYPE html>
<html>
    <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KebunKu</title>
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">

    <!-- pembatas -->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url();?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url();?>assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head> 
<body class="login-page">
 

        
        <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Kebun<b> Ku</b></a>
            <small>Login Penjual - KebunKu</small>
        </div>

        <div class="card">
            <div class="body">

                <?php

                echo form_open('auth_penjual/login');

                ?>
            
                   <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                        </div>
                    </div>
                        
                   <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>

                        
                      
                    <div class="row">
                        <div class="col-md-12">
                        
                            <button name="submit" class="btn btn-block bg-blue waves-effect" type="submit">SIGN IN</button>
                       </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                        
                            <button name="submit" class="btn btn-block bg-orange waves-effect" type="submit">REGISTER</button>
                       </div>
                    </div>

                </form>
                
                
                    </div>
                    </div> 

       </div> 
    </div>

<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>


<script type="text/javascript">




function add_person()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Registrasi Mahasiswa'); // Set Title to Bootstrap modal title

    $('#photo-preview').hide(); // hide photo preview modal

    $('#label-photo').text('Upload Bukti'); // label photo upload
}

function edit_person(nim)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string


    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('kkm/ajax_edit')?>/" + nim,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="nim"]').val(data.nim);
            $('[name="nama"]').val(data.nama);
            // $('[name="fakultas"]').val(data.fakultas);
            $('[name="jurusan"]').val(data.jurusan);
            $('[name="notelp"]').val(data.notelp);
            $('[name="password"]').val(data.password);
            $('[name="kelompok_id"]').val(data.kelompok_id);
            $('[name="foto"]').val(data.foto);
            $('[name="alamat"]').val(data.alamat);
            $('[name="noortu"]').val(data.noortu);
            $('[name="status"]').val(data.status);
            // $('[name="dob"]').datepicker('update',data.dob);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Ubah Data'); // Set title to Bootstrap modal title

            $('#photo-preview').show(); // show photo preview modal

            if(data.bukti)
            {
                $('#label-photo').text('Ubah Gambar'); // label photo upload
                $('#photo-preview div').html('<img src="'+base_url+'upload/'+data.bukti+'" class="img-responsive">'); // show photo
                // $('#photo-preview div').append('<input type="checkbox" name="remove_photo" value="'+data.bukti+'"/> Remove photo when saving'); // remove photo

            }
            else
            {
                $('#label-photo').text('Upload Bukti'); // label photo upload
                $('#photo-preview div').text('Belum Bayar');
            }


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

function save()
{
    $('#btnSave').text('Sedang Menyimpan...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('kkm/ajax_add')?>";
    } else {
        url = "<?php echo site_url('kkm/ajax_update')?>";
    }

    // ajax adding data to database

    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('Simpan'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Data Gagal di Simpan');
            $('#btnSave').text('Simpan'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

function delete_person(nim)
{
    if(confirm('Yakin anda akan menghapus data ini?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('kkm/ajax_delete')?>/"+nim,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Data gagal di hapus');
            }
        });

    }
}

</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form Mahasiswa</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">NIM</label>
                            <div class="col-md-9">
                                <input name="nim" placeholder="Nomor Induk Mahasiswa" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Lengkap</label>
                            <div class="col-md-9">
                                <input name="nama" placeholder="Nama Lengkap" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label class="control-label col-md-3">Fakultas</label>
                            <div class="col-md-9">
                                <select name="fakultas" class="form-control">
                                    <option value="">--Pilih Fakultas--</option>
                                    <option value="FTI">FTI</option>
                                    <option value="FEB">FEB</option>
                                    <option value="FISIP">FISIP</option>
                                    <option value="HUKUM">HUKUM</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <label class="control-label col-md-3">Jurusan</label>
                            <div class="col-md-9">
                                <select name="jurusan" class="form-control">
                                    <option value="">--Pilih Jurusan--</option>
                                    <option value="Sistem Komputer">Sistem Komputer</option>
                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                    <option value="Sistem Informasi">Sistem Informasi</option>
                                    <option value="Manajemen">Manajemen</option>
                                    <option value="Akuntansi">Akuntansi</option>
                                    <option value="Teknik Sipil">Teknik Sipil</option>
                                    <option value="Teknik Industri">Teknik Industri</option>
                                    <option value="Teknik Kimia">Teknik Kimia</option>
                                    <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
                                    <option value="Administrasi Negara">Administrasi Negara</option>
                                    <option value="Pendidikan Matematika">Pendidikan Matematik</option>
                                    <option value="Ilmu Hukum">Ilmu Hukum</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nomor Telpon</label>
                            <div class="col-md-9">
                                <input name="notelp" placeholder="Nomor Telpon" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Password</label>
                            <div class="col-md-9">
                                <input name="password" placeholder="Password" class="form-control" type="password">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                           
                            <div class="col-md-9">
                                <input name="kelompok_id" placeholder="Kelompok ID" value="0" class="form-control" type="hidden">
                                <span class="help-block"></span>
                            </div>
                        </div>
                       <div class="form-group">
                       
                            <div class="col-md-9">
                               <input name="foto" placeholder="Kelompok ID" value="foto" class="form-control" type="hidden">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label class="control-label col-md-3">Alamat</label>
                            <div class="col-md-9">
                                <textarea name="alamat" placeholder="Alamat" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nomor Telpon ORTU</label>
                            <div class="col-md-9">
                                <input name="noortu" placeholder="Nomor Ortu" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                          
                            <div class="col-md-9">
                               <input name="status" placeholder="status" value="belum aktif" class="form-control" type="hidden">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label class="control-label col-md-3">Date of Birth</label>
                            <div class="col-md-9">
                                <input name="dob" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div> -->
                        <div class="form-group" id="photo-preview">
                            <label class="control-label col-md-3">Bukti</label>
                            <div class="col-md-9">
                                Belum Bayar
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" id="label-photo">Upload Bukti </label>
                            <div class="col-md-9">
                                <input name="bukti" type="file">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->


</body>
</html>