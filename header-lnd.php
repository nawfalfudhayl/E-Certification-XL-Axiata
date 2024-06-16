<?php
require '../config.php';

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
        <title>LnD Team Page</title>
        <link href="../assets/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <!-- batas -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.2.5/css/fixedColumns.dataTables.min.css">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </head>

    <body class="sb-nav-fixed" style="font-family: Axiata;">
        <nav class="sb-topnav navbar navbar-expand"
            style="box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.75); background-color: white;">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="../index-lnd.php"
                style="display: inline-block; margin-left: 49px; color: rgb(37, 150, 190)"><img
                    src='../assets/images/XL-Axiata 1.png'></a>
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
                        <li><a class="dropdown-item" href="../logout.php" style="color: #2e2d2d"><i
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
                            <a class="nav-link" href="../index-lnd.php" style="color: #2e2d2d">
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
                                    <a class="nav-link" href="../lihat-lnd/lihat-sertif-lnd.php" style="color: #2e2d2d"><i
                                            class="bi bi-journals"
                                            style="margin-right: 10px; font-size: 16px; color: #2e2d2d"></i>Certificate</a>
                                    <a class="nav-link" href="../lihat-lnd/lihat-ktgr-lnd.php" style="color: #2e2d2d"><i
                                            class="bi bi-list-check"
                                            style="margin-right: 10px; font-size: 16px; color: #2e2d2d"></i>Category</a>
                                    <a class="nav-link" href="../lihat-lnd/lihat-approval-lnd.php" style="color: #2e2d2d"><i
                                            class="fa fa-check-circle"
                                            style="margin-right: 10px; font-size: 16px; color: #2e2d2d"></i>Certificates Approval</a>
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
                                    <a class="nav-link" href="../lihat-lnd/lihat-user-lnd.php" style="color: #2e2d2d"><i
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

            <script type="text/javascript">
                document.getElementById("space").style.letterSpacing = "2px";
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                crossorigin="anonymous">
                </script>
            <script src="../assets/js/scripts.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
            <script src="../assets/js/datatables-simple-demo.js"></script>
        <?php endif ?>