<?php
	include("headerdosen3.php")
?>

<?php
	if ($_access == 'dosen' && $_id != $_username) {
		header("location:{$_url}dosen/edit/{$_username}");
	}

$querya = mysqli_query($koneksi, "SELECT * FROM jadwal_dosen WHERE id_jd='{$_id}'");
$field = mysqli_fetch_array($querya);
extract($field);
?>

<div class="isi2">
<h1>
<a href="<?= $_url ?>dosen<?= $_access == 'dosen' ? '/view/' . $_id . '/' . urlencode($nama) : '' ?>" class="nav-button transform"><span></span></a>
Edit Jadwal
</h1>

<?php

if (isset($_POST['submit'])) {

	extract($_POST);

	$sql = "UPDATE jadwal_dosen SET nip='{$nip}', kode='{$kode}', hari='{$hari}', jam='{$jam}', ruang='{$ruang}' WHERE id='{$_id}'";
	$query = mysqli_query($koneksi, $sql);

	if ($query) {
		echo "<script>$.Notify({
		    caption: 'Success',
		    content: 'Data Dosen Berhasil Ubah',
    		type: 'success'
		});</script>";
	} else {
		echo "<script>$.Notify({
		    caption: 'Failed',
		    content: 'Data Dosen Gagal Ubah',
		    type: 'alert'
		});</script>";
	}
}
?>

<form method="post">

<div class="grid">

<div class="row cells2">
	<div class="cell">
		<label>NIP Dosen</label>
		<div class="input-control text full-size">
			<input type="text" name="nip" value="<?= $nip ?>">
		</div>
	</div>
	
	<div class="cell">
		<label>Kode Mata Kuliah</label>
		<div class="input-control text full-size">
			<input type="text" name="kode" value="<?= $kode ?>">
		</div>
	</div>
</div>

<div class="row cells2">
	<div class="cell">
		<label>Hari</label>
		<div class="input-control text full-size">
			<input type="text" name="hari" value="<?= $hari ?>">
		</div>
		</label>
		</div>
	</div>

	<div class="cell">
		<label>Jam</label>
		<div class="input-control text full-size">
			<input type="text" name="jam" value="<?= $jam ?>">
		</div>
	</div>
</div>

<div class="row cells2">
	<div class="cell">
		<label>Ruang</label>
		<div class="input-control text full-size">
			<input type="text" name="ruang" value="<?= $ruang ?>">
		</div>
	</div>
</div>

<div class="row cells2">
	<div class="cell">
		<button type="submit" name="submit" class="button primary">SUBMIT</button>
	</div>
</div>

</div>

</form>
</div>