<?php
	
  session_start();
	include "connect.php";
	/*
	if(isset($_session['id'])){
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';	
	}*/		
	$id = $_SESSION['id'];

    $tgl=date("d-m-Y");
	$jumlah_kelas=mysqli_num_rows(mysqli_query($connect,"select * from tb_kelas"));
	$jumlah_siswa=mysqli_num_rows(mysqli_query($connect,"select * from tb_siswa"));
	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Absensi <?php if($_GET["tb_kelas"] == "001"){echo 'R6A';}elseif($_GET["tb_kelas"] == "002"){echo'R6X';}?>  <?=$_GET["jadwal"].' ('.$tgl.')'?> </h1>

            <!-- DataTales -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Siswa </h6>
            </div>
            <div class="card-body">             
                <form role="form" action="simpanabsensi.php?id=<?php echo $_GET['tb_kelas'];?>" method="post" name="postform" enctype="multipart/form-data">
              <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr align="center">
                      <th>No</th>
                      <th>Profil</th>
                      <th>NIS</th>
                      <th>Nama</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody align="center">
                    <?php
                    $id_kelas=$_GET['tb_kelas'];
                    $sql="SELECT * FROM tb_siswa WHERE id_kelas='$id_kelas'";
                    $query=mysqli_query($connect,$sql);
                    $i = 1;
                    while ($data=mysqli_fetch_array($query)){
                        $id_siswa=$data["nis"];
                        $nama=$data["nama"];
                    ?>
                    <tr>
                      <td><?=$i++;?></td>
                      <td><img class="img-profile rounded-circle" style="width:50px;height:50px;" src="img/<?= $data["foto"];?>"></td>
                      <td><?= $id_siswa;?></td>
                      <td><?= $nama;?></td>
                      <td> 
                      <label class="radio-inline"><input type="radio" name="<?= 'ket'.$data["nis"];?>" id="<?php echo 'opsi1'.$id_siswa;?>" value="Hadir">Hadir</label>
                      <label class="radio-inline"><input type="radio" name="<?= 'ket'.$data["nis"];?>" id="<?php echo 'opsi1'.$id_siswa;?>" value="Absen">Absen</label>
                      <label class="radio-inline"><input type="radio" name="<?= 'ket'.$data["nis"];?>" id="<?php echo 'opsi1'.$id_siswa;?>" value="Sakit">Sakit</label>
                      <label class="radio-inline"><input type="radio" name="<?= 'ket'.$data["nis"];?>" id="<?php echo 'opsi1'.$id_siswa;?>" value="Izin">Izin</label>

                      </td>
                    </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-primary mt-4 col-md-2 offset-10">Simpan Data</button>
            </form>
            
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
