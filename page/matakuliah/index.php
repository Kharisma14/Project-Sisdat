<?php
	include("headermatkul1.php")
?>

<div class="isi2">
<h1>
Mata Kuliah
<span class="place-right">
	<a href="<?= $_url ?>matakuliah/add" class="button">Tambah Matkul</a>
</span>
</h1>

<?php
	$sql = "SELECT * FROM mata_kuliah";
	$query = mysqli_query($koneksi, $sql);
?>

<table class="table striped hovered border bordered">
	<thead>
		<tr>
			<th>Kode</th>
			<th>Nama</th>
			<th>SKS</th>
			<th>Semester</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>

	<?php
		if (mysqli_num_rows($query) > 0):
			while($field = mysqli_fetch_array($query)):
	?>
		<tr>
			<td><?= $field['kode'] ?></td>
			<td><?= $field['nama'] ?></td>
			<td><?= $field['sks'] ?></td>
			<td><?= $field['semester'] ?></td>
			<td>
				<div class="inline-block">
					<a href="<?= $_url ?>matakuliah/edit/<?= $field['kode'] ?>/<?= urlencode($field['nama']) ?>"><span class="mif-pencil" style="margin-right: 20px"></span></a>
					<a href="<?= $_url ?>matakuliah/delete/<?= $field['kode'] ?>/<?= urlencode($field['nama']) ?>"><span class="mif-cross"></span></a>
				</div>
			</td>
		</tr>
	<?php
			endwhile;
		else:
	?>
		<tr>
			<td colspan="6">
			Data tidak ditemukan
			</td>
		</tr>
	<?php
		endif;
	?>
		
	</tbody>
</table>
</div>