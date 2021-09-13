<?php
// Create database connection using config file
include_once("koneksi.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM suratmasuk ORDER BY id DESC");
?>

<html>

<head>
    <!-- <link rel='stylesheet' type='text/css' media='screen' href='styletable.css'> -->
    <link rel='stylesheet' type='text/css' media='screen' href='assets/dataTables/datatables.min.css'>
    <style>
        @charset "UTF-8";
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

        body {
            font-family: "Open Sans", sans-serif;
            font-weight: 300;
            line-height: 1.42em;
            color: #a7a1ae;
            background-color: #1f2739;
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

        h1 {
            font-size: 3em;
            font-weight: 300;
            line-height: 1em;
            text-align: center;
            color: #005075;
        }

        h2 {
            font-size: 1em;
            font-weight: 300;
            text-align: center;
            display: block;
            line-height: 1em;
            padding-bottom: 2em;
            color: #fb667a;
        }

        h2 a {
            font-weight: 700;
            text-transform: uppercase;
            color: #fb667a;
            text-decoration: none;
        }

        .blue {
            color: #185875;
        }

        .yellow {
            color: #fff842;
        }

        .container th h1 {
            font-weight: normal;
            font-size: 1em;
            text-align: left;
            color: #ffffff;
            padding: 0;
        }

        .container td {
            font-weight: normal;
            font-size: 1em;
            -webkit-box-shadow: 0 2px 2px -2px #0e1119;
            -moz-box-shadow: 0 2px 2px -2px #0e1119;
            box-shadow: 0 2px 2px -2px #0e1119;
        }

        .container {
            text-align: left;
            overflow: hidden;
            width: 100% !important;
            margin: 0 auto;
            display: table;
            padding: 0;
        }

        /* Background-color of the odd rows */
        .container tr:nth-child(odd) {
            background-color: #323c50;
        }

        /* Background-color of the even rows */
        .container tr:nth-child(even) {
            background-color: #2c3446;
        }

        .container td,
        .container th {
            padding-bottom: 1%;
            padding-top: 1%;
            padding-left: 1%;
        }

        .container th {
            background-color: #1f2739;
        }

        .container td:first-child {
            color: #fb667a;
        }

        .container td a {
            text-decoration: none;
            color: rgb(255, 0, 191);
        }

        .container tr:hover {
            background-color: #464a52;
            -webkit-box-shadow: 0 6px 6px -6px #0e1119;
            -moz-box-shadow: 0 6px 6px -6px #0e1119;
            box-shadow: 0 6px 6px -6px #0e1119;
        }

        .container td:hover {
            background-color: #fff842;
            color: #403e10;
            font-weight: bold;

            box-shadow: #7f7c21 -1px 1px, #7f7c21 -2px 2px, #7f7c21 -3px 3px,
                #7f7c21 -4px 4px, #7f7c21 -5px 5px, #7f7c21 -6px 6px;
            transform: translate3d(6px, -6px, 0);

            transition-delay: 0s;
            transition-duration: 0.4s;
            transition-property: all;
            transition-timing-function: line;
        }

        @media (max-width: 800px) {

            .container td:nth-child(4),
            .container th:nth-child(4) {
                display: none;
            }
        }
    </style>
</head>

<body>
    <h1>Arsip Surat Masuk</h1>
    <br>
    <center>
        <div class="button"><a href="halaman_admin_suratmasuk_add.php">+ Tambahkan Surat Masuk</a></div>
    </center>
    <br>
    <table style="width: 95% !important;" class="container" id="datatable">
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
        <tbody>
            <?php
            $number = 1;
            while ($user_data = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td> $number </td>";
                echo "<td>" . $user_data['pengirim'] . "</td>";
                echo "<td>" . $user_data['nomor_surat'] . "</td>";
                echo "<td>" . $user_data['perihal'] . "</td>";
                echo "<td><a href='halaman_admin_suratmasuk_edit.php?id=$user_data[id]'><i class='bx bxs-pencil'></i></a> | <a href='../suratmasuk_delete.php?id=$user_data[id]'><i class='bx bxs-trash-alt'></i></a></td></tr>";
                ++$number;
            }
            ?>
        </tbody>
    </table>
    <script src="assets/dataTables/datatables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
</body>

</html>