<?php

session_start();

$_access = isset($_SESSION['access']) ? $_SESSION['access'] : '';
$_username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$_name = isset($_SESSION['name']) ? $_SESSION['name'] : '';

$koneksi = mysqli_connect('localhost','root','','sistem_krs');

$_tahun_ajaran = 2021;

$_rules = array(
	'dashboard/index' => array('admin','mahasiswa'),

	'mahasiswa/index' => array('admin'),
	'mahasiswa/add' => array('admin'),
	'mahasiswa/edit' => array('admin','mahasiswa'),
	'mahasiswa/delete' => array('admin'),

	'krs/index' => array('admin'),
	'krs/view' => array('mahasiswa','admin'),
	'krs/add' => array('mahasiswa','admin'),
	'krs/approve' => array('admin'),
	'krs/delete' => array('mahasiswa','admin'),

	'matakuliah/index' => array('admin'),
	'matakuliah/edit' => array('admin'),
	'matakuliah/add' => array('admin'),
	'matakuliah/delete' => array('admin'),

	'dosen/index' => array('admin'),
	'dosen/edit' => array('admin'),
	'dosen/edit-jadwal' => array('admin'),
	'dosen/add' => array('admin'),
	'dosen/delete' => array('admin'),
	'dosen/add-jadwal' => array('admin'),
	'dosen/delete-jadwal' => array('admin'),

	'user/index' => array('admin'),
	'user/add' => array('admin'),
	'user/edit' => array('admin'),
	'user/delete' => array('admin'),
	'user/synchronize' => array('admin'),
	'user/change-password' => array('admin', 'mahasiswa'),

	'sign/in' => array(''),
	'sign/out' => array('admin', 'mahasiswa'),
);

$_url = str_replace('/index.php', '/', $_SERVER['PHP_SELF']);
$_route = explode($_url, explode("?", $_SERVER['REQUEST_URI'])[0], 2)[1];
