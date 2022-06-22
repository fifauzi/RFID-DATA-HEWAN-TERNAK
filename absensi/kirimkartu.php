<?php
	include "koneksi.php";

	//baca nomor kartu dari NodeMCU
	$idhewan = $_GET['idhewan'];
	//kosongkan tabel tmprfid
	mysqli_query($konek, "delete from tmprfid");

	//simpan nomor kartu yang baru ke tabel tmprfid
	$simpan = mysqli_query($konek, "insert into tmprfid(idhewan)values('$idhewan')");
	if($simpan)
		echo "Berhasil";
	else
		echo "Gagal";
?>