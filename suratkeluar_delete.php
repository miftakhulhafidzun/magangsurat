<?php
// include database connection file
include_once("koneksi.php");

// Get id from URL to delete that user
$id = $_GET['id'];

$sql2 = "SELECT * FROM suratkeluar where id='$id'"; //query dua
$hpsgbr = mysqli_query($mysqli, $sql2); //jalankan query
$jalankan = mysqli_fetch_array($hpsgbr); //pecah dtanya

// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM suratkeluar WHERE id=$id");
unlink("pdfsuratkeluar/" . $jalankan['file_suratkeluar']);

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:admin/halaman_admin_suratkeluar.php");
