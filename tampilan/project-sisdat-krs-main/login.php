<style>
    * {
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
    
    }

    body {
        font-family: Roboto;
        min-height: 100vh;
        background: #E5E5E5;
        display: flex;
        overflow: hidden;
    }

    .container {
        margin: 150px 0px 150px 410px;
        width: 500px;
        max-width: 100%;
        border: 1px solid #757575;
        border-radius: 20px;
        background: #FFFFFF;
    }

    .container form {
        width: 100%;
        height: 100px;
        padding: 20px;
        border-radius: 4px;
    }

    .container form h1 {
        text-align: center;
        margin-bottom: 24px;
        margin-top: 20px;
        color: black;
        font-size: 25px;
    }

    .container form .form-control {
        width: 100%;
        height: 40px;
        background: rgba(196, 196, 196, 0.2);
        border: 1px solid #757575;
        border-radius: 40px;
        margin: 10px 0 18px 0;
        padding: 0 10px;
    }

    .btn {
        margin: 45px 230px;
        transform: translateX(-50%);
        font-size: 20px;
        color: white;
        width: 150px;
        height: 34px;
        background-color: #074EE8;;
        border-radius: 5px;
        border: none;
        outline: none;
        cursor: pointer;
        color: white;
        transition: .3s;
    }

    .btn:hover {
        opacity: .7;
    }
</style>
<?php
    $username = '';
    $password = '';
    if (isset($_POST['submit'])) {
        extract($_POST);

        $sql = "SELECT * FROM user WHERE username='{$username}' AND password=md5('{$password}')";

        $query = mysqli_query($koneksi, $sql);

        if (mysqli_num_rows($query) == 1) {
            $field = mysqli_fetch_array($query);
            $_SESSION['access'] = $field['status'];
            $_SESSION['username'] = $field['username'];
            $_SESSION['name'] = $field['nama'];
            echo "<script>$.Notify({
                caption: 'Login Success',
                content: 'Anda berhasil Login',
                type: 'success'
            });
            setTimeout(function(){ window.location.href='{$_url}'; }, 2000);
            </script>";
        } else {
            echo "<script>$.Notify({
                caption: 'Login Failed',
                content: 'Periksa Username dan Password anda!!',
                type: 'alert'
            });</script>";
        }
    }
    ?>
<div class="container">
        <form action="">
            <h1>Login</h1>
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" required>
            </div>
            <a href="admin_krs.html">
            <input type="submit" class="btn" value="Login">
            </a>
        </form>
</div>