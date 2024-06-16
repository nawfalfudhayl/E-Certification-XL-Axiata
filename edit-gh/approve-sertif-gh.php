<!-- DELETE Data Sertifikat -->
<?php
require '../header-gh.php';

if (isset($_SESSION['username'])):
    $id = $_GET['ID'];
    $usernamee = $_SESSION['username'];

    $datasertif = mysqli_query($conn, "SELECT * FROM sertif WHERE ID='$id'");
    $rowsertif = mysqli_fetch_object($datasertif);

    $datauser = mysqli_query($conn, "SELECT * FROM user WHERE username='$usernamee'");
    $rowuser = mysqli_fetch_object($datauser);

    $querys = "UPDATE sertif SET `ApprovalStatus`='Approved', `ApprovedAt`=NOW(), `ApprovedBy`='Nashrudin Ismail' WHERE ID='$id'";
    $result = $conn->query($querys);
    if ($result == 1) {
        ?>

        <body onload="zoom_auto()" class="sb-nav-fixed">
            <div id="layoutSidenav_content" style="background-color: #fafafa">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4" style="color: rgb(37, 150, 190)"><b>E-Certification<b
                                    style="float: right; color: rgb(238, 62, 128)">Hi, <?php echo $row_user['Nama']; ?></b></b></h1>
                        <ol class="breadcrumb mb-4" style="font-size: 14px">
                            <li class="breadcrumb-item"><a href="../index-gh.php" style="color: #33abf6"><i
                                        class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="../lihat-approval-gh.php" style="color: #33abf6">Certificates
                                    Approval</a></li>
                            <li class="breadcrumb-item active">Approve Certificate</li>
                        </ol>
                        <center style="margin-bottom: 2%; background-color: #5a5a5a; border-radius: 50px;">
                            <hr size="3px" color="black" style="background-color: black; border-radius: 50px;" />
                        </center>
                    </div>
                    <div class="container-fluid" style="width: 70%; margin-top: 3%; margin-bottom: 3%">
                        <h3 class="my-3" style="color: #2e2d2d">Approve Certificate</h3>
                        <div class="row">
                            <div class="col">
                                <div class="card mb-4">
                                    <div class="card-header" style="background-color: #2e2d2d;">
                                        <i class="fa fa-check-circle"
                                            style="margin-right: 2px; font-size: 16px; color: white; font-weight: bolder;"></i>
                                        <b style="color: white;">Approve Certificate</b>
                                    </div>
                                    <div class="card-body">
                                        <div class="container overflow-hidden">
                                            <form method="POST" enctype="multipart/form-data">
                                                <br>
                                                <div style="display: flex; justify-content: center; align-items: center;">
                                                    <b>Certification Data&nbsp;</b><b style='color: red'>
                                                        <?php echo '<label style="color: black; font-weight: bold">(ID:</label>&nbsp;' . $id . '<label style="color: black; font-weight: bold">)</label>'; ?>
                                                    </b><b>&nbsp;Successfully Update!</b>
                                                </div>
                                                <div style="display: flex; justify-content: center; align-items: center;">
                                                    <img src='../assets/images/check-removed.gif'>
                                                </div>
                                                <a type="submit" class="btn btn-primary"
                                                    href="../lihat-gh/lihat-approval-gh.php" style="float: left;"><b>OK</b></a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        function zoom_auto() {
                            document.body.style.zoom = "100%"
                        }
                    </script>
                </main>
                <?php require '../footer-gh.php'; ?>
            </div>
        </body>
        <?php
    } else {
        ?>

        <body onload="zoom_auto()" class="sb-nav-fixed">
            <div id="layoutSidenav_content" style="background-color: #fafafa">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4" style="color: rgb(37, 150, 190)"><b>E-Certification<b
                                    style="float: right; color: #D1B000">Hi, <?php echo $row_user['Nama']; ?></b></b></h1>
                        <ol class="breadcrumb mb-4" style="font-size: 14px">
                            <li class="breadcrumb-item"><a href="../index-gh.php" style="color: #33abf6"><i
                                        class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="../lihat-approval-gh.php" style="color: #33abf6">Certificates
                                    Approval</a></li>
                            <li class="breadcrumb-item active">Approve Certificate</li>
                        </ol>
                        <center style="margin-bottom: 2%; background-color: #5a5a5a; border-radius: 50px;">
                            <hr size="3px" color="black" style="background-color: black; border-radius: 50px;" />
                        </center>
                    </div>
                    <div class="container-fluid" style="width: 70%; margin-top: 3%; margin-bottom: 3%">
                        <h3 class="my-3" style="color: #2e2d2d">Approve Certificate</h3>
                        <div class="row">
                            <div class="col">
                                <div class="card mb-4">
                                    <div class="card-header" style="background-color: #2e2d2d;">
                                        <i class="fa fa-check-circle"
                                            style="margin-right: 2px; font-size: 16px; color: white; font-weight: bolder;"></i>
                                        <b style="color: white;">Approve Certificate</b>
                                    </div>
                                    <div class="card-body">
                                        <div class="container overflow-hidden">
                                            <form method="POST" enctype="multipart/form-data">
                                                <br>
                                                <div style="display: flex; justify-content: center; align-items: center;">
                                                    <b>Failed to update!</b>
                                                </div>
                                                <div style="display: flex; justify-content: center; align-items: center;">
                                                    <img src="../assets/images/cross2-removed.gif"
                                                        style="width: 400px; height: 300px">
                                                </div>
                                                <a type="submit" class="btn btn-primary"
                                                    href="../lihat-gh/lihat-approval-gh.php"
                                                    style="float: left;"><b>OK</b></a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        function zoom_auto() {
                            document.body.style.zoom = "100%"
                        }
                    </script>
                </main>
                <?php require '../footer-gh.php'; ?>
            </div>
        </body>
        <?php
    }

endif ?>