<h1>
Mahasiswa
<span class="place-right">
	<a href="<?= $_url ?>mahasiswa/add" class="button">Tambah Mahasiswa</a>
</span>
</h1>

<?php
	$sql = "SELECT mahasiswa.* FROM mahasiswa";
	$query = mysqli_query($koneksi, $sql);
?>

<table class="table striped hovered border bordered">
	<thead>
		<tr>
			<th>NPM</th>
			<th>Nama</th>
			<th>Fakultas</th>
			<th>Jurusan</th>
			<th>Jenis Kelamin</th>
			<th>Kelas</th>
			<th>Alamat</th>
			<th>Tahun Akademik</th>
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
			<td><?= $field['npm'] ?></td>
			<td><?= $field['nama'] ?></td>
			<td><?= $field['fakultas'] ?></td>
			<td><?= $field['prodi'] ?></td>
			<td><?= $field['jenis_kelamin'] ?></td>
			<td><?= $field['kelas'] ?></td>
			<td><?= $field['alamat'] ?></td>
			<td><?= $field['thn_akademik'] ?></td>
			<td><?= $field['semester'] ?></td>
			<td>
				<div class="inline-block">
					<a href="<?= $_url ?>mahasiswa/edit/<?= $field['npm'] ?>/<?= urlencode($field['nama']) ?>"><span class="mif-pencil style=" style="margin-bottom: 10px"></span></a>
					<a href="<?= $_url ?>mahasiswa/delete/<?= $field['npm'] ?>/<?= urlencode($field['nama']) ?>"><span class="mif-cross"></span></a>
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