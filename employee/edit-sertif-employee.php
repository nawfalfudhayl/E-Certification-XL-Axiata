<!-- Header dan Sidebar -->
<?php
require '../header-employee.php';
?>

<!-- VALIDASI Penginputan Form Edit Data Dokumen -->
<?php

if (isset($_SESSION['username'])):
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (isset($_POST["submit"])) {
        $valid = TRUE;

        /* Data Input dan Data Lainnya */
        // Gambar Cover Dokumen
        $filename = $_FILES["inputfoto"]["name"];
        $tempname = $_FILES["inputfoto"]["tmp_name"];
        // Jenis Dokumen
        $ktgr1 = $_POST['inputktgr1'];
        // ID
        $iddok = test_input($_POST["inputiddok"]);
        // Judul
        $judul = test_input($_POST["inputjudul"]);
        // Tahun Terbit
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
        // Konversi Data Sinopsis Asli jika Aslinya Null, menjadi ''
        if ($databook->Deskripsi == NULL) {
            $sinops = '';
        } elseif ($databook->Deskripsi != NULL) {
            $sinops = $databook->Deskripsi;
        }
        /* END */

        /* Validasi Data 1 */
        // Jika belum mengisi apapun
        if ($filename == '' and $tglterbit == '' and $tglexp == '' and $ktgr1 == '-- Choose Category --' and $judul == '' and $pengarang == '' and $sinopsis == '') {
            $error_ktgr1 = "*Anda Belum Mengisi Apapun!";
            $error_judul = "*Anda Belum Mengisi Apapun!";
            $error_pengarang = "*Anda Belum Mengisi Apapun!";
            $error_foto = "*Anda Belum Mengisi Apapun!";
            $error_tglterbit = "*Anda Belum Mengisi Apapun!";
            $error_tglexp = "*Anda Belum Mengisi Apapun!";
            $error_sinopsis = "*Anda Belum Mengisi Apapun!";
            $valid = FALSE;
        }
        // Jika belum mengedit apapun
        elseif ($filename == '' and $tglterbit == $databook->TglTerbit and $ktgr1 == $databook->Kategori and $judul == $databook->NamaSertif and $pengarang == $databook->IssuedBy and $sinopsis == $sinops) {
            $error_ktgr1 = "*Anda Belum Mengubah Apapun!";
            $error_judul = "*Anda Belum Mengubah Apapun!";
            $error_pengarang = "*Anda Belum Mengubah Apapun!";
            $error_foto = "*Anda Belum Mengubah Apapun!";
            $error_tglterbit = "*Anda Belum Mengisi Apapun!";
            $error_tglexp = "*Anda Belum Mengisi Apapun!";
            $error_sinopsis = "*Anda Belum Mengubah Apapun!";
            $valid = FALSE;
        } else {
            // Gambar Cover Dokumen
            $folder = "../assets/imageinput/" . $filename;
            if (!empty($_FILES["inputfoto"]["name"])) {
                $allowed = array('jpeg', 'png', 'jpg');
                $imageFileType = pathinfo($filename, PATHINFO_EXTENSION);
                $fileinfo = @getimagesize($_FILES["inputfoto"]["tmp_name"]);
                // $width = $fileinfo[0];
                // $height = $fileinfo[1];
                if (!in_array($imageFileType, $allowed)) {
                    $error_foto = "*.jpg, .jpeg, or .png only";
                    $valid = FALSE;
                // } elseif ($width != 500 or $height != 380) {
                //     $error_foto = "*Ukuran gambar harus 500x380 pixel (px)!";
                //     $valid = FALSE;
                }
            }
            // Tanggal Terbit
            if (empty($tglterbit)) {
                $error_tglterbit = "*";
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
        }
        /* END */

        /* Validasi Data 1 */
        // Jika Data Valid
        if ($valid) {
            $queryedit = "UPDATE `sertif` SET TglEdit=NOW(), Filee= CASE WHEN '$filename'!='' THEN '$filename' ELSE Filee END, Kategori= CASE WHEN '$ktgr1'!='-- Choose Category --' THEN '$ktgr1' ELSE Kategori END, NamaSertif= CASE WHEN '$judul'!='' THEN '$judul' ELSE NamaSertif END, TglTerbit= CASE WHEN '$tglterbit'!='' THEN '$tglterbit' ELSE TglTerbit END, TglExp= CASE WHEN '$tglexp'!='' THEN '$tglexp' ELSE TglExp END, IssuedBy= CASE WHEN '$pengarang'!='' THEN '$pengarang' ELSE IssuedBy END, Deskripsi= CASE WHEN '$sinopsis'!='' THEN '$sinopsis' ELSE Deskripsi END WHERE ID='$iddok'";
            $result = $conn->query($queryedit);

            // Jika Update Gagal
            if (!$result) {
                die("Tidak bisa menyelesaikan query </br>" . $conn->$error . "</br> Query:" . $queryedit);
            }
            // Jika Update Berhasil
            else {
                // Jika Mengupload Gambar
                if (move_uploaded_file($tempname, $folder)) {
                    $message = "Berhasil Mengedit Data!";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
                // Jika Tidak Mengupload Gambar
                else {
                    $message = "Berhasil Mengedit Data!";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
            }
        }
        // Jika Data Tidak Valid
        elseif ($valid = FALSE) {
            $messageNO = "Gagal Mengedit Data!";
            echo "<script type='text/javascript'>alert('$messageNO');</script>";
        }
        /* END */
    }
    ?>

    <!-- FORM Edit Data Dokumen -->

    <body onload="zoom_auto()" class="sb-nav-fixed">
        <div id="layoutSidenav_content" style="background-color: #fafafa">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4" style="color: rgb(37, 150, 190)"><b>E-Certification<b
                                style="float: right; color: rgb(238, 62, 128)">Hi, <?php echo $row_user['Nama']; ?></b></b></h1>
                    <ol class="breadcrumb mb-4" style="font-size: 14px">
                        <li class="breadcrumb-item"><a href="../index-employee.php" style="color: #33abf6"><i
                                    class="fa fa-home"></i></a></li>
                        <li class="breadcrumb-item active">Edit Certificate</li>
                    </ol>
                    <center style="margin-bottom: 2%; background-color: #5a5a5a; border-radius: 50px;">
                        <hr size="3px" color="black" style="background-color: black; border-radius: 50px;" />
                    </center>
                </div>
                <div class="container-fluid" style="width: 60%;">
                    <h3 class="my-3" style="color: #2e2d2d">Edit Certificate</h3>
                    <div class="row">
                        <div class="col">
                            <div class="card mb-4">
                                <div class="card-header" style="background-color: #164396;">
                                    <i class="bi bi-journals"
                                        style="margin-right: 2px; font-size: 16px; color: white; font-weight: bolder;"></i>
                                    <b style="color: white;">Form</b>
                                </div>
                                <div class="card-body">
                                    <?php
                                    $bookid = $_GET['ID'];
                                    $book_data = mysqli_query($conn, "SELECT * FROM sertif WHERE ID='$bookid'");
                                    while ($rows = mysqli_fetch_array($book_data)) {
                                        ?>
                                        <div class="container overflow-hidden">
                                            <form method="POST" enctype="multipart/form-data">
                                                <div class="row mb-3">
                                                    <label for="inputiddok"><b>Certification ID</b></label>
                                                    <div class="col-sm-14">
                                                        <input type="text" class="form-control" id="inputiddok"
                                                            name="inputiddok" value="<?php echo $bookid; ?>" readonly>
                                                    </div>
                                                </div>
                                                <center style="margin-top: 3%; background-color: #5a5a5a; border-radius: 50px;">
                                                    <hr size="3px" color="black"
                                                        style="background-color: black; border-radius: 50px;" />
                                                </center>
                                                <div class="row mb-3">
                                                    <div class='col-lg-6'>
                                                        <label for="inputfoto"><b>Upload
                                                                File</b></label>
                                                        <input id="inputfoto" name="inputfoto" type="file" class="form-control"
                                                            accept="image/png, image/jpg, image/jpeg">
                                                        <div class="error" style="color:red; font-size: 12px;">
                                                            <?php if (isset($error_foto))
                                                                echo $error_foto;
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-6'>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">

                                                </div>
                                                <center style="margin-top: 3%; background-color: #5a5a5a; border-radius: 50px;">
                                                    <hr size="3px" color="black"
                                                        style="background-color: black; border-radius: 50px;" />
                                                </center>
                                                <div class="row mb-3">
                                                    <div class='col-lg-6'>
                                                        <label for="inputnama"><b>Name</b></label>
                                                        <div class="col-sm-14">
                                                            <input type="text" class="form-control" id="inputnama"
                                                                name="inputnama" value="<?php echo $rows['Nama']; ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-6'>
                                                        <label for="inputdireksi"><b>Directorate</b></label>
                                                        <div class="col-sm-14">
                                                            <input type="text" class="form-control" id="inputdireksi"
                                                                name="inputdireksi" value="<?php echo $rows['Directorate']; ?>"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class='col-lg-6'>
                                                        <label for="inputdivisi"><b>Division</b></label>
                                                        <div class="col-sm-14">
                                                            <input type="text" class="form-control" id="inputdivisi"
                                                                name="inputdivisi" value="<?php echo $rows['Division']; ?>"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-6'>
                                                        <label for="inputdepartemen"><b>Department</b></label>
                                                        <div class="col-sm-14">
                                                            <input type="text" class="form-control" id="inputdepartemen"
                                                                name="inputdepartemen"
                                                                value="<?php echo $rows['Department']; ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class='col-lg-6'>
                                                        <label for="inputiduser"><b>ID User</b></label>
                                                        <div class="col-sm-14">
                                                            <input type="text" class="form-control" id="inputiduser"
                                                                name="inputiduser" value="<?php echo $rows['IdUser']; ?>"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-6'>
                                                        <label for="inputemail"><b>Email</b></label>
                                                        <div class="col-sm-14">
                                                            <input type="text" class="form-control" id="inputemail"
                                                                name="inputemail" value="<?php echo $rows['Email']; ?>"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <center
                                                    style="margin-top: 3%; margin-bottom: 3%; background-color: #5a5a5a; border-radius: 50px;">
                                                    <hr size="3px" color="black"
                                                        style="background-color: black; border-radius: 50px;" />
                                                </center>
                                                <div class="row mb-3">
                                                    <div class='col-sm-14'>
                                                        <label for="inputjudul"><b>Certification Name</b></label>
                                                        <input type="text" class="form-control" id="inputjudul"
                                                            name="inputjudul" value="<?php if (isset($judul))
                                                                echo $judul;
                                                            if (!isset($judul))
                                                                echo $rows['NamaSertif']; ?>">
                                                        <div class="error" style="color:red; font-size: 12px;">
                                                            <?php if (isset($error_judul))
                                                                echo $error_judul;
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class='col-lg-6'>
                                                        <label for="inputktgr1"><b>Category</b></label>
                                                        <select type="select" class="form-control" id="inputktgr1"
                                                            name="inputktgr1">
                                                            <?php
                                                            if (isset($ktgr1) and $ktgr1 != '-- Choose Category --') {
                                                                ?>
                                                                <option value="<?php if (isset($ktgr1))
                                                                    echo $ktgr1; ?>">
                                                                    <?php echo $ktgr1; ?>
                                                                </option>
                                                                <?php
                                                            } elseif (isset($ktgr1) or $ktgr1 == '-- Choose Category --') {
                                                                ?>
                                                                <?php
                                                            } elseif (!isset($ktgr1)) {
                                                                ?>
                                                                <option value="<?php if (!isset($ktgr1))
                                                                    echo $rows['Kategori']; ?>">
                                                                    <?php echo $rows['Kategori']; ?>
                                                                </option>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            $resultt1 = $conn->query('SELECT Kategori FROM kategori ORDER BY Kategori');

                                                            while ($dataa1 = $resultt1->fetch_object()) {
                                                                echo
                                                                    '<option value="' . $dataa1->Kategori . '">' . $dataa1->Kategori . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                        <div class="error" style="color:red; font-size: 12px;">
                                                            <?php if (isset($error_ktgr1))
                                                                echo $error_ktgr1;
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-6'>
                                                        <label for="inputtglterbit"><b>Issued Date</b></label>
                                                        <input type="date" class="form-control" id="inputtglterbit"
                                                            name="inputtglterbit" value="<?php if (isset($tglterbit))
                                                                echo $tglterbit;
                                                            if (!isset($tglterbit))
                                                                echo $rows['TglTerbit']; ?>">
                                                        <div class="error" style="color:red; font-size: 12px;">
                                                            <?php if (isset($error_tglterbit))
                                                                echo $error_tglterbit; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class='col-lg-6'>
                                                        <label for="inputtglexp"><b>Expired Date</b></label>
                                                        <input type="date" class="form-control" id="inputtglexp"
                                                            name="inputtglexp" value="<?php if (isset($tglexp))
                                                                echo $tglexp;
                                                            if (!isset($tglexp))
                                                                echo $rows['TglExp']; ?>">
                                                        <div class="error" style="color:red; font-size: 12px;">
                                                            <?php if (isset($error_tglexp))
                                                                echo $error_tglexp; ?>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-6'>
                                                        <label for="inputpengarang"><b>Issued By</b></label>
                                                        <input type="text" class="form-control" id="inputpengarang"
                                                            name="inputpengarang" value="<?php if (isset($pengarang))
                                                                echo $pengarang;
                                                            if (!isset($pengarang))
                                                                echo $rows['IssuedBy']; ?>">
                                                        <div class="error" style="color:red; font-size: 12px;">
                                                            <?php if (isset($error_pengarang))
                                                                echo $error_pengarang;
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <center style="margin-top: 3%; background-color: #5a5a5a; border-radius: 50px;">
                                                    <hr size="3px" color="black"
                                                        style="background-color: black; border-radius: 50px;" />
                                                </center>
                                                <div class="row mb-3">
                                                    <label for="inputsinopsis"><b>Description</b><b
                                                            style="color: red"></b></label>
                                                    <div class="col-sm-14">
                                                        <textarea type="text" class="form-control" id="inputsinopsis"
                                                            name="inputsinopsis" value="<?php if (isset($sinopsis))
                                                                echo $sinopsis;
                                                            if (!isset($sinopsis))
                                                                echo $rows['Deskripsi']; ?>"><?php if (isset($sinopsis))
                                                                      echo $sinopsis;
                                                                  if (!isset($sinopsis))
                                                                      echo $rows['Deskripsi']; ?></textarea>
                                                        <div class="error" style="color:red; font-size: 12px;">
                                                            <?php if (isset($error_sinopsis))
                                                                echo $error_sinopsis; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <a type="submit" class="btn btn-danger" href="../index-employee.php"><b><i
                                                            class="fas fa-arrow-circle-left"></i>
                                                        Back</b></a>
                                                <button type="submit" name="submit" value="submit" class="btn btn-primary"
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
            <?php require '../footer-employee.php'; ?>
        </div>
    </body>
<?php endif ?>
<!-- END of FORM -->