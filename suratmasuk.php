<?php
// Create database connection using config file
include_once("koneksi.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM suratmasuk ORDER BY id DESC");
?>

<html>

<head>
    <link rel='stylesheet' type='text/css' media='screen' href='styletable.css'>
</head>

<body>
    <h1>Arsip Surat Masuk</h1>
    <br>
    <center>
        <div class="button"><a href="halaman_admin_suratmasuk_add.php">+ Tambahkan Surat Masuk</a></div>
    </center>
    <br>
    <table class="container">
        <thead>
            <tr>
                <th>
                    <h1>Pengirim</h1>
                </th>
                <th>
                    <h1>Nomor Surat</h1>
                </th>
                <th>
                    <h1>Perihal</h1>
                </th>
                <th>
                    <h1>Update</h1>
                </th>
            </tr>
        </thead>
        <?php
        while ($user_data = mysqli_fetch_array($result)) {
            echo "<tbody>";
            echo "<tr>";
            echo "<td>" . $user_data['pengirim'] . "</td>";
            echo "<td>" . $user_data['nomor_surat'] . "</td>";
            echo "<td>" . $user_data['perihal'] . "</td>";
            echo "<td><a href='halaman_admin_suratmasuk_edit.php?id=$user_data[id]'>Edit</a> | <a href='suratmasuk_delete.php?id=$user_data[id]'>Delete</a></td></tr><tbody/>";
        }
        ?>
    </table>
</body>

</html>