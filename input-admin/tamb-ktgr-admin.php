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

    if (isset($_POST["tambah"]))
    {
        $valid = TRUE;

        /* Data Input dan Data Lainnya */
        // Kategori Dokumen
        $ktgr3 = test_input($_POST['inputktgr3']);
        // Cek Data Kategori Dokumen
        $resultambil = mysqli_query($conn, "SELECT * FROM kategori WHERE Kategori='$ktgr3'");
        /* END */

        /* Validasi Data 1 */
        // Kategori Dokumen
        if (empty($_POST['inputktgr3']))
        {
            $error_ktgr3 = "*Kategori Sertif wajib diisi!";
            $valid       = FALSE;
        }
        elseif (mysqli_num_rows($resultambil) > 0)
        {
            $error_ktgr3 = "*Kategori Sertif ini sudah ada dalam database! Masukkan yang baru!";
            $valid       = FALSE;
        }
        /* END */

        /* Validasi Data 1 */
        // Jika Data Valid
        if ($valid)
        {
            $result = mysqli_query($conn, "INSERT INTO kategori (Kategori) VALUES('$ktgr3')");

            // Jika Insert Gagal
            if (!$result)
            {
                die("Tidak bisa menyelesaikan query </br>" . $conn->$error . "</br> Query:" . $result);
            }
            // Jika Insert Berhasil
            else
            {
                $message = "Berhasil Menginput Data!";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }
        // Jika Data Tidak Valid
        else
        {
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
                    <h1 class="mt-4" style="color: rgb(37, 150, 190)"><b>E-Certificate<b
                                style="float: right; color: rgb(238, 62, 128)">Hi, <?php echo $row_user['Nama']; ?></b></b></h1>
                    <ol class="breadcrumb mb-4" style="font-size: 14px">
                        <li class="breadcrumb-item"><a href="../index-admin.php" style="color: #33abf6"><i
                                    class="fa fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="../lihat-admin/lihat-ktgr-admin.php" style="color: #33abf6">Category</a>
                        </li>
                        <li class="breadcrumb-item active">Add New Category</li>
                    </ol>
                    <center style="margin-bottom: 2%; background-color: #5a5a5a; border-radius: 50px;">
                        <hr size="3px" color="black" style="background-color: black; border-radius: 50px;" />
                    </center>
                </div>
                <div class="container-fluid" style="width: 35%;">
                    <h3 class="my-3" style="color: #2e2d2d">Add New Category of Certificates</h3>
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
                                            <div class="row mb-3">
                                                <label for="inputktgr3"><b>Category of Certificates</b></label>
                                                <div class="col-sm-14">
                                                    <input type="text" class="form-control" id="inputktgr3"
                                                        name="inputktgr3" value="<?php if (isset($ktgr3))
                                                            echo $ktgr3; ?>">
                                                    <div class="error" style="color:red; font-size: 12px;">
                                                        <?php if (isset($error_ktgr3))
                                                            echo $error_ktgr3; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <a type="submit" class="btn btn-danger" href="../lihat-admin/lihat-ktgr-admin.php"
                                                style="float: left;"><b><i class="fas fa-arrow-circle-left"></i>
                                                    Back</b></a>
                                            <button type="submit" name="tambah" value="tambah" class="btn btn-success"
                                                style="float: right;"><b>+ Add New</b></button>
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