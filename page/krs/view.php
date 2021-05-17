<?php
	include("headerkrs2.php")
?>

<div class="isi2">
<?php
	if ($_access == 'mahasiswa' && $_id != $_username) {
		header("location:{$_url}krs/view/{$_username}");
	}
?>
<style type="text/css">
	.input-control {
		border: 1px solid #d9d9d9;
		padding: 10px;
	}
</style>

<h1>
<?php if (in_array($_access, array('admin'))): ?>
<a href="<?= $_url ?><?= in_array($_access, array('admin')) ? 'krs' : '' ?>" class="nav-button transform"><span></span></a>
<?php endif; ?>
KRS <?= $_name ?>
</h1>

<?php
$sqla = "SELECT krs.*, mahasiswa.nama as nama, mahasiswa.thn_akademik as thn_admik, mahasiswa.semester as smt
		FROM krs
		LEFT JOIN mahasiswa
		ON mahasiswa.npm = krs.npm";
$querya = mysqli_query($koneksi, $sqla);
$field = mysqli_fetch_array($querya);
extract($field);
?>

<div class="grid">

<div class="row cells2">
	<div class="cell">
		<label>NPM</label>
		<div class="input-control text full-size">
			<?= $field['npm'] ?>
		</div>
	</div>
	
	<div class="cell">
		<label>Nama</label>
		<div class="input-control text full-size">
			<?= $field['nama'] ?>
		</div>
	</div>
</div>

<div class="row cells2">
	<div class="cell">
		<label>Tahun Akademik</label>
		<div class="input-control text full-size">
			<?= $field['thn_admik'] ?>
		</div>
	</div>

	<div class="cell">
		<label>Semester</label>
		<div class="input-control text full-size">
			<?= $field['smt'] ?>
		</div>
	</div>
</div>

</div>

<a href="<?= $_url ?>krs/add/<?= $_id ?>" class="button primary">Pilih Matkul</a>
<?php if (in_array($_access, array('admin'))): ?>
<a href="<?= $_url ?>krs/approve/<?= $_id ?>" class="button success">Approve</a>
<?php endif; ?>

<?php
	$sql = "SELECT krs.*, mata_kuliah.nama as matkul_nama, dosen.nama as dosen_nama, mata_kuliah.kode as matkul_kode
		FROM krs
		LEFT JOIN jadwal_dosen ON krs.id_jd = jadwal_dosen.id_jd
		LEFT JOIN mata_kuliah ON jadwal_dosen.kode=mata_kuliah.kode
		LEFT JOIN dosen ON jadwal_dosen.nip=dosen.nip
		WHERE krs.npm='{$npm}' ORDER BY matkul_kode ASC";

	$query = mysqli_query($koneksi, $sql);
?>

<table class="table striped hovered border bordered">
	<thead>
		<tr>
			<th>Kode</th>
			<th>Mata Kuliah</th>
			<th>Dosen</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>

	<?php
		if (mysqli_num_rows($query) > 0):
			while($field = mysqli_fetch_array($query)):
	?>
		<tr>
			<td><?= $field['matkul_kode'] ?></td>
			<td><?= $field['matkul_nama'] ?></td>
			<td><?= $field['dosen_nama'] ?></td>
			<td>
				<?php if (!$field['accept'] OR in_array($_access, array('admin'))): ?>
					<a href="<?= $_url ?>krs/delete/<?= $npm ?>/<?= $field['id_krs'] ?>/<?= urlencode($field['matkul_nama']) ?>"><span class="mif-cross"></span></a>
				<?php else: ?>
					<span class="mif-checkmark"></span>
				<?php endif; ?>
			</td>
		</tr>
	<?php
			endwhile;
		else:
	?>
		<tr>
			<td colspan="4">
			Data tidak ditemukan
			</td>
		</tr>
	<?php
		endif;
	?>
		
	</tbody>
</table>
</div>