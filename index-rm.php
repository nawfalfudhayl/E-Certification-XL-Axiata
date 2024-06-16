<?php
require 'config.php';

session_start();

if (isset($_SESSION['username'])):
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>RM Team Page</title>
        <link href="assets/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </head>

    <body class="sb-nav-fixed" onload="zoom_auto()" style="font-family: Axiata;">
        <nav class="sb-topnav navbar navbar-expand"
            style="box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.75); background-color: white;">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index-rm.php"
                style="display: inline-block; margin-left: 49px; color: rgb(37, 150, 190)"><img
                    src='assets/images/XL-Axiata 1.png'></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" style="margin-left: -59px"
                id="sidebarToggle" href="#!"><i class="fas fa-bars" style="color: #2e2d2d"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-6 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false" style="color: #7c7c7c"><i class="fas fa-user fa-fw"
                            style="color: #2e2d2d"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" style="font-size: 14px">
                        <li><a class="dropdown-item" href="logout.php" style="color: #2e2d2d"><i
                                    class="bi bi-box-arrow-left" style="color: red"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav"
                style="height: 100%; position: fixed; z-index: 2; top: 0; left: 0; display: inline-block; box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="background-color: white;">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading" style="color: #2e2d2d">Dashboard</div>
                            <a class="nav-link" href="index-rm.php" style="color: #2e2d2d">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt" style="color: #2e2d2d"></i>
                                </div>
                                <b>Dashboard</b>
                            </a>
                            <div class="sb-sidenav-menu-heading" style="color: #2e2d2d">Data & User</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                                style="color: #2e2d2d">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-database" style="color: #2e2d2d"></i>
                                </div>
                                <b>Data</b>
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"
                                        style="color: #2e2d2d"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="lihat-rm/lihat-sertif-rm.php" style="color: #2e2d2d"><i
                                            class="bi bi-journals"
                                            style="margin-right: 10px; font-size: 16px; color: #2e2d2d"></i>Certificate</a>
                                    <a class="nav-link" href="lihat-rm/lihat-ktgr-rm.php" style="color: #2e2d2d"><i
                                            class="bi bi-list-check"
                                            style="margin-right: 10px; font-size: 16px; color: #2e2d2d"></i>Category</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                                aria-expanded="false" aria-controls="collapsePages" style="color: #2e2d2d">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user" style="color: #2e2d2d"></i></div>
                                <b>User</b>
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"
                                        style="color: #2e2d2d"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                                data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="lihat-rm/lihat-user-rm.php" style="color: #2e2d2d"><i
                                            class="bi bi-people-fill"
                                            style="margin-right: 10px; font-size: 16px; color: #2e2d2d"></i>
                                        User
                                    </a>
                                </nav>
                            </div>
                            <center style="margin-top: 9px">
                                <hr style="color: #2e2d2d; margin-left: 18px; margin-right: 18px">
                            </center>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer" style="background-color: #164396;">
                        <div class="small" style="color: white"><b>Login as</b> :</div>
                        <?php
                        $user_data = $_SESSION['username'];
                        $result_user = mysqli_query($conn, "SELECT * FROM user WHERE username='$user_data'");
                        $row_user = mysqli_fetch_array($result_user);
                        echo "<div style='font-size: 14px; color: white'>" . $_SESSION['username'] . "<br>" . $row_user['Akses'] . "<br><a style='color: white; font-size: 12px;'>ID : <b id='space'>" . $row_user['IdUser'] . "</b></a></div>";
                        ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content" style="background-color: #fafafa">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4" style="color: rgb(37, 150, 190)"><b>E-Certification<b
                                    style="float: right; color: rgb(238, 62, 128)">Hi, <?php echo $row_user['Nama']; ?></b></b></h1>
                        <ol class="breadcrumb mb-4" style="font-size: 14px">
                            <li class="breadcrumb-item active"><i class="fa fa-home"></i></li>
                        </ol>
                        <center style="margin-bottom: 2%; background-color: #5a5a5a; border-radius: 50px;">
                            <hr size="3px" color="black" style="background-color: black; border-radius: 50px;" />
                        </center>
                        <div class="card mb-4">
                            <div class="card-header" style="background-color: #164396; color: white; font-size: 15px">
                                <i class="fas fa-chart-bar me-1"></i>
                                <b>Amount of <b style="color: palegreen">User</b>
                            </div>
                            <div class="card-body"><canvas id="grafik1" width="100%" height="30"></canvas></div>
                            <div class="card-footer small text-muted" style="background-color: #ececec">Last Update :
                                <b>Today</b>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header" style="background-color: #164396; color: white; font-size: 15px">
                                <i class="fas fa-chart-bar me-1"></i>
                                Amount of Certificates based on <b style="color: palegreen">Category</b>
                            </div>
                            <div class="card-body"><canvas id="grafik2" width="100%" height="30"></canvas></div>
                            <div class="card-footer small text-muted" style="background-color: #ececec">Last Update
                                : <b>Today</b></div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 mt-auto"
                    style="background-color: #164396; bottom: 0; box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.75);">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div style="color: white; font-weight: lighter">&copy; 2023 XL Axiata. All rights
                                reserved</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script type="text/javascript">
            document.getElementById("space").style.letterSpacing = "2px";

            function zoom_auto() {
                document.body.style.zoom = "100%"
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
        </script>
        <script src="assets/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <?php
        require 'assets/demo/grafik1.php';
        require 'assets/demo/grafik2.php';
        ?>
    </body>

    </html>

<?php endif ?>