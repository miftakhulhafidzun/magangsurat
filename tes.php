<?php
// Create database connection using config file
include_once("koneksi.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM suratmasuk ORDER BY id DESC");
?>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Arsip Surat Kota Samarinda </title>

    <!-- Bootstrap -->
    <link href="../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/icon.ico">
    <!-- Custom Theme Style -->
    <link href="../assets/build/css/custom.min.css" rel="stylesheet">
</head>

<body>
    <h1>Arsip Surat Masuk</h1>
    <br>
    <center>
        <div class="button"><a href="halaman_admin_suratmasuk_add.php">+ Tambahkan Surat Masuk</a></div>
    </center>
    <br>
    <table style="width: 95% !important;" class="container">
        <thead>
            <tr>
                <th>
                    <h1>No</h1>
                </th>
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
        $number = 1;
        while ($user_data = mysqli_fetch_array($result)) {
            echo "<tbody>";
            echo "<tr>";
            echo "<td> $number </td>";
            echo "<td>" . $user_data['pengirim'] . "</td>";
            echo "<td>" . $user_data['nomor_surat'] . "</td>";
            echo "<td>" . $user_data['perihal'] . "</td>";
            echo "<td><a href='halaman_admin_suratmasuk_edit.php?id=$user_data[id]'><i class='bx bxs-pencil'></i></a> | <a href='../suratmasuk_delete.php?id=$user_data[id]'><i class='bx bxs-trash-alt'></i></a></td></tr><tbody/>";
            ++$number;
        }
        ?>
    </table>
</body>

</html>