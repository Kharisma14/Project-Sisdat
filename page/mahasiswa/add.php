<h1>
<a href="<?= $_url ?>mahasiswa" class="nav-button transform"><span></span></a>
Tambah Mahasiswa
</h1>

<?php
if (isset($_POST['submit'])) {

	extract($_POST);

	$sql = "INSERT INTO mahasiswa values('{$npm}', '{$nama}', '{$fakultas}', '{$prodi}', '{$jenis_kelamin}', '{$kelas}', 
		'{$alamat}', '{$thn_akademik}', '{$semester}')";
	$query = mysqli_query($koneksi, $sql);

	if ($query) {
		echo "<script>$.Notify({
		    caption: 'Success',
		    content: 'Data Mahasiswa Berhasil Ditambah',
    		type: 'success'
		});</script>";
	} else {
		echo "<script>$.Notify({
		    caption: 'Failed',
		    content: 'Data Mahasiswa Gagal Ditambah',
		    type: 'alert'
		});</script>";
	}
}
?>

<form method="post">

<div class="grid">

<div class="row cells2">
	<div class="cell">
		<label>NPM</label>
		<div class="input-control text full-size">
			<input type="text" name="npm">
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
		<label>Fakultas</label>
		<div class="input-control text full-size">
			<input type="text" name="fakultas">
		</div>
	</div>

	<div class="cell">
		<label>Prodi</label>
		<div class="input-control text full-size">
			<input type="text" name="prodi">
		</div>
	</div>
</div>

<div class="row cells2">
	<div class="cell">
		<label>Kelas</label>
		<div class="input-control text full-size">
			<input type="text" name="kelas">
		</div>
	</div>

	<div class="cell">
		<label>Alamat</label>
		<div class="input-control text full-size">
			<input type="text" name="alamat">
		</div>
	</div>
</div>

<div class="row cells2">
	<div class="cell">
		<label>Tahun Akademik</label>
		<div class="input-control text full-size">
			<input type="text" name="thn_akademik">
		</div>
	</div>

	<div class="cell">
		<label>Semester</label>
		<div class="input-control text full-size">
			<input type="text" name="semester">
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
</div>

<div class="row cells2">
	<div class="cell">
		<button type="submit" name="submit" class="button primary">SUBMIT</button>
	</div>
</div>

</div>

</form>