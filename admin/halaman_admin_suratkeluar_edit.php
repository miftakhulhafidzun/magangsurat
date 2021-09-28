<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Arsip Surat Masuk Keluar</title>
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
        header("location:login/index.php?pesan=gagal");
    }
    ?>
    <div class="sidebar">
        <div class="logo-details">
            <i class='bx bx-envelope'></i>
            <span class="logo_name">Arsip Surat</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="halaman_admin.php" class="">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="halaman_admin_suratmasuk.php" class="active">
                    <i class='bx bx-archive-in'></i>
                    <span class="links_name">Surat Masuk</span>
                </a>
            </li>
            <li>
                <a href="halaman_admin_suratkeluar.php">>
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
                <span class="dashboard">Surat Keluar</span>
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
            <?php
            require '../suratkeluar_edit.php';
            ?>
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

</body>

</html>