<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<title>Rekapitulasi Hewan</title>
</head>
<body>

	<?php include "menu.php"; ?>

	<!-- isi -->
	<div class="container-fluid">
		<h3>Rekap Absensi</h3>
		<table class="table table-bordered">
			<thead>
				<tr style="background-color: grey; color:white">
					<th style="width: 10px; text-align: center">No.</th>
					<th style="text-align: center">Id.Hewan</th>
					<th style="text-align: center">Jenis Hewan</th>
					<th style="text-align: center">Jenis Kelamin</th>
					<th style="text-align: center">Usia Hewan</th>
					<th style="text-align: center">Berat</th>
					<th style="text-align: center">Lokasi</th>
				</tr>
			</thead>
			<tbody>
				<?php
					include "koneksi.php";

					
					date_default_timezone_set('Asia/Makassar');
					$tanggal = date('Y-m-d');

					$sql = mysqli_query($konek, "select a.idhewan, b.jenishewan, a.jeniskelamin, a.usiahewan, a.berat, a.lokasi from absensi a, hewan b where a.nokartu=b.nokartu and a.tanggal='$tanggal'");

					$no = 0;
					while($data = mysqli_fetch_array($sql))
					{
						$no++;
				?>
				<tr>
					<td> <?php echo $no; ?> </td>
					<td> <?php echo $data['idhewan']; ?> </td>
					<td> <?php echo $data['jenishewan']; ?> </td>
					<td> <?php echo $data['jeniskelamin']; ?> </td>
					<td> <?php echo $data['usiahewan']; ?> </td>
					<td> <?php echo $data['berat']; ?> </td>
					<td> <?php echo $data['lokasi']; ?> </td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

	<?php include "footer.php"; ?>

</body>
</html>