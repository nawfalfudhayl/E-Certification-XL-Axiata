<!-- Header dan Sidebar -->
<?php
require '../header-admin.php';
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

    if (isset($_POST["butonedit"]))
    {
        $valid = TRUE;

        /* Data Input dan Data Lainnya */
        // Jenis Dokumen
        $ktgr1 = test_input($_POST['inputktgr1']);
        // Edit Jenis Dokumen
        $editktgr = test_input($_POST['editktgr']);
        // Cek Data Jenis Dokumen
        $resultambil = mysqli_query($conn, "SELECT * FROM kategori WHERE Kategori='$editktgr'");
        /* END */

        /* Validasi Data 1 */
        // Jenis Dokumen
        if (empty($editktgr))
        {
            $error_ktgred = "*Anda Belum Mengubah Apapun!";
            $valid        = FALSE;
        }
        elseif (mysqli_num_rows($resultambil) > 0)
        {
            $error_ktgred = "*Jenis Dokumen ini sudah ada dalam database! Masukkan yang lain!";
            $valid        = FALSE;
        }
        /* END */

        /* Validasi Data 1 */
        // Jika Data Valid
        if ($valid)
        {
            $editktgrdok = 'UPDATE `kategori` SET Kategori="' . $editktgr . '" WHERE Kategori="' . $ktgr1 . '" ';
            $resultedit  = $conn->query($editktgrdok);

            // Jika Update Gagal
            if (!$resultedit)
            {
                die("Tidak bisa menyelesaikan query </br>" . $conn->$error . "</br> Query:" . $editktgrdok);
            }
            // Jika Update Berhasil
            {
                $message = "Berhasil Mengedit Data!";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }
        // Jika Data Tidak Valid
        else if ($valid = FALSE)
        {
            $messageNO = "Gagal Mengedit Data!";
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
                    <h1 class="mt-4" style="color: rgb(37, 150, 190)"><b>E-Certificate<b
                                style="float: right; color: rgb(238, 62, 128)">Hi, <?php echo $row_user['Nama']; ?></b></b></h1>
                    <ol class="breadcrumb mb-4" style="font-size: 14px">
                        <li class="breadcrumb-item"><a href="../index-admin.php" style="color: #33abf6"><i
                                    class="fa fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="../lihat-admin/lihat-ktgr-admin.php" style="color: #33abf6">Category</a>
                        </li>
                        <li class="breadcrumb-item active">Edit Category</li>
                    </ol>
                    <center style="margin-bottom: 2%; background-color: #5a5a5a; border-radius: 50px;">
                        <hr size="3px" color="black" style="background-color: black; border-radius: 50px;" />
                    </center>
                </div>
                <div class="container-fluid" style="width: 35%;">
                    <h3 class="my-3" style="color: #2e2d2d">Edit Category of Certificates</h3>
                    <div class="row">
                        <div class="col">
                            <div class="card mb-4">
                                <div class="card-header" style="background-color: #164396;">
                                    <i class="bi bi-list-check"
                                        style="margin-right: 2px; font-size: 16px; color: white; font-weight: bolder;"></i>
                                    <b style="color: white;">Form</b>
                                </div>
                                <div class="card-body">
                                    <div class="container overflow-hidden">
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="row mb-3" style="align-items: center; justify-content: center;">
                                                <label for="inputktgr1"><b>Category of Certificates</b></label>
                                                <div class="col-sm-14">
                                                    <input type="text" class="form-control" id="inputktgr1"
                                                        name="inputktgr1" value="<?php
                                                        $ktgrjnsd = $_GET['Kategori'];
                                                        if (isset($ktgr1))
                                                        {
                                                            echo $editktgr;
                                                        }
                                                        elseif (!isset($ktgr1))
                                                        {
                                                            echo $ktgrjnsd;
                                                        }
                                                        ?>" readonly>
                                                    <div class="error" style="color:red; font-size: 12px;">
                                                        <?php if (isset($error_ktgr))
                                                            echo $error_ktgr; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3" style="align-items: center; justify-content: center;">
                                                <label for="editktgr"><b>New Category</b></label>
                                                <div class="col-sm-14">
                                                    <input type="text" class="form-control" id="editktgr" name="editktgr"
                                                        value="<?php if (isset($editktgr))
                                                            echo $editktgr; ?>">
                                                    <div class="error" style="color:red; font-size: 12px;">
                                                        <?php if (isset($error_ktgred))
                                                            echo $error_ktgred; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <button type="submit" name="butonedit" value="butonedit" class="btn btn-primary"
                                                style="float: right;"><b>✓ Submit</b></button>
                                            <a type="submit" class="btn btn-danger" href="../lihat-admin/lihat-ktgr-admin.php"
                                                style="float: left;"><b><i class="fas fa-arrow-circle-left"></i>
                                                    Back</b></a>
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
            <?php require '../footer-admin.php'; ?>
        </div>
    </body>
<?php endif ?>
<!-- END of FORM -->