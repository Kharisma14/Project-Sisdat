<?php
	include("headerdosen3.php")
?>

<?php

if (isset($_params[2]) && $_params[2] == 'yes') {
$query = mysqli_query($koneksi, "DELETE FROM jadwal_dosen WHERE id='{$_id}'");

	if ($query) {
		echo "<script>$.Notify({
		    caption: 'Success',
		    content: 'Data Dosen Berhasil Dihapus',
			type: 'success'
		});
		setTimeout(function(){ window.location.href='{$_url}dosen'; }, 2000);
		</script>";
	} else {
		echo "<script>$.Notify({
		    caption: 'Failed',
		    content: 'Data Dosen Gagal Dihapus',
		    type: 'alert'
		});</script>";
	}
}
?>
<div class="isi2">
<h1>Hapus Jadwal Dosen</h1>
<h3>Apakah anda yakin akan menghapus jadwal dosen dengan ID <?= $_id ?> yang bernama <?= urldecode($_params[1]) ?>?</h3>
<a href="<?= $_url ?>dosen/delete-jadwal/<?= $_id ?>/<?= $_params[1] ?>/yes" class="button primary">Yes</a> <a href="<?= $_url ?>dosen" class="button danger">No</a>
</div>