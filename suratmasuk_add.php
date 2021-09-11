<html>

<head>
    <title>Tambahkan Surat Masuk</title>
</head>

<body>
    <a href="halaman_admin_suratmasuk.php">Go to Home</a>
    <br /><br />

    <form action="halaman_admin_suratmasuk_add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>Penirim Surat</td>
                <td><input type="text" name="pengirim"></td>
            </tr>
            <tr>
                <td>Nomor Surat</td>
                <td><input type="text" name="nomor_surat"></td>
            </tr>
            <tr>
                <td>Perihal</td>
                <td><input type="text" name="perihal"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php

    // Check If form submitted, insert form data into users table.
    if (isset($_POST['Submit'])) {
        $pengirim = $_POST['pengirim'];
        $nomor_surat = $_POST['nomor_surat'];
        $perihal = $_POST['perihal'];

        // include database connection file
        include_once("koneksi.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO suratmasuk(pengirim,nomor_surat,perihal) VALUES('$pengirim','$nomor_surat','$perihal')");

        // Show message when user added
        echo "Data Berhasil Ditambahkan. <a href='halaman_admin_suratmasuk.php'>Lihat Semua Data</a>";
    }
    ?>
</body>

</html>