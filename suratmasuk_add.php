<html>

<head>
    <title>Arsip Surat</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- Plugin jQuery dan CSS: -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" type="text/css" />
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example-optionClass').multiselect({
                includeSelectAllOption: true, // add select all option as usual
                optionClass: function(element) {
                    var value = $(element).val();

                    if (value % 2 == 0) {
                        return 'even';
                    } else {
                        return 'odd';
                    }
                }
            });
        });
    </script>
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

        * {
            box-sizing: border-box;
            font-family: "Open Sans", sans-serif;
        }

        #example-optionClass-container .multiselect-container li.odd {
            background: #eeeeee;
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
            color: black;
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

        .home-section p a {
            text-decoration: none;
            background-color: blue;
            color: white;
            border-radius: 5px;
            padding: 2px 6px;
        }

        .home-section p a:hover {
            font-weight: bold;
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
    <h1>Tambahkan Surat Masuk</h1>
    <br>
    <center>
        <div class="button"><i class="bx bx-home"></i> <a href="halaman_admin_suratmasuk.php">Home</a></div>
    </center>
    <br>

    <div class="container">
        <form action="halaman_admin_suratmasuk_add.php" method="post" name="form1" enctype="multipart/form-data">
            <div class="row">
                <div class="col-25">
                    <label for="pengirim">Pengirim</label>
                </div>
                <div class="col-75">
                    <input type="text" name="pengirim">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="pengirim">Tanggal Masuk</label>
                </div>
                <div class="col-75">
                    <input type="text" name="tanggal_masuk" class="form-control" id="date" value="<?php echo date("d-m-Y"); ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="nomor_surat">Nomor Surat</label>
                </div>
                <div class="col-75">
                    <input type="text" name="nomor_surat">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="perihal">Perihal</label>
                </div>
                <div class="col-75">
                    <input type="text" name="perihal">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="unit">Unit</label>
                </div>
                <div class="col-75">
                    <div id="example-optionClass-container">
                        <select name="unit[]" id="example-optionClass" multiple="multiple">
                            <option value="1">Direktur</option>
                            <option value="2">Umum</option>
                            <option value="3">Pelayanan</option>
                            <option value="4">SDM</option>
                            <option value="5">Diklat</option>
                            <option value="6">Keuangan</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="file_suratmasuk"></label>
                </div>
                <div class="col-75">
                    <td><input name="file_suratmasuk" accept="application/pdf" type="file" id="file_suratmasuk" class="form-control-file" autocomplete="off" /></td>
                </div>
            </div>
            <br>
            <div class="row">
                <input type="submit" name="Submit" value="Add">
            </div>
        </form>
    </div>

    <?php
    // Check If form submitted, insert form data into users table.
    if (isset($_POST['Submit'])) {
        $pengirim = $_POST['pengirim'];
        $tanggal_masuk = $_POST['tanggal_masuk'];
        $nomor_surat = $_POST['nomor_surat'];
        $perihal = $_POST['perihal'];
        $unit = implode(',', $_POST['unit']);

        // include database connection file
        include_once("koneksi.php");

        $tgl_masuk = date('Y-m-d H:i:s', strtotime($tanggal_masuk));

        date_default_timezone_set('Asia/Jakarta');
        $tanggal_entry  = date("YmdHis");

        $nama_file_lengkap = $_FILES['file_suratmasuk']['name'];
        $nama_file         = substr($nama_file_lengkap, 0, strripos($nama_file_lengkap, '.'));
        $ext_file          = substr($nama_file_lengkap, strripos($nama_file_lengkap, '.'));
        $tipe_file         = $_FILES['file_suratmasuk']['type'];
        $ukuran_file       = $_FILES['file_suratmasuk']['size'];
        $tmp_file          = $_FILES['file_suratmasuk']['tmp_name'];

        if (!($pengirim == '') and !($nomor_surat == '') and !($perihal == '') and ($tipe_file == "application/pdf") and ($ukuran_file <= 10340000)) {
            $nama_baru = 'suratmasuk-' . $tanggal_entry . $ext_file;
            $path = "../pdfsuratmasuk/" . $nama_baru;
            move_uploaded_file($tmp_file, $path);

            $sql = "INSERT INTO suratmasuk (pengirim, tanggal_masuk, nomor_surat, perihal,unit, file_suratmasuk)
                    values ('$pengirim','$tgl_masuk','$nomor_surat','$perihal','$unit','$nama_baru')";
            $execute = mysqli_query($mysqli, $sql);

            echo "<center>User added successfully. <a href='halaman_admin_suratmasuk.php' class= 'btn btn-primary'>Lihat data</a></center>";
        }
    }
    ?>
    <script type="text/javascript">
        $('#example-multiple-selected').multiselect();
    </script>
</body>

</html>