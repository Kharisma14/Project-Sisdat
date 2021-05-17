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
        width: 100%;
    }
    </style>

</head>
<body>
    <div id="wrap">
    <div class="isi page-content">

        <?php

        echo $_content;

        ?>

    </div>
    </div>

</body>
</html>