<?php
	include("headerdosen2.php")
?>

<div class="isi2">
<h1>
<a href="<?= $_url ?>dosen" class="nav-button transform"><span></span></a>
Tambah Dosen
</h1>

<?php
if (isset($_POST['submit'])) {

	extract($_POST);

	$sql = "INSERT INTO dosen values('{$nip}', '{$nama}', '{$jenis_kelamin}', '{$dosen_fak}', '{$dosen_jur}')";
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
		<label>NIP</label>
		<div class="input-control text full-size">
			<input type="text" name="nip">
		</div>
	</div>
	
	<div class="cell">
		<label>Nama</label>
		<div class="input-control text full-size">
			<input type="text" name="nama">
		</div>
	</div>
</div>

<div class="row cells2">
	<div class="cell">
		<label>Jenis Kelamin</label>
		<div class="full-size">
		<label class="input-control radio">
			<input type="radio" name="jenis_kelamin" value="Laki-laki">
		    <span class="check"></span>
		    <span class="caption">Laki-laki</span>
		</label>
		<label class="input-control radio">
			<input type="radio" name="jenis_kelamin" value="Perempuan">
		    <span class="check"></span>
		    <span class="caption">Perempuan</span>
		</label>
		</div>
	</div>

	<div class="cell">
		<label>Fakultas</label>
		<div class="input-control text full-size">
			<input type="text" name="dosen_fak">
		</div>
	</div>
</div>

<div class="row cells2">
	<div class="cell">
		<label>Jurusan</label>
		<div class="input-control text full-size">
			<input type="text" name="dosen_jur">
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