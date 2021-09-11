<?php
// include database connection file
include_once("koneksi.php");

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $pengirim = $_POST['pengirim'];
    $perihal = $_POST['perihal'];
    $nomor_surat = $_POST['nomor_surat'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE suratmasuk SET pengirim='$pengirim',nomor_surat='$nomor_surat',perihal='$perihal' WHERE id=$id");

    // Redirect to homepage to display updated user in list
    header("Location: halaman_admin_suratmasuk.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM suratmasuk WHERE id=$id");

while ($user_data = mysqli_fetch_array($result)) {
    $pengirim = $user_data['pengirim'];
    $nomor_surat = $user_data['nomor_surat'];
    $perihal = $user_data['perihal'];
}
?>
<html>

<head>
    <style>
        * {
            box-sizing: border-box;
        }

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
            background-color: #f2f2f2;
            padding: 20px;
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

    <a href="halaman_admin_suratmasuk.php">Home</a>

    <div class="container">
        <form name="update_user" method="post" action="suratmasuk_edit.php">
            <div class="row">
                <div class="col-25">
                    <label for="pengirim">Pengirim</label>
                </div>
                <div class="col-75">
                    <input type="text" name="pengirim" value=<?php echo $pengirim; ?>>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="nomor_surat">Nomor Surat</label>
                </div>
                <div class="col-75">
                    <input type="text" name="nomor_surat" value=<?php echo $nomor_surat; ?>>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="perihal">Perihal</label>
                </div>
                <div class="col-75">
                    <input type="text" name="perihal" value=<?php echo $perihal; ?>>
                </div>
            </div>
            <div class="row">
                <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
                <input type="submit" name="update" value="Update">
            </div>
        </form>
    </div>

</body>

</html>