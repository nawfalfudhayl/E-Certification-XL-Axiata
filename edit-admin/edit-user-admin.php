<!-- Header dan Sidebar -->
<?php
require '../header-admin.php';
?>

<!-- VALIDASI Penginputan Form Edit Data User -->
<?php

if (isset($_SESSION['username'])):
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // VALIDATION PROCESS
    if (isset($_POST["ngedit"])) {
        $valid = TRUE;

        /* Data Input dan Data Lainnya */
        // Nama
        $nama = test_input($_POST["inputnama"]);
        // ID User
        $idadmin = test_input($_POST["inputidadmin"]);
        // Akses
        $unit1 = $_POST['inputunit1'];
        $unit_1 = $_POST['inputunit1'];
        // Data-data Pribadi Asli
        $data_asli = mysqli_query($conn, "SELECT * FROM user WHERE ID='$idadmin'");
        $data_row = mysqli_fetch_object($data_asli);
        /* END */

        /* Validasi Data 1 */
        // Jika belum mengisi apapun
        if ($nama == '' and $unit1 == '-- Pilih Unit 1 --') {
            $error_unt1 = "*Anda Belum Mengisi Apapun!";
            $error_nama = "*Anda Belum Mengisi Apapun!";
            $valid = FALSE;
        }
        // Jika belum mengedit apapun
        elseif ($nama == $data_row->Nama and $unit1 == $data_row->Akses) {
            $error_unt1 = "*Anda Belum Mengubah Apapun!";
            $error_nama = "*Anda Belum Mengubah Apapun!";
            $valid = FALSE;
        } else {
            // Nama
            if (!preg_match("/^[a-zA-Z. ]*$/", $nama)) {
                $error_nama = "*Nama hanya dapat berupa alphabet, titik, dan spasi!";
                $valid = FALSE;
            } elseif (strlen($nama) > 50) {
                $error_nama = "*Maksimal 50 karakter!";
                $valid = FALSE;
            }
        }
        /* END */

        /* Validasi Data 1 */
        // Jika Data Valid
        if ($valid) {
            $queryakun =
                "UPDATE `user`
            SET Nama= CASE WHEN '$nama'!='' THEN '$nama' ELSE Nama END
            , Akses= CASE WHEN '$unit1'!='-- Pilih Akses --' THEN '$unit1' ELSE Akses END
            WHERE ID='$idadmin'";
            $result = $conn->query($queryakun);

            // Jika Update Gagal
            if (!$result) {
                die("Tidak bisa menyelesaikan query </br>" . $conn->$error . "</br> Query:" . $queryakun);
            }
            // Jika Update Berhasil
            else {
                $message = "Berhasil Mengedit Data User!";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }
        // Jika Data Tidak Valid
        else if ($valid = FALSE) {
            $messageNO = "Gagal Mengedit Data User!";
            echo "<script type='text/javascript'>alert('$messageNO');</script>";
        }
        /* END */
    }
    ?>

    <!-- FORM Edit Data User -->

    <body onload="zoom_auto()" class="sb-nav-fixed">
        <div id="layoutSidenav_content" style="background-color: #fafafa">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4" style="color: rgb(37, 150, 190)"><b>E-Certificate<b
                                style="float: right; color: rgb(238, 62, 128)">Hi, <?php echo $row_user['Nama']; ?></b></b></h1>
                    <ol class="breadcrumb mb-4" style="font-size: 14px">
                        <li class="breadcrumb-item"><a href="../index-admin.php" style="color: #33abf6"><i
                                    class="fa fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="../lihat-admin/lihat-user-admin.php"
                                style="color: #33abf6">User</a>
                        </li>
                        <li class="breadcrumb-item active">Edit User Access</li>
                    </ol>
                    <center style="margin-bottom: 2%; background-color: #5a5a5a; border-radius: 50px;">
                        <hr size="3px" color="black" style="background-color: black; border-radius: 50px;" />
                    </center>
                </div>
                <div class="container-fluid" style="width: 50%;">
                    <h3 class="my-3" style="color: #2e2d2d">Edit User Access</h3>
                    <div class="row">
                        <div class="col">
                            <div class="card mb-4">
                                <!-- <div class="card-header" style="background-color: #2e2d2d;">
                                    <i class="bi bi-person-square"
                                        style="margin-right: 2px; font-size: 16px; color: white"></i>
                                    <b style="color: white;">Form</b>
                                </div> -->
                                <div class="card-body">
                                    <?php
                                    $idadmin_x = !empty($_GET["ID"]) ? $_GET["ID"] : 0;
                                    $user_data = mysqli_query($conn, "SELECT * FROM user WHERE ID='$idadmin_x'");
                                    while ($rows = mysqli_fetch_array($user_data)) {
                                        ?>
                                        <div class="container overflow-hidden">
                                            <form method="POST" enctype="multipart/form-data">
                                                <div class="row mb-3" style="align-items: center; justify-content: center;">
                                                    <label for="inputidadmin"><b>User ID</b></label>
                                                    <div class="col-sm-14">
                                                        <input type="text" class="form-control" id="inputidadmin"
                                                            name="inputidadmin" value="<?php echo $idadmin_x; ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-3" style="align-items: center; justify-content: center;">
                                                    <label for="inputnama"><b>Name</b></label>
                                                    <div class="col-sm-14">
                                                        <input type="text" class="form-control" id="inputnama" name="inputnama"
                                                            value="<?php echo $rows['Nama']; ?>" readonly>
                                                    </div>
                                                </div>
                                                <center style="margin-top: 3%; background-color: #5a5a5a; border-radius: 50px;">
                                                    <hr size="3px" color="black"
                                                        style="background-color: black; border-radius: 50px;" />
                                                </center>
                                                <div class="row mb-3" style="align-items: center; justify-content: center;">
                                                    <label for="inputdireksi"><b>Directorate</b></label>
                                                    <div class="col-sm-14">
                                                        <input type="text" class="form-control" id="inputdireksi"
                                                            name="inputdireksi" value="<?php echo $rows['Directorate']; ?>"
                                                            readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-3" style="align-items: center; justify-content: center;">
                                                    <label for="inputdivisi"><b>Division</b></label>
                                                    <div class="col-sm-14">
                                                        <input type="text" class="form-control" id="inputdivisi"
                                                            name="inputdivisi" value="<?php echo $rows['Division']; ?>"
                                                            readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-3" style="align-items: center; justify-content: center;">
                                                    <label for="inputdepartemen"><b>Department</b></label>
                                                    <div class="col-sm-14">
                                                        <input type="text" class="form-control" id="inputdepartemen"
                                                            name="inputdepartemen" value="<?php echo $rows['Department']; ?>"
                                                            readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-3" style="align-items: center; justify-content: center;">
                                                    <label for="inputunit1"><b>Access</b></label>
                                                    <div class="col-sm-14">
                                                        <select type="select" class="form-control" id="inputunit1"
                                                            name="inputunit1">
                                                            <?php
                                                            if (isset($unit1) and $unit1 != '-- Pilih Akses --') {
                                                                ?>
                                                                <option value="<?php if (isset($unit1))
                                                                    echo $unit1; ?>">
                                                                    <?php echo $unit1; ?>
                                                                </option>
                                                                <option value="-- Pilih Akses --"></option>
                                                                <?php
                                                            } elseif (isset($unit1) or $unit1 == '-- Pilih Akses --') {
                                                                ?>
                                                                <option value="-- Pilih Akses --"></option>
                                                                <?php
                                                            } elseif (!isset($unit1)) {
                                                                ?>
                                                                <option value="<?php if (!isset($unit1))
                                                                    echo $rows['Akses']; ?>">
                                                                    <?php echo $rows['Akses']; ?>
                                                                </option>
                                                                <option value="-- Pilih Akses --"></option>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            $result_unit = $conn->query('SELECT Akses FROM akses ORDER BY Akses');

                                                            while ($data_unit = $result_unit->fetch_object()) {
                                                                echo
                                                                    '<option value="' . $data_unit->Akses . '">' . $data_unit->Akses . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                        <div class="error" style="color:red; font-size: 12px;">
                                                            <?php if (isset($error_unt1))
                                                                echo $error_unt1; ?>
                                                        </div>
                                                    </div>
                                                    <b style='font-size: 11px;'>Currently Access : </b><b
                                                        style='color: red; font-size: 12px;'>
                                                        <?php echo $rows['Akses']; ?>
                                                    </b>
                                                </div>
                                                <center
                                                    style="margin-top: 3%; margin-bottom: 3%; background-color: #5a5a5a; border-radius: 50px;">
                                                    <hr size="3px" color="black"
                                                        style="background-color: black; border-radius: 50px;" />
                                                </center>
                                                <br>
                                                <a type="submit" class="btn btn-danger"
                                                    href="../lihat-admin/lihat-user-admin.php" style="float: left;"><b><i
                                                            class="fas fa-arrow-circle-left"></i>
                                                        Back</b></a>
                                                <button type="submit" name="ngedit" value="ngedit" class="btn btn-primary"
                                                    style="float: right;"><b>✓ Submit</b></button>
                                            </form>
                                        </div>
                                    <?php } ?>
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
            <?php require '../footer-admin.php'; ?>
        </div>
    </body>
<?php endif ?>
<!-- END of Form -->