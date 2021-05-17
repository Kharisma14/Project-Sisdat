<?php
	include("headerdosen2.php")
?>

<div class="isi2">
<h1>
<a href="<?= $_url ?>dosen" class="nav-button transform"><span></span></a>
Tambah Jadwal
</h1>

<?php
if (isset($_POST['submit'])) {

	extract($_POST);

	$sql = "INSERT INTO jadwal_dosen values('{}', '{$nip}', '{$kode}', '{$hari}', '{$jam}', '{$ruang}')";
	$query = mysqli_query($koneksi, $sql);

	if ($query) {
		echo "<script>$.Notify({
		    caption: 'Success',
		    content: 'Data Dosen Berhasil Ditambah',
    		type: 'success'
		});</script>";
	} else {
		echo "<script>$.Notify({
		    caption: 'Failed',
		    content: 'Data Dosen Gagal Ditambah',
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
			<input type="text" name="nip">
		</div>
	</div>
	
	<div class="cell">
		<label>Kode Mata Kuliah</label>
		<div class="input-control text full-size">
			<input type="text" name="kode">
		</div>
	</div>
</div>

<div class="row cells2">
	<div class="cell">
		<label>Hari</label>
		<div class="input-control text full-size">
			<input type="text" name="hari">
		</div>
	</div>

	<div class="cell">
		<label>Jam</label>
		<div class="input-control text full-size">
			<input type="text" name="jam">
		</div>
	</div>
</div>

<div class="row cells2">
	<div class="cell">
		<label>Ruang</label>
		<div class="input-control text full-size">
			<input type="text" name="ruang">
		</div>
	</div>
</div>

<div class="row cells2">
	<div class="cell">
		<button type="submit" name="submit" class="button primary">SUBMIT</button>
	</div>
</div>

</div>
</div>
</form>