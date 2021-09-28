<!DOCTYPE html>
<html>

<head>
    <title>Login Sistem</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            background-image: url("rs1.jpg");
            background-size: cover;
        }

        img {
            width: 25%;
        }
    </style>


</head>

<body>

    <h1>Halo, Selamat Datang</h1>
    <center>
        <p>Silahkan login sesuai akun masing masing</p>
    </center>

    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
            echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
        }
    }
    ?>

    <div class="kotak_login">
        <center>
            <img src="logorsudntb.png" alt="logo">
        </center>

        <form action="cek_login.php" method="post">
            <label>Username</label>
            <input type="text" name="username" class="form_login" placeholder="Username .." required="required">

            <label>Password</label>
            <input type="password" name="password" class="form_login" placeholder="Password .." required="required">

            <input type="submit" class="tombol_login" value="LOGIN">

            <br />
            <br />
            <center>
                <a class="link" href="#"></a>
            </center>
        </form>

    </div>


</body>

</html>