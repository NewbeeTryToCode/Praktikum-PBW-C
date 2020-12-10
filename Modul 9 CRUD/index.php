<?php
//koneksi database
include 'koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISKOM |Sistem Informasi Ilmu Komputer</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="container full-height-grow">
    <header class="main-header">
        <a href="home.html" class="brand-logo"><img src="assets/img/logo.png" alt=""></a>
        <nav class="main-nav">
            <ul>
                <li>
                    <a href="home.html">Home</a>
                </li>
                <li> <a href="about.html">About</a></li>
                <li> <a href="index.php">Login</a></li>
                <li> <a href="signup.html">Sign up</a></li>
            </ul>
        </nav>
    </header>
    <section class="main main-section">
        <div class="img-wrapper">
        </div>
        <div class="main-form">
            <div class="main-header">
                <h1 class="tittle">Login</h1>
            </div>

            <form action="" method="POST">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username">
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="input-group">
                    <button class="btn btnlogin" name="login">Login</button>
                </div>
                <div class="form-footer">
                    <p>Not registered? <a class="link" href="../index.html">Create an account</a></p>
                </div>
            </form>
        </div>
    </section>
    <?php
    if (isset($_POST['login'])) {
        session_start();
        // mengambil data dari form
        $username = $_POST["username"];
        $password = $_POST["password"];
        $result = mysqli_query($conn, "SELECT * FROM users WHERE username_user = '$username' AND password_user = '$password'");
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            // user found
            $logged_in_user = mysqli_fetch_assoc($results);
            $_SESSION['user'] = $logged_in_user;
            $_SESSION['username'] = $username;
            $_SESSION['status'] = 'login';
            header('location: app/dashboard.php');
        } else {
            echo '<script language="javascript">';
            echo 'alert("Username / Password salah")';
            echo '</script>';
        }
    }

    ?>
</body>

</html>