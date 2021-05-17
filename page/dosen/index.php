<?php
	include("headerdosen1.php")
?>

<div class="isi2">
<h1>
Dosen
<span class="place-right">
	<a href="<?= $_url ?>dosen/add" class="button">Tambah Dosen</a>
</span>
</h1>

<?php
	$sql = "SELECT * FROM dosen";
	$query = mysqli_query($koneksi, $sql);
?>

<table class="table striped hovered border bordered">
	<thead>
		<tr>
			<th>NIP</th>
			<th>Nama</th>
			<th>Jenis Kelamin</th>
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
			<td><?= $field['nip'] ?></td>
			<td><?= $field['nama'] ?></td>
			<td><?= $field['jenis_kelamin'] ?></td>
			<td><?= $field['dosen_fak'] ?></td>
			<td><?= $field['dosen_jur'] ?></td>
			<td>
				<div class="inline-block">
					<a href="<?= $_url ?>dosen/edit/<?= $field['nip'] ?>/<?= urlencode($field['nama']) ?>"><span class="mif-pencil" style="margin-right: 20px"></span></a>
					<a href="<?= $_url ?>dosen/delete/<?= $field['nip'] ?>/<?= urlencode($field['nama']) ?>"><span class="mif-cross"></span></a>
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

<h1>
Jadwal Dosen
<span class="place-right">
	<a href="<?= $_url ?>dosen/add-jadwal" class="button">Tambah Jadwal</a>
</span>
</h1>

<?php
	$sql = "SELECT jadwal_dosen.*, dosen.nama as ndos, mata_kuliah.nama as nkul FROM jadwal_dosen, dosen, mata_kuliah
	WHERE jadwal_dosen.nip = dosen.nip AND jadwal_dosen.kode = mata_kuliah.kode";
	$query = mysqli_query($koneksi, $sql);
?>

<table class="table striped hovered border bordered">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nama Dosen</th>
			<th>Mata Kuliah</th>
			<th>Hari</th>
			<th>Jam</th>
			<th>Ruang</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>

	<?php
		if (mysqli_num_rows($query) > 0):
			while($field = mysqli_fetch_array($query)):
	?>
		<tr>
			<td><?= $field['id_jd'] ?></td>
			<td><?= $field['ndos'] ?></td>
			<td><?= $field['nkul'] ?></td>
			<td><?= $field['hari'] ?></td>
			<td><?= $field['jam'] ?></td>
			<td><?= $field['ruang'] ?></td>
			<td>
				<div class="inline-block">
					<a href="<?= $_url ?>dosen/edit-jadwal/<?= $field['id_jd'] ?>/<?= urlencode($field['ndos']) ?>"><span class="mif-pencil" style="margin-right: 20px"></span></a>
					<a href="<?= $_url ?>dosen/delete-jadwal/<?= $field['id_jd'] ?>/<?= urlencode($field['ndos']) ?>"><span class="mif-cross"></span></a>
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