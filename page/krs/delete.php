<?php
	include("headerkrs2.php")
?>
<?php

if (isset($_params[3]) && $_params[3] == 'yes') {
	$query = mysqli_query($koneksi, "DELETE FROM krs WHERE id_krs='{$_params[1]}' AND npm='{$_id}'");

	if ($query) {
		echo "<script>$.Notify({
		    caption: 'Success',
		    content: 'Data Mahasiswa Berhasil Dihapus',
			type: 'success'
		});
		setTimeout(function(){ window.location.href='{$_url}krs/view/{$_id}'; }, 1500);
		</script>";
	} else {
		echo "<script>$.Notify({
		    caption: 'Failed',
		    content: 'Data Mahasiswa Gagal Dihapus',
		    type: 'alert'
		});</script>";
	}
}
?>
<div class="isi2">
<h1>Hapus Mata Kuliah</h1>
<h3>Apakah anda yakin akan menghapus mata kuliah <?= urldecode($_params[2]) ?>?</h3>
<a href="<?= $_url ?>krs/delete/<?= $_id ?>/<?= $_params[1] ?>/<?= $_params[2] ?>/yes" class="button primary">Yes</a>
<a href="<?= $_url ?>krs/view/<?= $_id ?>" class="button danger">No</a>
</div>