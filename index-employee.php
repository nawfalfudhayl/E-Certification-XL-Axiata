<?php
error_reporting(0);
include("config.php");

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
        <title>Employee Page</title>
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
            <a class="navbar-brand ps-3" href="index-employee.php"
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
                            <div class="sb-sidenav-menu-heading" style="color: #2e2d2d">Home</div>
                            <a class="nav-link" href="index-employee.php" style="color: #2e2d2d">
                                <div class="sb-nav-link-icon"><i class="fas fa-home" style="color: #2e2d2d"></i>
                                </div>
                                <b>Home</b>
                            </a>
                            <div class="sb-sidenav-menu-heading" style="color: #2e2d2d; margin-bottom: 13px">Search</div>
                            <form class="example" action="index-employee.php" style="margin-left: 15px; max-width:300px">
                                <div class="sb-sidenav-menu-subheading mb-2" style="color: #2e2d2d; font-size: 14px;"><i
                                        class="fa fa-search"></i> <b>Certificate Name</b></div>
                                <input type="text" placeholder="..." name="NamaSertif" style="height: 25px; width: 180px">
                                <div class="sb-sidenav-menu-subheading mt-4 mb-2" style="color: #2e2d2d; font-size: 14px;">
                                    <i class="fa fa-search"></i> <b>Issued By</b>
                                </div>
                                <input type="text" placeholder="..." name="IssuedBy" style="height: 25px; width: 180px">
                                <div class="sb-sidenav-menu-subheading mt-4 mb-2" style="color: #2e2d2d; font-size: 14px;">
                                    <i class="fa fa-search"></i> <b>Category</b>
                                </div>
                                <input type="text" placeholder="..." name="Kategori" style="height: 25px; width: 180px">
                                <button type="submit" class="btn mt-4"
                                    style="background-color: rgb(37, 150, 190); margin-bottom: 20px; float: right; margin-right: 100px">
                                    <i class="fas fa-search" style="color: white"></i>
                                </button>
                            </form>
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
                        <center
                            style="margin-top: 9px; margin-bottom: 25px; background-color: #5a5a5a; border-radius: 50px;">
                            <hr size="3px" color="black" style="background-color: black; border-radius: 50px;">
                        </center>
                        <div class="card mb-4">
                            <div class="card-header" style="text-align: center; background-color: #164396">
                                <i class="bi bi-journals"
                                    style="margin-right: 2px; font-size: 16px; color: white; font-weight: bolder;"></i>
                                <b style="color: white">E-Certification</b>
                            </div>
                            <div class="card-body tabel-mahasiswa cell-border">
                                <a type="submit" class="btn btn-success" href="employee/tamb-sertif-employee.php"
                                    title='Tambah Dokumen Baru'><b>+
                                        Upload</b></a>
                                <!-- <a type="submit" class="btn btn-primary" href="employee/tamb-req-employee.php"
                                    title='Tambah Dokumen Baru'><b>Request</b></a> -->
                                <div class="panel-group" id="post">
                                    <div class="card-body">
                                        <?php
                                        $query = "SELECT * FROM `sertif` WHERE 1=1";
                                        $judul = $_GET['NamaSertif'];
                                        if ($judul) {
                                            $query .= " AND NamaSertif like '%" . $judul . "%'";
                                        } else {
                                            $query .= ' AND 1=1';
                                        }
                                        $kategori = $_GET['Kategori'];
                                        if ($kategori) {
                                            $query .= " AND Kategori like '%" . $kategori . "%'";
                                        } else {
                                            $query .= ' AND 1=1';
                                        }
                                        $penerbit = $_GET['IssuedBy'];
                                        if ($penerbit) {
                                            $query .= " AND IssuedBy like '%" . $penerbit . "%'";
                                        } else {
                                            $query .= ' AND 1=1';
                                        }
                                        $result = $conn->query($query);
                                        $kolom = 3;
                                        $i = 1;
                                        $query = mysqli_query($conn, $query);
                                        while ($conn = mysqli_fetch_array($result)) {
                                            ?>
                                            <div class="card mb-4">
                                                <div class="card">
                                                    <div class="card-header" style="background-color: #ececec; font-size: 15px"
                                                        id="headingOne">
                                                        <b class="mb-0">
                                                            <b data-toggle="collapse" data-target="#<?php echo $conn["ID"]; ?>"
                                                                aria-expanded="true" aria-controls="<?php echo $conn["ID"]; ?>">
                                                                <?php echo $conn["NamaSertif"]; ?>
                                                            </b>
                                                        </b>
                                                    </div>
                                                    <div id="<?php echo $conn["ID"]; ?>" class="collapse show"
                                                        aria-labelledby="headingOne" data-parent="#accordion">
                                                        <div class="card-body">
                                                            <div class="row mb-4">
                                                                <?php echo '<div class="col-lg-6"><img class="img-thumbnail" src="assets/imageinput/' . $conn['Filee'] . '" width="100%" height="70%" ></a><br><p style="font-size: 13px">' . '</div>'; ?>
                                                                <div class="col-lg-6">
                                                                    <div class="card-body mb-4">
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <table class="mt-4" border="0px"
                                                                                    style='margin-right: 2px; font-size: 20px;'>
                                                                                    <thead
                                                                                        style="color: black; text-align: center;">
                                                                                        <tr>
                                                                                            <th colspan="2"
                                                                                                style='margin-right: 4px; width: 500px; font-size: 20px; text-align: center;'>
                                                                                                Details
                                                                                                <br><br>
                                                                                            </th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody class="table-unbordered"
                                                                                        style='border: 0px solid #AEAEAE; font-size: 17px; word-wrap: break-word;'>
                                                                                        <tr>
                                                                                            <td>Certificate Name
                                                                                            </td>
                                                                                            <td>
                                                                                                :
                                                                                                <?php echo $conn['NamaSertif'] ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                Issued By
                                                                                            </td>
                                                                                            <td>
                                                                                                :
                                                                                                <?php echo $conn['IssuedBy'] ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Issued Date
                                                                                            </td>
                                                                                            <td>
                                                                                                :
                                                                                                <?php echo $conn['TglTerbit'] ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Expired Date
                                                                                            </td>
                                                                                            <td>
                                                                                                :
                                                                                                <?php echo $conn['TglExp'] ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                Category</td>
                                                                                            <td>
                                                                                                :
                                                                                                <?php echo $conn['Kategori'] ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                Uploaded By</td>
                                                                                            <td>
                                                                                                :
                                                                                                <?php echo $conn['CreatedBy'] ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                Description</td>
                                                                                            <td>
                                                                                                :
                                                                                                <?php echo $conn['Deskripsi'] ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" style="text-align: center;">
                                                                            <div class="col">
                                                                                <form>
                                                                                    <?php
                                                                                    echo '<a class="btn btn-primary mt-4" value="' . $conn['ID'] . '" href="employee/edit-sertif-employee.php?ID=' . $conn['ID'] . '" style="width: 100px">Edit</a>'
                                                                                        ?>
                                                                                    <?php
                                                                                    echo '<a class="btn btn-danger mt-4" value="' . $conn['ID'] . '" href="employee/del-sertif-employee.php?ID=' . $conn['ID'] . '" style="width: 100px" onclick="return checkDelete()">Delete</a>'
                                                                                        ?>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="container" align="left">
                            <div class="row mt-2">
                                <table border="0" cellpadding="2">
                                    <tbody style="color: #2e2d2d; font-size: 14px; font-weight: lighter">
                                        <tr>
                                            <td>
                                                <center class="mt-3">
                                                    <em>#JadiLebihBaik</eM>
                                                </center>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="py-4"
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
        <script language="JavaScript" type="text/javascript">
            function checkDelete() {
                return confirm('Anda yakin untuk menghapus?');
            }
        </script>
        <script type="text/javascript">
            document.getElementById("space").style.letterSpacing = "2px";

            function zoom_auto() { document.body.style.zoom = "100%" }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
        </script>
        <script src="assets/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="assets/js/datatables-simple-demo.js"></script>
    </body>

    </html>

<?php endif ?>