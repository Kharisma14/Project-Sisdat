    <style>
        .login-form {
            width: 550px;
            height: 350px;
            top: 50%;
            left: 50%;
            margin-left: -200px;
            margin-top:100px;
            
            background: #FFFFFF;
            border: 1px solid #757575;
            box-sizing: border-box;
            border-radius: 20px;
        }

        .login-form .form-control {
        width: 100%;
        height: 40px;
        background: rgba(196, 196, 196, 0.2);
        border: 1px solid #757575;
        border-radius: 40px;
        margin: 10px 0 18px 0;
        padding: 0 10px;
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
<div class="login-form padding10 block-shadow">
    <form method="post">
        <h1 class="text-bold align-center">Login</h1>
        <br />
        <br />
        <div class="input-control text full-size" data-role="input">
            <label for="user_login">Username :</label>
            <input type="text" name="username" id="user_login" value="<?= $username ?>">
            <button class="button helper-button clear"><span class="mif-cross"></span></button>
        </div>
        <br />
        <br />
        <div class="input-control password full-size" data-role="input">
            <label for="user_password">Password:</label>
            <input type="password" name="password" id="user_password" value="<?= $password ?>">
            <button class="button helper-button reveal"><span class="mif-looks"></span></button>
        </div>
        <br />
        <br />
        <div class="form-actions">
            <button type="submit" name="submit" class="button primary">Login</button>
        </div>
    </form>
</div>