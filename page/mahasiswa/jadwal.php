<?php
	include("headermhs3.php")
?>

<div class="isi2">
<h1>
Jadwal Mata Kuliah
</h1>

<?php
	$sql = "SELECT jadwal_dosen.*, mata_kuliah.nama as matkul_nama, mata_kuliah.sks as matkul_sks
			FROM jadwal_dosen LEFT JOIN mata_kuliah
			ON mata_kuliah.kode=jadwal_dosen.kode";
	$query = mysqli_query($koneksi, $sql);
?>

<table class="table striped hovered border bordered">
	<thead>
		<tr>
			<th>Hari</th>
			<th>Jam</th>
			<th>Kode Matkul</th>
			<th>Nama Matkul</th>
			<th>SKS</th>
			<th>Ruang</th>
		</tr>
	</thead>
	<tbody>

	<?php
		if (mysqli_num_rows($query) > 0):
			while($field = mysqli_fetch_array($query)):
	?>
		<tr>
			<td><?= $field['hari'] ?></td>
			<td><?= $field['jam'] ?></td>
			<td><?= $field['kode'] ?></td>
			<td><?= $field['matkul_nama'] ?></td>
			<td><?= $field['matkul_sks'] ?></td>
			<td><?= $field['ruang'] ?></td>
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