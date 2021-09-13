<?php
include_once("../koneksi.php");

$result1 = mysqli_query($mysqli, "SELECT count(*) as totalsuratmasuk from suratmasuk;");
$row1 = mysqli_fetch_array($result1);

$result2 = mysqli_query($mysqli, "SELECT count(*) as totalsuratkeluar from suratkeluar;");
$row2 = mysqli_fetch_array($result2);
?>


<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="../styleadmin.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    session_start();

    // cek apakah yang mengakses halaman ini sudah login
    if ($_SESSION['level'] == "") {
        header("location:index.php?pesan=gagal");
    }
    ?>
    <div class="sidebar">
        <div class="logo-details">
            <i class='bx bx-envelope'></i>
            <span class="logo_name">Arsip Surat</span>
        </div>
        <ul class="nav-links">
            <li>
                <!-- SET ACTIVE UNTUK SECTION YANG ACTIVE -->
                <a href="#" class="active">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="halaman_admin_suratmasuk.php" class="">
                    <i class='bx bx-archive-in'></i>
                    <span class="links_name">Surat Masuk</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-paper-plane'></i>
                    <span class="links_name">Surat Keluar</span>
                </a>
            </li>
            <li class="log_out">
                <a href="../logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="dashboard">Surat Masuk</span>
            </div>
            <!-- <div class="search-box">
                <input type="text" placeholder="Search...">
                <i class='bx bx-search'></i>
            </div> -->
            <div class="profile-details">
                <i class="bx bx-user"></i>
                <span class="admin_name"><?php echo $_SESSION['level']; ?></span>
            </div>
        </nav>

        <div class="home-content">
            <div class="overview-boxes">
                <div class="box" style="gap: 1em">
                    <h2>
                        <span class="iconify" data-icon="bx:bx-archive-in" data-width="50" data-height="50"></span>
                        <?php
                        echo "<p style='font-weight: normal; font-size: 50px;'>" . $row1['totalsuratmasuk'] . "</p>";
                        ?>
                    </h2>
                    <h1 style='font-weight: normal; font-size: 50px; color: #0a2558;'>Surat Masuk</h1>
                </div>
                <div class="box" style="gap: 1em">
                    <h2>
                        <span class="iconify" data-icon="bx:bx-paper-plane" data-width="50" data-height="50"></span>
                        <?php
                        echo "<p style='font-weight: normal; font-size: 50px;'>" . $row2['totalsuratkeluar'] . "</p>";
                        ?>
                    </h2>
                    <h1 style='font-weight: normal; font-size: 50px; color: #0a2558;'>Surat Keluar</h1>
                </div>
            </div>
        </div>
    </section>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
    </script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>

</body>

</html>