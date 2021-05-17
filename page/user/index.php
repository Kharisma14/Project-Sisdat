<?php
	include("headeruser1.php")
?>

<div class="isi2">
<h1>
Users
<span class="place-right">
	<a href="<?= $_url ?>user/synchronize" class="button">Sinkronisasi User</a>
	<a href="<?= $_url ?>user/add" class="button">Tambah User</a>
</span>
</h1>

<?php
	$sql = "SELECT * FROM user ORDER BY nama ASC";
	$query = mysqli_query($koneksi, $sql);
?>

<table class="table striped hovered border bordered">
	<thead>
		<tr>
			<th>Nama</th>
			<th>Username</th>
			<th>Level</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>

	<?php
		if (mysqli_num_rows($query) > 0):
			while($field = mysqli_fetch_array($query)):
	?>
		<tr>
			<td><?= $field['nama'] ?></td>
			<td><?= $field['username'] ?></td>
			<td><?= $field['status'] ?></td>
			<td>
				<div class="inline-block">
				    <a href="<?= $_url ?>user/edit/<?= $field['id'] ?>/<?= urlencode($field['username']) ?>"><span class="mif-pencil" style="margin-right: 20px"></span></a>
					<a href="<?= $_url ?>user/delete/<?= $field['id'] ?>/<?= urlencode($field['username']) ?>"><span class="mif-cross"></span></a>
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