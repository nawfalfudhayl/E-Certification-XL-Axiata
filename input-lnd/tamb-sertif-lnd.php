<!-- Header dan Sidebar -->
<?php
require '../header-lnd.php';
?>

<!-- VALIDASI Penginputan Form Pengisian Data Dokumen Baru -->
<?php

if (isset($_SESSION['username'])):
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (isset($_POST["tambah"])) {
        $valid = TRUE;

        /* Data Input dan Data Lainnya */
        // Gambar Cover Dokumen
        $filename = $_FILES["inputfoto"]["name"];
        $tempname = $_FILES["inputfoto"]["tmp_name"];
        // Jenis Dokumen
        $ktgr1 = $_POST['inputktgr1'];
        // ID
        $iddok = test_input($_POST["inputiddok"]);
        // Uploader
        $nama = test_input($_POST["inputnama"]);
        $creator = $_SESSION['username'];
        $iduser = test_input($_POST["inputiduser"]);
        $email = test_input($_POST["inputemail"]);
        $directorate = test_input($_POST["inputdireksi"]);
        $division = test_input($_POST["inputdivisi"]);
        $department = test_input($_POST["inputdepartemen"]);
        // Judul
        $judul = test_input($_POST["inputjudul"]);
        // Credential ID
        $sertifid = test_input($_POST["inputsertifid"]);
        // Tanggal Terbit
        $tglterbit = test_input($_POST["inputtglterbit"]);
        // Tanggal Exp
        $tglexp = test_input($_POST["inputtglexp"]);
        // Pengarang / Penulis
        $pengarang = test_input($_POST["inputpengarang"]);
        // Sinopsis
        $sinopsis = test_input($_POST["inputsinopsis"]);
        // Data-data Dokumen Asli
        $data_asli = mysqli_query($conn, "SELECT * FROM sertif WHERE ID='$iddok'");
        $databook = mysqli_fetch_object($data_asli);
        /* END */

        /* Validasi Data 1 */
        // Gambar Cover Dokumen
        $folder = "../assets/imageinput/" . $filename;
        if (!empty($_FILES["inputfoto"]["name"])) {
            $allowed = array('jpeg', 'png', 'jpg');
            $imageFileType = pathinfo($filename, PATHINFO_EXTENSION);
            $fileinfo = @getimagesize($_FILES["inputfoto"]["tmp_name"]);
            $width = $fileinfo[0];
            $height = $fileinfo[1];
            if (!in_array($imageFileType, $allowed)) {
                $error_foto = "*Format Gambar Salah! (Hanya .jpg, .jpeg, atau .png)";
                $valid = FALSE;
            } elseif ($width != 500 or $height != 380) {
                $error_foto = "*Ukuran gambar harus <b>500x380px</b>!";
                $valid = FALSE;
            }
        } else if (empty($_FILES['inputfoto']['name'])) {
            $error_foto = "*Gambar wajib diisi!";
            $valid = FALSE;
        }
        // Kategori
        if ($ktgr1 == "-- Pilih Kategori --") {
            $error_ktgr1 = "*Kategori sertif wajib diisi!";
            $valid = FALSE;
        }
        // Nama
        if (empty($nama)) {
            $error_nama = "*Nama wajib diisi!";
            $valid = FALSE;
        }
        // Judul
        if (empty($judul)) {
            $error_judul = "*Nama sertif wajib diisi!";
            $valid = FALSE;
        }
        // Pengarang
        if (empty($pengarang)) {
            $error_pengarang = "*Pengarang wajib diisi!";
            $valid = FALSE;
        }
        // ID
        if (empty($iddok)) {
            $error_iddok = "*ID Sertifikat wajib diisi!";
            $valid = FALSE;
        } elseif (strpos($iddok, 'S') != 0) {
            $error_iddok = "*Huruf S (kapital) harus berada pada bagian awal!";
            $valid = FALSE;
        } elseif (strpos($iddok, '-') != 1) {
            $error_iddok = "*ID Sertifikat harus dipisahkan dengan strip (-) antara huruf B (kapital) dan angka!";
            $valid = FALSE;
        } elseif (substr_count($iddok, 'S') > 1) {
            $error_iddok = "*Hanya terdapat 1 huruf S dalam ID Sertifikat!";
            $valid = FALSE;
        } elseif (substr_count($iddok, '-') > 1) {
            $error_iddok = "*Hanya terdapat 1 strip (-) dalam ID Sertifikat!";
            $valid = FALSE;
        } elseif (!preg_match("/^[0-9S-]*$/", $iddok)) {
            $error_iddok = "*ID Sertifikat hanya bisa menggunakan huruf S (kapital), strip (-), dan angka!";
            $valid = FALSE;
        } elseif (mysqli_num_rows($data_asli) > 0) {
            $error_iddok = "*ID Sertifikat sudah ada dalam database! Masukkan ID yang baru!";
            $valid = FALSE;
        }
        // Tanggal Terbit
        if (empty($tglterbit)) {
            $error_tglterbit = "*Tanggal terbit wajib diisi!";
            $valid = FALSE;
        }
        // Tanggal Exp
        if (empty($tglexp)) {
            $error_tglexp = "*Tanggal exp wajib diisi!";
            $valid = FALSE;
        }
        // Sinopsis
        if (strlen($sinopsis) > 210) {
            $error_sinopsis = "*Maksimal 210 karakter!";
            $valid = FALSE;
        }
        /* END */

        /* Validasi Data 1 */
        // Jika Data Valid
        if ($valid) {
            $querydok = "INSERT INTO sertif (ID, Nama, IdUser, Email, Directorate, Division, Department, Filee, Kategori, NamaSertif, SertifID, TglTerbit, IssuedBy, Deskripsi, TglExp, CreatedAt, CreatedBy) VALUES('$iddok', '$nama', '$iduser', '$email', '$directorate', '$division', '$department','$filename','$ktgr1','$judul', '$sertifid','$tglterbit','$pengarang', '$sinopsis', '$tglexp',NOW(), '$creator')";
            $result = $conn->query($querydok);

            // Menghapus data Dokumen pada tabel book_del apabila data dokumen yang baru saja di-input terdapat di tabel book_del
            // $databuku_del = mysqli_query($conn, "SELECT * FROM sertif_del WHERE SertifID_Del='$iddok'");
            // if (mysqli_num_rows($databuku_del) > 0) {
            //     $querysxx = mysqli_query($conn, "DELETE FROM sertif_del WHERE SertifID_Del='$iddok'");
            // }

            // Jika Insert Gagal
            if (!$result) {
                die("Tidak bisa menyelesaikan query </br>" . $conn->$error . "</br> Query:" . $querydok);
            }
            // Jika Insert Berhasil
            else {
                if (move_uploaded_file($tempname, $folder)) {
                    $message = "Berhasil Menginput Data!";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
            }
        }
        // Jika Data Tidak Valid
        else if ($valid = FALSE) {
            $messageNO = "Gagal Menginput Data!";
            echo "<script type='text/javascript'>alert('$messageNO');</script>";
        }
        /* END */
    }

    ?>

    <!-- FORM Pengisian Data Dokumen Baru -->

    <body onload="zoom_auto()" class="sb-nav-fixed">
        <div id="layoutSidenav_content" style="background-color: #fafafa">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4" style="color: rgb(37, 150, 190)"><b>E-Certification<b
                                style="float: right; color: rgb(238, 62, 128)">Hi, <?php echo $row_user['Nama']; ?></b></b></h1>
                    <ol class="breadcrumb mb-4" style="font-size: 14px">
                        <li class="breadcrumb-item"><a href="../index-lnd.php" style="color: #33abf6"><i
                                    class="fa fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="../lihat-lnd/lihat-sertif-lnd.php"
                                style="color: #33abf6">Certificates</a></li>
                        <li class="breadcrumb-item active">Add New</li>
                    </ol>
                    <center style="margin-bottom: 2%; background-color: #5a5a5a; border-radius: 50px;">
                        <hr size="3px" color="black" style="background-color: black; border-radius: 50px;" />
                    </center>
                    <div class="card mb-4" style="border: 0,5px solid #2e2d2d">
                        <div class="card-body tabel-mahasiswa cell-border">
                            <a type="submit" class="btn btn-success" href="../input-lnd/bulk-upload-lnd.php"
                                style="float: right;"><b>Bulk Upload</b></a>
                            <center>
                                <b style="color: #2e2d2d; font-size: 28px">Add New Certificate</b>
                            </center>
                            <!-- <h3 class="my-3" style="color: #2e2d2d">Tambah Sertif</h3> -->

                            <!-- <div class="card-header" style="text-align: center; background-color: #2e2d2d;">
                                    <i class="bi bi-journals"
                                        style="margin-right: 2px; font-size: 16px; color: white; font-weight: bolder;"></i>
                                    <b style="color: white;">Form</b>
                                </div> -->
                            <div class="card-body">
                                <?php
                                $username_user = $_SESSION['username'];
                                $user_data = mysqli_query($conn, "SELECT * FROM user WHERE username='$username_user'");
                                $data_dok = mysqli_query($conn, "SELECT * FROM sertif ORDER BY sertif.ID DESC LIMIT 1");
                                while ($rows = mysqli_fetch_array($user_data) and $rows_dok = mysqli_fetch_object($data_dok)) {
                                    ?>
                                    <div class="container overflow-hidden">
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="row mb-3" style="align-items: center; justify-content: center;">
                                                <label for="inputiddok"><b>Certification ID</b><b
                                                        style="color: red">*</b></label>
                                                <div class="col-sm-14">
                                                    <input type="text" class="form-control" id="inputiddok" name="inputiddok"
                                                        value="<?php if (isset($iddok))
                                                            echo "S-" . ($rows_dok->ID + 1);
                                                        if (!isset($iddok))
                                                            echo "S-" . ($rows_dok->ID + 1); ?>" readonly>
                                                    <div class="error" style="color:red; font-size: 12px;">
                                                        <?php if (isset($error_iddok))
                                                            echo $error_iddok; ?>
                                                    </div>
                                                    <?php
                                                    $resultoo = mysqli_query($conn, "SELECT sertif.ID FROM sertif ORDER BY sertif.ID DESC LIMIT 1");
                                                    while ($rowaa = $resultoo->fetch_object()) {
                                                        echo "<b style='font-size: 11px;'>ID Dokumen Terakhir : S-</b><b style='color: red; font-size: 12px;'>" . $rowaa->ID . "</b>";
                                                    }
                                                    mysqli_free_result($resultoo);
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="row mb-3" style="align-items: center; justify-content: center;">
                                                <label for="inputsertifid"><b>Credential ID</b></label>
                                                <div class="col-sm-14">
                                                    <input type="text" class="form-control" id="inputsertifid"
                                                        name="inputsertifid" value="<?php if (isset($sertifid))
                                                            echo $sertifid; ?>">
                                                </div>
                                            </div>
                                            <center style="margin-top: 3%; background-color: #5a5a5a; border-radius: 50px;">
                                                <hr size="3px" color="black"
                                                    style="background-color: black; border-radius: 50px;" />
                                            </center>
                                            <div class="row mb-3">
                                                <div class='col-lg-6'>
                                                    <label for="inputnama"><b>Name</b></label>
                                                    <div class="col-sm-14">
                                                        <input type="text" class="form-control" id="inputnama" name="inputnama"
                                                            value="<?php if (isset($nama))
                                                                echo $nama; ?>">
                                                        <div class="error" style="color:red; font-size: 12px;">
                                                            <?php if (isset($error_nama))
                                                                echo $error_nama; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='col-lg-6'>
                                                    <label for="inputdireksi"><b>Directorate</b></label>
                                                    <div class="col-sm-14">
                                                        <input type="text" class="form-control" id="inputdireksi"
                                                            name="inputdireksi" value="<?php if (isset($directorate))
                                                                echo $directorate; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class='col-lg-6'>
                                                    <label for="inputdivisi"><b>Division</b></label>
                                                    <div class="col-sm-14">
                                                        <input type="text" class="form-control" id="inputdivisi"
                                                            name="inputdivisi" value="<?php if (isset($division))
                                                                echo $division; ?>">
                                                    </div>
                                                </div>
                                                <div class='col-lg-6'>
                                                    <label for="inputdepartemen"><b>Department</b></label>
                                                    <div class="col-sm-14">
                                                        <input type="text" class="form-control" id="inputdepartemen"
                                                            name="inputdepartemen" value="<?php if (isset($directorate))
                                                                echo $directorate; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class='col-lg-6'>
                                                    <label for="inputiduser"><b>ID User</b></label>
                                                    <div class="col-sm-14">
                                                        <input type="text" class="form-control" id="inputiduser"
                                                            name="inputiduser" value="<?php if (isset($iduser))
                                                                echo $iduser; ?>">
                                                    </div>
                                                </div>
                                                <div class='col-lg-6'>
                                                    <label for="inputemail"><b>Email</b></label>
                                                    <div class="col-sm-14">
                                                        <input type="text" class="form-control" id="inputemail"
                                                            name="inputemail" value="<?php if (isset($email))
                                                                echo $email; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <center style="margin-top: 3%; background-color: #5a5a5a; border-radius: 50px;">
                                                <hr size="3px" color="black"
                                                    style="background-color: black; border-radius: 50px;" />
                                            </center>
                                            <div class="row mb-3">
                                                <div class="col-sm-14">
                                                    <label for="inputfoto"><b>Upload</b><b style="color: red">*</b></label>
                                                    <input id="inputfoto" name="inputfoto" type="file" class="form-control"
                                                        accept="image/png, image/jpg, image/jpeg">
                                                    <div class="error" style="color:red; font-size: 12px;">
                                                        <?php if (isset($error_foto))
                                                            echo $error_foto;
                                                        ?>
                                                    </div>
                                                    <a style="color: black; font-size: 11px;">*Format .jpg,
                                                        .jpeg, atau .png!<br>*Ukuran gambar harus <label
                                                            style="color: red"><b>500x380px</b></label>!<br>*Belum
                                                        mengubah
                                                        ukuran gambar? </a><a href="https://imageresizer.com/" target="_blank"
                                                        style="font-size: 14px;">Klik</a>
                                                </div>
                                            </div>
                                            <center style="margin-top: 3%; background-color: #5a5a5a; border-radius: 50px;">
                                                <hr size="3px" color="black"
                                                    style="background-color: black; border-radius: 50px;" />
                                            </center>
                                            <div class="row mb-3">
                                                <div class='col-sm-14'>
                                                    <label for="inputjudul"><b>Certification Name</b><b
                                                            style="color: red">*</b></label>
                                                    <input type="text" class="form-control" id="inputjudul" name="inputjudul"
                                                        value="<?php if (isset($judul))
                                                            echo $judul; ?>">
                                                    <div class="error" style="color:red; font-size: 12px;">
                                                        <?php if (isset($error_judul))
                                                            echo $error_judul; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class='col-lg-6'>
                                                    <label for="inputktgr1"><b>Category</b><b style="color: red">*</b></label>
                                                    <select type="select" class="form-control" id="inputktgr1"
                                                        name="inputktgr1">
                                                        <?php
                                                        if (isset($ktgr1) and $ktgr1 != '-- Pilih Kategori --') {
                                                            ?>
                                                            <option value="<?php if (isset($ktgr1))
                                                                echo $ktgr1; ?>">
                                                                <?php echo $ktgr1; ?>
                                                            </option>
                                                            <option value="-- Pilih Kategori --">-- Pilih Kategori --
                                                            </option>
                                                            <?php
                                                        } elseif (isset($ktgr1) or $ktgr1 == '-- Pilih Kategori --') {
                                                            ?>
                                                            <option value="-- Pilih Kategori --">-- Pilih Kategori --
                                                            </option>
                                                            <?php
                                                        } elseif (!isset($ktgr1)) {
                                                            ?>
                                                            <option value="-- Pilih Kategori --">-- Pilih Kategori --
                                                            </option>
                                                            <?php
                                                        }
                                                        ?>
                                                        <?php
                                                        $resultt1 = $conn->query('SELECT Kategori FROM kategori');

                                                        while ($dataa1 = $resultt1->fetch_object()) {
                                                            echo
                                                                '<option value="' . $dataa1->Kategori . '">' . $dataa1->Kategori . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                    <div class="error" style="color:red; font-size: 12px;">
                                                        <?php if (isset($error_ktgr1))
                                                            echo $error_ktgr1; ?>
                                                    </div>
                                                </div>
                                                <div class='col-lg-6'>
                                                    <label for="inputtglterbit"><b>Issued Date</b><b
                                                            style="color: red">*</b></label>
                                                    <input type="date" class="form-control" id="inputtglterbit"
                                                        name="inputtglterbit" value="<?php if (isset($tglterbit))
                                                            echo $tglterbit; ?>">
                                                    <div class="error" style="color:red; font-size: 12px;">
                                                        <?php if (isset($error_tglterbit))
                                                            echo $error_tglterbit; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class='col-lg-6'>
                                                    <label for="inputpengarang"><b>Issued By</b><b
                                                            style="color: red">*</b></label>
                                                    <input type="text" class="form-control" id="inputpengarang"
                                                        name="inputpengarang" value="<?php if (isset($pengarang))
                                                            echo $pengarang; ?>">
                                                    <div class="error" style="color:red; font-size: 12px;">
                                                        <?php if (isset($error_pengarang))
                                                            echo $error_pengarang; ?>
                                                    </div>
                                                </div>
                                                <div class='col-lg-6'>
                                                    <label for="inputtglexp"><b>Expired Date</b><b
                                                            style="color: red">*</b></label>
                                                    <input type="date" class="form-control" id="inputtglexp" name="inputtglexp"
                                                        value="<?php if (isset($tglexp))
                                                            echo $tglexp; ?>">
                                                    <div class="error" style="color:red; font-size: 12px;">
                                                        <?php if (isset($error_tglexp))
                                                            echo $error_tglexp; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <center style="margin-top: 3%; background-color: #5a5a5a; border-radius: 50px;">
                                                <hr size="3px" color="black"
                                                    style="background-color: black; border-radius: 50px;" />
                                            </center>
                                            <div class="row mb-3">
                                                <label for="inputsinopsis"><b>Description</b></label>
                                                <div class="col-sm-14">
                                                    <textarea type="text" class="form-control" id="inputsinopsis"
                                                        name="inputsinopsis" value="<?php if (isset($sinopsis))
                                                            echo $sinopsis; ?>"><?php if (isset($sinopsis))
                                                                  echo $sinopsis; ?></textarea>
                                                    <div class="error" style="color:red; font-size: 12px;">
                                                        <?php if (isset($error_sinopsis))
                                                            echo $error_sinopsis; ?>
                                                    </div>
                                                    <a style="color: black; font-size: 11px;">*Maksimal 210
                                                        Karakter! (termasuk spasi)</a>
                                                </div>
                                            </div>
                                            <a style="float: left; font-size: 11px">Note :</a>
                                            <br>
                                            <b style="color: red">* </b><a style="font-size: 11px">= Mandatory to field!</a>
                                            <br><br>
                                    </div>
                                    <a type="submit" class="btn btn-danger" href="../lihat-lnd/lihat-sertif-lnd.php"
                                        style="float: left;"><b><i class="fas fa-arrow-circle-left"></i>
                                            Back</b></a>
                                    <button type="submit" name="tambah" value="tambah" class="btn btn-success"
                                        style="float: right;" id="checkBtn"><b>+ Add</b></button>
                                    </form>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <script type="text/javascript">
                        function zoom_auto() {
                            document.body.style.zoom = "100%"
                        }
                    </script>
                </div>
            </main>
            <?php require '../footer-lnd.php'; ?>
        </div>
    </body>
<?php endif ?>
<!-- END of FORM -->