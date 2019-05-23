
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
		
		<h3>Data Buku </h3>

		

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

				<div class="table-responsive">
        <table class="table table-bordered" id="table-buku">
          <thead>
            <tr>
              <th>ID</th>
              <th>Judul</th>
              <th>Penerbit</th>
              <th>Tahun Terbit</th>
              <th>Stok</th>
              
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
    <!-- Load Jquery & Datatable JS -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    <script>
    var tabel = null;
    $(document).ready(function() {
        tabel = $('#table-buku').DataTable({
            "processing": true,
            "serverSide": true,
            "ordering": true, // Set true agar bisa di sorting
            "order": [[ 0, 'asc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
            "ajax":
            {
                "url": "<?php echo base_url('index.php/anggota/json') ?>", // URL file untuk proses select datanya
                "type": "POST"
            },
            "deferRender": true,
            "aLengthMenu": [[5, 10, 50],[ 5, 10, 50]], // Combobox Limit
            "columns": [
                { "data": "buku_id" }, // Tampilkan nis
                { "data": "judul" },  // Tampilkan nama
                
                { "data": "penerbit" }, // Tampilkan telepon
                { "data": "tahun_terbit" }, // Tampilkan alamat
                { "data": "stok" }, // Tampilkan alamat
               
            ],
        });
    });
    </script>
		
	
        </div>
        <!-- /.box-body -->
        
      </div>
      <!-- /.box -->

    </section>
	<!-- /.content -->
	


