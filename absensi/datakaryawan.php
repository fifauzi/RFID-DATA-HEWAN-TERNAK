<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<title>Data Hewan</title>
</head>
<body>

	<?php include "menu.php"; ?>

	<!--isi -->
	<div class="container-fluid">
		<h3>Data Hewan</h3>
		<table class="table table-bordered">
			<thead>
				<tr style="background-color: black; color: white;">
					<th style="width: 0px; text-align: ">No.</th>
					<th style="width: 15px; text-align: center">Id.Hewan</th>
					<th style="width: 15px; text-align: center">Jenis Hewan</th>
					<th style="width: 15px; text-align: center">Jenis Kelamin</th>
					<th style="width: 15px; text-align: center">Usia Hewan</th>
					<th style="width: 15px; text-align: center">Berat</th>
					<th style="width: 15px; text-align: center">Lokasi</th>
					<th style="width: 15px; text-align: center">Aksi</th>
				</tr>
			</thead>
			<tbody>

				<?php
					//koneksi ke database
					include "koneksi.php";

					//baca data karyawan
					$sql = mysqli_query($konek, "select * from karyawan");
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
					<td> <?php echo $data['usiahewan']; ?></td>
					<td> <?php echo $data['berat']; ?></td>
					<td> <?php echo $data['lokasi']; ?></td>

					<td>
						<a href="edit.php?id=<?php echo $data['id']; ?>"> Edit</a> | <a href="hapus.php?id=<?php echo $data['id']; ?>"> Hapus</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

		<!-- tombol tambah data karyawan -->
		<a href="tambah.php"> <button class="btn btn-primary">Tambah Data Hewan</button> </a>
	</div>

	<?php include "footer.php"; ?>

</body>
</html>