<?php
include("config/main.php");
include("config/routing.php");
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pengisian KRS</title>
    <link rel="icon" href="Logo_Unpad_Transparent.png">

    <link href="<?= $_url ?>css/metro.css" rel="stylesheet">
    <link href="<?= $_url ?>css/metro-icons.css" rel="stylesheet">
    <link href="<?= $_url ?>css/docs.css" rel="stylesheet">

    <script src="<?= $_url ?>js/jquery-2.1.3.min.js"></script>
    <script src="<?= $_url ?>js/metro.js"></script>

    
    <style type="text/css">
    body {
        font-family: "Roboto";
    }

    html,
    body {
      height: 100%;
      width: 100%;
    }

    #wrap {
      min-height: 100%;
      height: auto;
      margin: 0 auto -60px;
      padding: 60px 0 60px;
    }

    #footer {
      height: 60px;
      background-color: #f5f5f5;
    }
    .logo{
        padding:1%;
        width: 5.5%;
        float:left;
    }

    .judul h1{
        font-size: 25px;
        color: black;
        font-family: 'Times New Roman';
    }

    .judul h2{
        font-size: 20px;
        color: black;
        font-family: 'Times New Roman';
    }

    .menu{
        color: black;
    }

    .clearfix{
        clear: both;
        float: none;
    }

    .atas{
        width: 98%;
        margin: 0 ;
    }
    .isi{
        width: 98%;
        padding: 2%;
    }
    </style>

</head>
<body>
<header class="app-bar fixed-top" data-role="appbar" style="background-color: #e5e5e5">
    <div class="atas">
        <div class ="logo">
            <img src="img/Logo_Unpad_Transparent.png" alt="logo" class="img">
        </div>
        <a href="<?= $_url ?>" class="app-bar-element branding judul">
        <h1>Sistem Pengisian KRS</h1>
        <h2>Universitas Padjadjaran</h2>
        </a></br>
        <?php if ($_access != ''): ?>
        <ul class="app-bar-menu place-right fg-black" data-flexdirection="reverse">
        <?php if ($_access == 'admin'): ?>
            <li><a href="<?= $_url ?>krs">KRS</a></li>
            <li><a href="<?= $_url ?>dosen">Dosen</a></li>
            <li><a href="<?= $_url ?>mahasiswa">Mahasiswa</a></li>
            <li><a href="<?= $_url ?>matakuliah">Mata Kuliah</a></li>
            <li>
                <a href="#" class="dropdown-toggle"><span class="mif-user icon"></span></a>
                <ul class="d-menu place-right" data-role="dropdown" data-no-close="true">
                    <li><a href="<?= $_url ?>user">User</a></li>
                    <li><a href="<?= $_url ?>user/change-password">Change Password</a></li>
                    <li class="divider"></li>
                    <li><a href="<?= $_url ?>sign/out">Sign Out</a></li>
                </ul>
            </li>
        <?php elseif ($_access == 'mahasiswa'): ?>
            <li><a href="<?= $_url ?>krs/view/<?= $_id ?>">KRS</a></li>
            <li><a href="<?= $_url ?>mahasiswa/jadwal/">Jadwal</a></li>
            <li>
                <a href="#" class="dropdown-toggle"><span class="mif-user icon"></span></a>
                <ul class="d-menu place-right" data-role="dropdown" data-no-close="true">
                    <li><a href="<?= $_url ?>mahasiswa/edit">Edit Profile</a></li>
                    <li><a href="<?= $_url ?>user/change-password">Change Password</a></li>
                    <li class="divider"></li>
                    <li><a href="<?= $_url ?>sign/out">Sign Out</a></li>
                </ul>
            </li>
        <?php endif; ?>
        </ul>

        <span class="app-bar-pull"></span>
        <?php endif; ?>

    </div>
    </header>

    <div id="wrap">
    <div class="isi page-content">

        <?php

        echo $_content;

        ?>

    </div>
    </div>

    <footer id="footer" style="background-color: #EFEAE3">
        <div class="align-center padding20 text-small">
            Copyright 2021 Kelompok 1 Kelas A
        </div>
    </div>
    </footer>

</body>
</html>