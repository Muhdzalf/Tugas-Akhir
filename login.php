<?php
//print_r($_POST);
include 'config.php';

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username ='$username' AND password = '$password'";
    $hasil = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($hasil) > 0) {
        session_start();
        $row = mysqli_fetch_array($hasil);
        $_SESSION['nama'] = $row['nama'];
        header('location:homepage.php');
    } else {
        header('location:ErrorMssg.html?pesan=gagal');
    }
}
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="login.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <img src="img/tut wuri handayani.png" id="icon" alt="Selamat Datang di Sistem Pendataan Siswa" />
            <p>Selamat Datang</p>
        </div>

        <!-- Login Form -->
        <form action="login.php" method="POST">
            <input type="text" id="login" class="fadeIn second" name="username" placeholder="login">
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
            <input type="submit" class="fadeIn fourth" value="Log In">
        </form>
    </div>


</div>