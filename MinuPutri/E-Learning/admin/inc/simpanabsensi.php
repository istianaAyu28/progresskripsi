<?php
	include "connect.php";
    $id_kelas=$_GET['id'];

	$querysiswa = "select * from tb_siswa where id_kelas='$id_kelas'";
	$res_siswa=mysqli_query($connect,$querysiswa);
	$berhasil=true;
	while($data=mysqli_fetch_array($res_siswa)){
		$id_siswa=$data[0];
        $tgl=date("Y-m-d");
		$id_post='ket'.$id_siswa;
		$ket=$_POST[$id_post];
		if($sql_absen=mysqli_query($connect,"INSERT INTO absen VALUES(null,'$tgl','$ket','$id_kelas','$id_siswa')")){
			
		}else{
			$berhasil=false;
			echo 'gagal';
		}
	}
	
	if($berhasil){
		?> <script>alert('Simpan Data Berhasil')</script><?php
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=absensi.php">';		
	}else{
		?> <script>alert('Simpan Data Gagal');</script><?php		
	}
?>