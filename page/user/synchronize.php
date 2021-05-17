<?php

$query_user = mysqli_query($koneksi, "SELECT * FROM user");

$users = array();

while ($field = mysqli_fetch_array($query_user)) {
	$users[] = "'{$field['username']}'";
}

$users = implode(',', $users);

// sinkronisasi mahasiswa
$query_mahasiswa = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE npm NOT IN ({$users})");
$value_mahasiswa = array();

while ($field = mysqli_fetch_array($query_mahasiswa)) {
	$value_mahasiswa[] = "('{$field['nama']}','{$field['npm']}',md5('{$field['npm']}'),'mahasiswa')";
}

$value_mahasiswa = implode(',', $value_mahasiswa);

if ($value_mahasiswa != '')
	mysqli_query($koneksi, "INSERT INTO user(nama,username,password,status) VALUES{$value_mahasiswa}");

header("location:{$_url}user");