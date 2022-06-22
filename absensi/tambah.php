<!-- proses penyimpanan -->

<?php 
	include "koneksi.php";

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
		$simpan = mysqli_query($konek, "insert into karyawan(idhewan, jenishewan, jeniskelamin, usiahewan, berat, lokasi)values('$idhewan', '$jenishewan', '$jeniskelamin', '$usiahewan', '$berat', '$lokasi')");

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

	//kosongkan tabel tmprfid
	mysqli_query($konek, "delete from tmprfid");
?>

<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<title>Tambah Data Hewan</title>

	<!-- pembacaan no kartu otomatis -->
	<script type="text/javascript">
		$(document).ready(function(){
			setInterval(function(){
				$("#norfid").load('nokartu.php')
			}, 0);  //pembacaan file nokartu.php, tiap 1 detik = 1000
		});
	</script>

</head>
<body>

	<?php include "menu.php"; ?>

	<!-- isi -->
	<div class="container-fluid">
		<h3>Tambah Data Hewam</h3>

		<!-- form input -->
		<form method="POST">
			<div id="norfid"></div>

			<div class="form-group">
				<label>Jenis Hewan</label>
				<input type="text" name="jenishewan" id="jenishewan" placeholder="jenis hewan" class="form-control" style="width: 400px">
			</div>
			<div class="form-group">
				<label>Jenis Kelamin</label>
				<textarea class="form-control" name="jeniskelamin" id="jeniskelamin" placeholder="jenis kelamin" style="width: 400px"></textarea>
			</div>
			<div class="form-group">
				<label>Usia Hewan</label>
				<textarea class="form-control" name="usiahewan" id="usiahewan" placeholder="usia hewan" style="width: 400px"></textarea>
			</div>
			<div class="form-group">
				<label>Berat</label>
				<textarea class="form-control" name="berat" id="berat" placeholder="berat" style="width: 400px"></textarea>
			</div>
			<div class="form-group">
				<label>Lokasi</label>
				<textarea class="form-control" name="lokasi" id="lokasi" placeholder="lokasi" style="width: 400px"></textarea>
			</div>

			<button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
		</form>
	</div>

	<?php include "footer.php"; ?>

</body>
</html>