<!-- proses penyimpanan -->

<?php 
	include "koneksi.php";

	//baca ID data yang akan di edit
	$idhewan = $_GET['idhewan'];

	//baca data karyawan berdasarkan id
	$cari = mysqli_query($konek, "select * from karyawan where idhewan='$idhewan'");
	$hasil = mysqli_fetch_array($cari);


	//jika tombol simpan diklik
	if(isset($_POST['btnSimpan']))
	{
		//baca isi inputan form
		$idhewan = $_POST['idhewan'];
		$jenishewan    = $_POST['jenishewan'];
		$jeniskelamin  = $_POST['jeniskelamin'];
		$usiahewan = $_POST['usiahewan'];
		$berat = $_POST['berat'];
		$lokasi = $_POST['lokasi'];

		//simpan ke tabel karyawan
		$simpan = mysqli_query($konek, "update hewan set idhewan='$idhewan', jenishewan='$jenishewan', jeniskelamin='$jeniskelamin', usiahewan='$usiahewan', berat='$berat', lokasi='$lokasi' where id='$id'");
		//jika berhasil tersimpan, tampilkan pesan Tersimpan,
		//kembali ke data karyawan
		if($simpan)
		{
			echo "
				<script>
					alert('Tersimpan');
					location.replace('datakaryawan.php');
				</script>
			";
		}
		else
		{
			echo "
				<script>
					alert('Gagal Tersimpan');
					location.replace('datakaryawan.php');
				</script>
			";
		}

	}
?>

<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<title>Tambah Data Hewan</title>
</head>
<body>

	<?php include "menu.php"; ?>

	<!-- isi -->
	<div class="container-fluid">
		<h3>Tambah Data Hewan</h3>

		<!-- form input -->
		<form method="POST">
			<div class="form-group">
				<label>Id.Hewan</label>
				<input type="text" name="idhewan" id="idhewan" placeholder="nomor kartu RFID" class="form-control" style="width: 200px" value="<?php echo $hasil['idhewan']; ?>">
			</div>
			<div class="form-group">
				<label>Jenis Hewan</label>
				<input type="text" name="jenishewan" id="jenishewan" placeholder="jenis hewan" class="form-control" style="width: 400px" value="<?php echo $hasil['jenishewan']; ?>">
			</div>
			<div class="form-group">
				<label>Jenis Kelamin</label>
				<textarea class="form-control" name="jeniskelamin" id="jeniskelamin" placeholder="jenis kelamin" style="width: 400px"><?php echo $hasil['jeniskelamin']; ?></textarea>
			</div>
			<div class="form-group">
				<label>Usia Hewan</label>
				<textarea class="form-control" name="usiahewan" id="usiahewan" placeholder="usia hewan" style="width: 400px"><?php echo $hasil['usiahewan']; ?></textarea>
			</div>
			<div class="form-grup">
				<label>Berat</label>
				<textarea class="form-control" name="berat" id="berat" placeholder="berat hewan" style="widht: 400px"><?php echo $hasil['berat']; ?></textarea>
			</div>
			<div class="form-grup">
				<label>Lokasi</label>
				<textarea class="form-control" name="lokasi" id="lokasi" placeholder="lokasi hewan" style="widht: 400px"><?php echo $hasil['lokasi']; ?></textarea>
			</div>
			<button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
		</form>
	</div>

	<?php include "footer.php"; ?>

</body>
</html>