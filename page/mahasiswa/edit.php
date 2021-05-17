<style>
	.border{
 	border: 1px solid #bbbbbb;
  	font-size: 20px;
	padding: 9px;
	}
</style>

<?php
	include("headermhs4.php")
?>

<?php
	if ($_access == 'mahasiswa' && $_id != $_username) {
		header("location:{$_url}mahasiswa/edit/{$_username}");
	}

$querya = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE npm='{$_id}'");
$field = mysqli_fetch_array($querya);
extract($field);
?>

<div class="isi2">
<h1>
<?php if (in_array($_access, array('admin'))): ?>
<a href="<?= $_url ?>mahasiswa<?= $_access == 'mahasiswa' ? '/view/' . $_id . '/' . urlencode($nama) : '' ?>" class="nav-button transform"><span></span></a>
<?php endif; ?>
Edit Mahasiswa<br><?= $nama ?>
</h1>

<?php

if (isset($_POST['submit'])) {

	extract($_POST);

	$sql = "UPDATE mahasiswa SET npm='{$npm}', nama='{$nama}', fakultas='{$fakultas}', prodi='{$prodi}', jenis_kelamin='{$jenis_kelamin}', kelas='{$kelas}', 
		alamat='{$alamat}', thn_akademik='{$thn_akademik}', semester='{$semester}' WHERE npm='{$_id}'";
	$query = mysqli_query($koneksi, $sql);

	if ($query) {
		echo "<script>$.Notify({
		    caption: 'Success',
		    content: 'Data Mahasiswa Berhasil Ubah',
    		type: 'success'
		});</script>";
	} else {
		echo "<script>$.Notify({
		    caption: 'Failed',
		    content: 'Data Mahasiswa Gagal Ubah',
		    type: 'alert'
		});</script>";
	}
}
?>

<form method="post">

<div class="grid">

<div class="row cells2">
	<?php if ($_access == 'admin'): ?>
	<div class="cell">
		<label>NPM</label>
		<div class="input-control text full-size">
			<input type="text" name="npm" value="<?= $npm ?>">
		</div>
	</div>
	<?php elseif ($_access == 'mahasiswa'): ?>
		<div class="cell">
		<label>NPM</label>
		<div class="border input-control text full-size">
		<?= $npm ?>
		</div>
	</div>
	<?php endif; ?>

	
	<div class="cell">
		<label>Nama</label>
		<div class="input-control text full-size">
			<input type="text" name="nama" value="<?= $nama ?>">
		</div>
	</div>
</div>

<div class="row cells2">
	<?php if ($_access == 'admin'): ?>
	<div class="cell">
		<label>Fakultas</label>
		<div class="input-control text full-size">
			<input type="text" name="fakultas" value="<?= $fakultas ?>">
		</div>
	</div>

	<div class="cell">
		<label>Program Studi</label>
		<div class="input-control text full-size">
			<input type="text" name="prodi" value="<?= $prodi ?>">
		</div>
	</div>

	<?php elseif ($_access == 'mahasiswa'): ?>
	<div class="cell">
		<label>Fakultas</label>
		<div class="border input-control text full-size">
		<?= $fakultas ?>
		</div>
	</div>

	<div class="cell">
		<label>Program Studi</label>
		<div class="border input-control text full-size">
		<?= $prodi ?>
		</div>
	</div>

	<?php endif; ?>
	
</div>

<div class="row cells2">
	<div class="cell">
		<label>Kelas</label>
		<div class="input-control text full-size">
			<input type="text" name="kelas" value="<?= $kelas ?>">
		</div>
	</div>

	<div class="cell">
		<label>Alamat</label>
		<div class="input-control text full-size">
			<input type="text" name="alamat" value="<?= $alamat ?>">
		</div>
	</div>
</div>

<div class="row cells2">
	<div class="cell">
		<label>Tahun Akademik</label>
		<div class="input-control text full-size">
			<input type="text" name="thn_akademik" value="<?= $thn_akademik ?>">
		</div>
	</div>

	<div class="cell">
		<label>Semester</label>
		<div class="input-control text full-size">
			<input type="text" name="semester" value="<?= $semester ?>">
		</div>
	</div>
</div>

<div class="row cells2">
	<div class="cell">
		<label>Jenis Kelamin</label>
		<div class="full-size">
		<label class="input-control radio">
			<input type="radio" name="jenis_kelamin" value="Laki-laki" <?= $jenis_kelamin=='Laki-laki'? 'selected' : '' ?>>
		    <span class="check"></span>
		    <span class="caption">Laki-laki</span>
		</label>
		<label class="input-control radio">
			<input type="radio" name="jenis_kelamin" value="Perempuan" <?= $jenis_kelamin=='Perempuan'? 'selected' : '' ?>>
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
</div>