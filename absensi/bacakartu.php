<?php 
	include "koneksi.php";
	//baca tabel status untuk mode absensi
	$sql = mysqli_query($konek, "select * from status");
	$data = mysqli_fetch_array($sql);
	$mode_absen = $data['mode'];

	//uji mode absen
	$mode = "";
	if($mode_absen==1)
		$mode = "Masuk Kandang";
	else if($mode_absen==2)
		$mode = "Keluar Kandang";



	//baca tabel tmprfid
	$baca_kartu = mysqli_query($konek, "select * from tmprfid");
	$data_kartu = mysqli_fetch_array($baca_kartu);
	$idhewan    = $data_kartu['idhewan'];
?>


<div class="container-fluid" style="text-align: center;">
	<?php if($idhewan=="") { ?>

	<h3>Absen : <?php echo $mode; ?> </h3>
	<h3>Silahkan Tempelkan Kartu RFID Hewan</h3>
	<img src="images/rfid.png" style="width: 200px"> <br>
	<img src="images/animasi2.gif">

	<?php } else {
		//cek nomor kartu RFID tersebut apakah terdaftar di tabel karyawan
		$cari_karyawan = mysqli_query($konek, "select * from karyawan where idhewan='$idhewan'");
		$jumlah_data = mysqli_num_rows($cari_karyawan);

		if($jumlah_data==0)
			echo "<h1>Maaf! Kartu Tidak Dikenali</h1>";
		else
		{
			//ambil nama karyawan
			$data_karyawan = mysqli_fetch_array($cari_karyawan);
			$idhewan = $data_karyawan['idhewan'];

			//tanggal dan jam hari ini
			date_default_timezone_set('Asia/Makassar') ;
			$tanggal = date('Y-m-d');
			$jam     = date('H:i:s');

			//cek di tabel absensi, apakah nomor kartu tersebut sudah ada sesuai tanggal saat ini. Apabila belum ada, maka dianggap absen masuk, tapi kalau sudah ada, maka update data sesuai mode absensi
			$cari_absen = mysqli_query($konek, "select * from absensi where idhewan='$idhewan' and tanggal='$tanggal'");
			//hitung jumlah datanya
			$jumlah_absen = mysqli_num_rows($cari_absen);
			if($jumlah_absen == 0)
			{
				echo "<h1>Selamat Datang <br> $idhewan</h1>";
				mysqli_query($konek, "insert into absensi(idhewan, tanggal, jam_masuk)values('$idhewan', '$tanggal', '$jam')");
			}
			else
			{
				//update sesuai pilihan mode absen
				if($mode_absen == 4)
				{
					echo "<h1>Hewan Keluar Kandang <br> $idhewan</h1>";
					mysqli_query($konek, "update absensi set jam_pulang='$jam' where idhewan='$idhewan' and tanggal='$tanggal'");
				}
			}
		}

		//kosongkan tabel tmprfid
		mysqli_query($konek, "delete from tmprfid");
	} ?>

</div>