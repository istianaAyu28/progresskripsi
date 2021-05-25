<?php 

require_once 'koneksi.php';
$query = mysqli_query($koneksi, "SELECT id, nama, alamat, foto, no_hp, mata_pelajaran FROM tbl_guru");
$aktif = 'guru';
$no = 1;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Daftar Guru - MINU "PUTRI" MALANG</title>
	<link rel="stylesheet" href="resources/fonts/stylesheet.css">
	<link rel="stylesheet" href="resources/css/bootstrap.min.css">
	<link rel="stylesheet" href="resources/css/style.css">
</head>
<body>
	<div class="container bg-light">
		<!-- top bar -->
		<div class="logo clearfix">
			<div class="float-left mt-3 mb-3">
				<img src="resources/images/logo.png" alt="Logo Sekolah" width="70px" class="float-left mr-3">
				<div class="text float-right">
					<span class="smk"> MINU "PUTRI" MALANG</span><br>
					<span class="visi">"UNGGUL DALAM PRESTASI, BERNUANSA IMAN DAN TAQWA SERTA ILMU PENGETAHUAN DAN TEKNOLOGI YANG BERHALUAN AHLUS SUNNAH WAL JAMA’AH"</span>
				</div>
			</div>
		</div>
			
		<!-- nav bar -->
		<?php require_once 'navbar.php'; ?>

		<!-- content -->
		<div class="row p-3">
			<div class="col-md-8">
				<div class="title mb-3">
					Daftar Guru
				</div>
				<table id="table_id" class="dataTable table table-bordered">
				    <thead>
				        <tr>
				            <th>No</th>
				            <th width="50px">Foto</th>
				            <th>Nama</th>
				            <th>Mata Pelajaran</th>
				            <th>Alamat</th>
				        </tr>
				    </thead>
				    <tbody>
				        <?php while($row = mysqli_fetch_assoc($query)) : ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><img src="images/guru/<?= $row['foto'] ?>" alt="" width="100%" class="img-thumbnail"></td>
								<td><a href="detail_guru.php?id=<?= $row['id'] ?>"><?= $row['nama'] ?></a></td>
								<td><?= $row['mata_pelajaran'] ?></td>
								<td><?= $row['alamat'] ?></td>
							</tr>
						<?php endwhile; ?>
				    </tbody>
				</table>
			</div>
		</div>
		<div class="text-white footer">
		2020 © Copyright by Ayu & Nia <a style="color:white;" target="_blank" rel="noopener noreferrer">Ayu Nia</a> 
		</div>
	</div>

	<script src="resources/js/jquery.js"></script>
	<script src="resources/js/bootstrap.min.js"></script>
	<script src="resources/datatables/datatables.min.js"></script>
	<script src="resources/datatables/datatable.js"></script>
</body>
</html>