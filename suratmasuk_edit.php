<?php
include 'koneksi.php';
if (isset($_GET['id'])) {
    if ($_GET['id'] != "") {

        $id = $_GET['id'];

        $query = mysqli_query($mysqli, "SELECT * FROM suratmasuk WHERE id='$id'");
        $row = mysqli_fetch_array($query);
    } else {
        header("location:halaman_admin_suratmasuk.php");
    }
}

// Mengecek apakah ID ada datanya atau tidak
if (isset($_POST['id'])) {
    if ($_POST['id'] != "") {
        // Mengambil data dari form lalu ditampung didalam variabel
        $id = $_POST['id'];
        $pengirim = $_POST['pengirim'];
        $tanggal_masuk = $_POST['tanggal_masuk'];
        $nomor_surat = $_POST['nomor_surat'];
        $perihal = $_POST['perihal'];

        $file_nama = $_FILES['file_suratmasuk']['name'];
        $file_size = $_FILES['file_suratmasuk']['size'];
    } else {
        header("location:halaman_admin_suratmasuk.php");
    }

    // Mengecek apakah file lebih besar 2 MB atau tidak
    if ($file_size > 2097152) {
        // Jika File lebih dari 2 MB maka akan gagal mengupload File
        header("location:halaman_admin_suratmasuk.php?pesan=size");
    } else {

        // Mengecek apakah Ada file yang diupload atau tidak
        if ($file_nama != "") {

            // Ekstensi yang diperbolehkan untuk diupload boleh diubah sesuai keinginan
            $ekstensi_izin = array('pdf');
            // Memisahkan nama file dengan Ekstensinya
            $pisahkan_ekstensi = explode('.', $file_nama);
            $ekstensi = strtolower(end($pisahkan_ekstensi));
            // Nama file yang berada di dalam direktori temporer server
            $file_tmp = $_FILES['file_suratmasuk']['tmp_name'];
            // Membuat angka/huruf acak berdasarkan waktu diupload
            $tanggal = md5(date('Y-m-d h:i:s'));
            // Menyatukan angka/huruf acak dengan nama file aslinya
            $file_nama_new = $tanggal . '-' . $file_nama;

            // Mengecek apakah Ekstensi file sesuai dengan Ekstensi file yg diuplaod
            if (in_array($ekstensi, $ekstensi_izin) === true) {

                // Mengambil data siswa_foto didalam table siswa
                $get_file = "SELECT file_suratmasuk FROM suratmasuk WHERE id='$id'";
                $data_file = mysqli_query($koneksi, $get_file);
                // Mengubah data yang diambil menjadi Array
                $file_lama = mysqli_fetch_array($data_file);

                // Menghapus Foto lama didalam folder FOTO
                unlink("pdfsuratmasuk/" . $file_lama['file_suratmasuk']);

                // Memindahkan File kedalam Folder "FOTO"
                move_uploaded_file($file_tmp, 'foto/' . $file_nama_new);

                // Query untuk memasukan data kedalam table SISWA
                $query = mysqli_query($mysqli, "UPDATE suratmasuk SET perihal='$perihal', tanggal_surat='$tanggal_surat', nomor_surat='$nomor_surat', perihal='$perihal', file_suratmasuk='$file_nama_new' WHERE id_siswa='$id'");

                // Mengecek apakah data gagal diinput atau tidak
                if ($query) {
                    header("location:halaman_admin_suratmasuk.php?pesan=berhasil");
                } else {
                    header("location:halaman_admin_suratmasuk.php?pesan=gagal");
                }
            } else {
                // Jika ekstensinya tidak sesuai dengan apa yg kita tetapkan maka error
                header("location:halaman_admin_suratmasuk.php?pesan=ekstensi");
            }
        } else {

            // Apabila tidak ada file yang diupload maka akan menjalankan code dibawah ini
            $query = mysqli_query($mysqli, "UPDATE suratmasuk SET perihal='$perihal', tanggal_surat='$tanggal_surat', nomor_surat='$nomor_surat', perihal='$perihal', file_suratmasuk='$file_nama_new' WHERE id_siswa='$id'");

            // Mengecek apakah data gagal diinput atau tidak
            if ($query) {
                header("location:halaman_admin_suratmasuk.php?pesan=berhasil");
            } else {
                header("location:halaman_admin_suratmasuk.php?pesan=gagal");
            }
        }
    }
} else {
    // Apabila ID tidak ditemukan maka akan dikembalikan ke halaman index
    header("location:halaman_admin_suratmasuk.php");
}
?>

<html>

<head>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

        * {
            box-sizing: border-box;
            font-family: "Open Sans", sans-serif;
        }

        h1 {
            font-size: 3em;
            font-weight: 300;
            line-height: 1em;
            text-align: center;
            color: #005075;
        }

        .button {
            display: inline-block;
            padding: 5px 15px;
            font-size: 1.5vw;
            cursor: pointer;
            text-align: center;
            outline: none;
            color: white;
            background-color: #4caf50;
            border: none;
            border-radius: 15px;
            box-shadow: 0 3px #999;
        }

        .button a {
            text-decoration: none;
            color: white;
        }

        .button:hover {
            background-color: #3e8e41;
        }

        .button:active {
            background-color: #3e8e41;
            box-shadow: 0 3px #666;
            transform: translateY(2px);
        }

        input[type=text],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .container {
            border-radius: 5px;
            background-color: #1f2739;
            color: white;
            padding: 20px;
            width: 70%;
            margin-left: auto;
            margin-right: auto;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        .col-25 {
            float: left;
            width: 25%;
            margin-top: 6px;
        }

        .col-75 {
            float: left;
            width: 75%;
            margin-top: 6px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {

            .col-25,
            .col-75,
            input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
        }
    </style>
</head>

<body>
    <h1>Edit Surat Masuk</h1>
    <br>
    <center>
        <div class="button"><i class="bx bx-home"></i> <a href="halaman_admin_suratmasuk.php">Home</a></div>
    </center>
    <br>

    <div class="container">
        <form name="update_user" method="post" action="halaman_admin_suratmasuk_edit.php" enctype="multipart/form-data">
            <div class="row">
                <div class="col-25">
                    <label for="pengirim">Pengirim</label>
                </div>
                <div class="col-75">
                    <input type="text" name="pengirim" value=<?php echo $row['pengirim']; ?>>
                    <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="tanggal_masuk">Tanggal Masuk</label>
                </div>
                <div class="col-75">
                    <input type="text" name="tanggal_masuk" value=<?php echo $row['tanggal_masuk']; ?>>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="nomor_surat">Nomor Surat</label>
                </div>
                <div class="col-75">
                    <input type="text" name="nomor_surat" value=<?php echo $row['nomor_surat']; ?>>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="perihal">Perihal</label>
                </div>
                <div class="col-75">
                    <input type="text" name="perihal" value=<?php echo $row['perihal']; ?>>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="perihal"></label>
                </div>
                <div class="col-75">
                    <input type="file" name="file_suratmasuk">
                </div>
            </div>
            <br>
            <div class="row">
                <input type="submit" name="update" value="Update">
            </div>
        </form>
    </div>

</body>

</html>