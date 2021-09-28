<?php
// Create database connection using config file
include_once("koneksi.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM suratkeluar ORDER BY id DESC");
?>

<html>

<head>
    <style>
        .button {
            display: inline-block;
            padding: 5px 15px;
            font-size: 1vw;
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
    </style>
    <!-- <link rel='stylesheet' type='text/css' media='screen' href='styletable.css'> -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>

<body>
    <center>
        <div><a href="halaman_admin_suratkeluar_add.php" class="btn btn-primary">+ Tambahkan Surat keluar</a></div>
    </center>
    <table style="width: 97%;" class="container table-striped table-bordered table-hover" id="datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Surat</th>
                <th>Tanggal Keluar</th>
                <th>Perihal</th>
                <th>File</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $number = 1;
            while ($user_data = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td> $number </td>";
                echo "<td>" . $user_data['nomor_surat'] . "</td>";
                echo "<td>" . $user_data['tanggal_keluar'] . "</td>";
                echo "<td>" . $user_data['perihal'] . "</td>";
                echo "<td>" . $user_data['file_suratkeluar'] . "</td>";
                echo "<td><a href='../pdfsuratkeluar/$user_data[file_suratkeluar]' target='_blank'><i class='bx bxs-image'></i></a></td></tr>";
                ++$number;
            }
            ?>
        </tbody>
    </table>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
</body>

</html>