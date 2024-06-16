<!-- Header dan Sidebar -->
<?php
session_start();
error_reporting(0);
require '../header-lnd.php';
?>

<body onload="zoom_auto()" class="sb-nav-fixed">
    <div id="layoutSidenav_content" style="background-color: #fafafa">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4" style="color: rgb(37, 150, 190)"><b>E-Certification<b
                            style="float: right; color: rgb(238, 62, 128)">LnD Team</b></b></h1>
                <ol class="breadcrumb mb-4" style="font-size: 14px">
                    <li class="breadcrumb-item"><a href="../index-lnd.php" style="color: #33abf6"><i
                                class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="../lihat-lnd/lihat-sertif-lnd.php"
                            style="color: #33abf6">Certificates</a></li>
                    <li class="breadcrumb-item"><a href="../input-lnd/tamb-sertif-lnd.php" style="color: #33abf6">Add New</a></li>
                    <li class="breadcrumb-item active">Bulk Upload</li>
                </ol>
                <center style="margin-bottom: 2%; background-color: #5a5a5a; border-radius: 50px;">
                    <hr size="3px" color="black" style="background-color: black; border-radius: 50px;" />
                </center>
                <div class="card mb-4" style="border: 0,5px solid #2e2d2d">
                    <div class="card-body tabel-mahasiswa cell-border">
                        <a type="submit" class="btn btn-primary" href="sample.xlsx"
                            style="float: right;"><b>Download
                                Sample</b></a>
                        <center>
                            <b style="color: #2e2d2d; font-size: 28px">Bulk Upload</b>
                        </center>
                        <style>
                            .upload-btn-wrapper input[type=file] {
                                opacity: 0;
                            }
                        </style>
                        <div class="card-body">
                            <div class="col">
                                <?php
                                if (isset($_SESSION['message'])) {
                                    echo "<h4>" . $_SESSION['message'] . "</h4>";
                                    unset($_SESSION['message']);
                                }
                                ?>
                                <form action="upload-file.php" method="POST" enctype="multipart/form-data">
                                    <input type="file" name="import_file" class="form-control" />
                                    <button type="submit" name="save_excel_data" class="btn btn-primary mt-3"
                                        style="float: right;">Import</button>
                                </form>
                            </div>
                            <br>
                            <a type="submit" class="btn btn-danger" href="../input-lnd/tamb-sertif-lnd.php"
                                style="float: left;"><b><i class="fas fa-arrow-circle-left"></i>
                                    Back</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php require '../footer-lnd.php'; ?>
    </div>
    <script type="text/javascript">
        function validateForm() {
            var fileInput = document.getElementById("myFile");
            var eventNameInput = document.getElementsByName("event_name")[0];
            var dateInput = document.getElementsByName("date")[0];
            var eventTypeInput = document.getElementsByName("eventType")[0];

            if (fileInput.files.length === 0 || eventNameInput.value === "" || dateInput.value === "" || eventTypeInput.value === "") {
                alert("Please fill out all fields and select a file.");
                return false;
            }
            return true;
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>