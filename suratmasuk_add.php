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
        <form action="halaman_admin_suratmasuk_add.php" method="post" name="form1">
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
        $nomor_surat = $_POST['nomor_surat'];
        $perihal = $_POST['perihal'];

        // include database connection file
        include_once("koneksi.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO suratmasuk(pengirim,nomor_surat,perihal) VALUES('$pengirim','$nomor_surat','$perihal')");

        // Show message when user added
        echo "<br>";
        echo "<p align=center>Data Berhasil Ditambahkan. <a href='halaman_admin_suratmasuk.php'>Lihat Semua Data</a></p>";
    }
    ?>
</body>

</html>