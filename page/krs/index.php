<?php
	include("headerkrs1.php")
?>

<div class="isi2">
<h1>
KRS Mahasiswa
</h1>

<?php
	$sql = "SELECT mahasiswa.* FROM mahasiswa
			WHERE mahasiswa.npm IN (SELECT npm FROM krs)"; 
	$query = mysqli_query($koneksi, $sql);
?>

<table class="table striped hovered border bordered">
	<thead>
		<tr>
			<th>NPM</th>
			<th>Nama</th>
			<th>Fakultas</th>
			<th>Prodi</th>
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
			<td>
				<div class="inline-block">
					<a href="<?= $_url ?>krs/view/<?= $field['npm'] ?>/<?= urlencode($field['nama']) ?>"><span class="mif-pencil" style="margin-right: 30px"></span></a>
					<a href="<?= $_url ?>krs/approve/<?= $field['npm'] ?>/<?= urlencode($field['nama']) ?>"><span class="mif-checkmark"></span></a>
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