<?php
	include("headerkrs2.php")
?>

<div class="isi2">
<h1>
<a href="<?= $_url ?>krs/view/<?= $_id ?>" class="nav-button transform"><span></span></a>
Pilih Mata Kuliah
</h1>
<?php
$querya = mysqli_query($koneksi, "SELECT mahasiswa.* FROM mahasiswa WHERE npm='{$_id}'");
$field = mysqli_fetch_array($querya);
extract($field);
?>

<?php
	if (isset($_POST['submit'])) {
		extract($_POST);

		$sqlin = "INSERT INTO krs(npm, id_jd) VALUES('{$npm}','{$id_jd}')";
		$query = mysqli_query($koneksi, $sqlin);

		if ($query) {
			echo "<script>$.Notify({
			    caption: 'Success',
			    content: 'Mata kuliah Berhasil Dipilih',
	    		type: 'success'
			});</script>";
		} else {
			echo "<script>$.Notify({
			    caption: 'Failed',
			    content: 'Mata kuliah Gagal Dipilih',
			    type: 'alert'
			});</script>";
		}
	}

	$sql = "SELECT jadwal_dosen.*, mata_kuliah.nama as matkul_nama, dosen.nama as dosen_nama
			FROM jadwal_dosen
			LEFT JOIN mata_kuliah ON jadwal_dosen.kode=mata_kuliah.kode
			LEFT JOIN dosen ON jadwal_dosen.nip=dosen.nip
			WHERE mata_kuliah.semester=(SELECT semester FROM mahasiswa WHERE npm='{$npm}')
			AND jadwal_dosen.id_jd NOT IN (SELECT id_jd FROM krs WHERE npm='{$npm}')
			";

	$query= mysqli_query($koneksi, $sql);
?>

<form method="post">

<table class="table striped hovered border bordered">
	<thead>
		<tr>
			<th>Kode</th>
			<th>Mata Kuliah</th>
			<th>Dosen</th>
			<th>Ambil</th>
		</tr>
	</thead>
	<tbody>

	<?php
		if (mysqli_num_rows($query) > 0):
			while($field = mysqli_fetch_array($query)):
	?>
		<tr>
			<td><?= $field['kode'] ?></td>
			<td><?= $field['matkul_nama'] ?></td>
			<td><?= $field['dosen_nama'] ?></td>
			<td><input type="radio" name="id_jd" value="<?= $field['id_jd'] ?>"></td>
		</tr>
	<?php
			endwhile;
		else:
	?>
		<tr>
			<td colspan="5">
			Data tidak ditemukan
			</td>
		</tr>
	<?php
		endif;
	?>
		
	</tbody>
</table>

<button type="submit" name="submit" class="button primary">SUBMIT</button>

</form>

</div>