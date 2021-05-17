<?php

$query = mysqli_query($koneksi, "UPDATE krs SET accept=1 WHERE npm='{$_id}'");

header("location:{$_url}krs/view/{$_id}");