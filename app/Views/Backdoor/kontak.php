<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KGA | Daftar Merek</title>
  <style>
  th.dpass, td.dpass {display: none;}
  </style>

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/adminlte.min.css');?>">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/fontawesome-all.min.css');?>">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/dataTables.bootstrap4.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.bootstrap4.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/buttons.bootstrap4.min.css');?>">

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  
  <!-- Main Sidebar Container -->
  <?= $this->include('Backdoor/sidebar') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Katalog</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('Backdoor/welcome');?>">Home</a></li>
              <li class="breadcrumb-item active">Daftar Katalog</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="card">

        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th style="text-align: center;">No.</th>
              <th class="noExport" style="text-align: center;">id</th>
              <th style="text-align: center;">Nama Kontak</th>
              <th style="text-align: center;">Alamat</th>
              <th style="text-align: center;">Email</th>
              <th style="text-align: center;">Nomor HP</th>
              <th class="noExport" style="text-align: center;">Aksi</th>

            </tr>
            </thead>
            <tbody>
          <?php

          $num=1;
          foreach ($kontak as $row) { ?>
            <tr>
              <td class="num" style="text-align: center;"><?php echo $num;?></td>
              <td class="id" style="text-align: center;"><?php echo $row['id'];?></td>
              <td class="nama_kontak" style="text-align: center;"><?php echo $row['nama']; ?></td>
              <td class="alamat" style="text-align: center;"><?php echo $row['alamat'];?></td>
              <td class="email" style="text-align: center;"><?php echo $row['email'];?></td>
              <td class="no_hp" style="text-align: center;"><?php echo $row['no_hp'];?></td>
              <td style="text-align: center;">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i> Edit</button>
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fas fa-trash"></i> Hapus</button>

                </td>
            </tr>
          <?php $num++;} ?>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <div class="modal fade" id="editModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Informasi Kontak</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editKontak" method="POST" action="<?php echo base_url('Backdoor/Edit_Kontak'); ?>">

        <div class="form-group">
        <input type="text" name="id"  class="form-control id" hidden >
        <label for="namaKontak">Nama Kontak</label><input type="text" name="nama_kontak" class="form-control nama_kontak " required >
      </div>
      <div class="form-group">
        
        <label for="alamatKontak">Alamat </label><input type="text" name="alamat" class="form-control alamat " required >
      </div>
      <div class="form-group">
        
        <label for="email">Email</label><input type="text" name="email" class="form-control email " required >
      </div>
      <div class="form-group">
        <label for="nomorHP">Nomor HP</label><input type="text" name="no_hp" class="form-control no_hp " required >
      </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Hapus Merek</h5>
      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form method="POST" action="<?php echo base_url('Backdoor/Delete_Kontak'); ?>">
      <div class="form-group">
      <input type="text" name="id"  class="form-control id_delete" hidden>
      <p> Apakah Anda yakin ingin menghapus merek barang ini? </p>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-success" data-bs-dismiss="modal">Tidak</button>
      <button type="submit" class="btn btn-danger">Ya</button>
    </form>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Tambah Informasi Kontak</h5>
      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form id="addKontak" method="POST" action="<?php echo base_url('Backdoor/Add_Kontak'); ?>">
      <div class="form-group">
      <label for="namaKontak">Nama Kontak</label>
      <input type="text" name="nama" class="form-control" required placeholder="Silahkan mengisi nama kontak">
      </div>
      <div class="form-group">
      <label for="alamatKontak">Alamat</label>
      <input type="text" name="alamat" class="form-control" required placeholder="Silahkan mengisi alamat">
      </div>
      <div class="form-group">
      <label for="email">Email</label>
      <input type="text" name="email" class="form-control" required placeholder="Silahkan mengisi email">
      </div>
      <div class="form-group">
      <label for="no_hp">Nomor HP</label>
      <input type="text" name="no_hp" id="no_hp" class="form-control" required placeholder="Silahkan mengisi nomor hp">
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Save changes</button>
    </form>
    </div>
  </div>
</div>
</div>







 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/js/adminlte.min.js');?>"></script>
<!-- jquery-validation -->
<script src="<?php echo base_url('assets/js/jquery-validation/jquery.validate.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery-validation/additional-methods.min.js');?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/dataTables.bootstrap4.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/dataTables.responsive.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/responsive.bootstrap4.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/dataTables.buttons.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/buttons.bootstrap4.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jszip.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/pdfmake.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/vfs_fonts.js');?>"></script>
<script src="<?php echo base_url('assets/js/buttons.html5.min.js');?>"></script>

<script src="<?php echo base_url('assets/js/buttons.colVis.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/autoNumeric.min.js');?>"></script>

<script>





$(function () {
    $("#example1").DataTable({
                        "retrieve":true,"responsive": true, "lengthChange": false, "autoWidth": false,"ordering": false,
                        "buttons": [{text: 'Tambah Informasi Kontak',action: function (e, node, config){$('#addModal').modal('show')}}],
                        "aoColumnDefs": [ { "sClass": "dpass", "aTargets": [ 1 ] } ]

    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');



  });









  $(function () {
  $.validator.setDefaults({
    submitHandler: function (form) {
      form.submit();
    }
  });
  $('#addKontak').validate({
    rules: {
      nama: {
        required: true,
      },
      alamat: {
        required: true,
      },
      email: {
        required: true,
        email: true
      },
      no_hp: {
        required: true,
        number:true
      },
    },
    
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});

$(function () {
  $.validator.setDefaults({
    submitHandler: function (form) {
      form.submit();
    }
  });
  $('#editKontak').validate({
    rules: {
      nama_merek: {
        required: true,
      },
    },
    
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
    });
  });


  $('#editModal').on('show.bs.modal', function (e) {
    var _button = $(e.relatedTarget);
    // console.log(_button, _button.parents("tr"));
    var _row = _button.parents("tr");
    var _nama_kontak = _row.find(".nama_kontak").text();
    var _id= _row.find(".id").text();
    var _alamat= _row.find(".alamat").text();
    var _email= _row.find(".email").text();
    var _no_hp= _row.find(".no_hp").text();


    $(this).find(".nama_kontak").val(_nama_kontak);
    $(this).find(".alamat").val(_alamat);
    $(this).find(".email").val(_email);
    $(this).find(".no_hp").val(_no_hp);
    $(this).find(".id").val(_id);
    });



$('#deleteModal').on('show.bs.modal', function (e) {

  var _button = $(e.relatedTarget);

  // console.log(_button, _button.parents("tr"));
  var _row = _button.parents("tr");
  var _id_delete = _row.find(".id").text();
  $(this).find(".id_delete").val(_id_delete);

});

function setInputFilter(textbox, inputFilter) {
  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
    textbox.addEventListener(event, function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        this.value = "";
      }
    });
  });
}



setInputFilter(document.getElementById("no_hp"), function(value) {
  return /^-?\d*$/.test(value); });



</script>




</body>
</html>
