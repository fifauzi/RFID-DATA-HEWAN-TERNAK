<?php
	include "koneksi.php";
	//baca isi tabel tmprfid
	$sql = mysqli_query($konek, "select * from tmprfid");
	$data = mysqli_fetch_array($sql);
	//baca nokartu
	$idhewan = $data['idhewan'];
?>

<div class="form-group">
	<label>No.Kartu</label>
	<input type="text" name="idhewan" id="idhewan" placeholder="tempelkan kartu rfid Anda" class="form-control" style="width: 200px" value="<?php echo $idhewan; ?>">
</div>