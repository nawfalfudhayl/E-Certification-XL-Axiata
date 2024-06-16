<!-- Header dan Sidebar -->
<?php
require '../header-rm.php';
?>

<!-- VALIDASI Penginputan Form Edit Data Member -->
<?php

if (isset($_SESSION['username'])):
    ?>
    <style>
        .paginate_button.current {
            background-color: #33abf6 !important;
            font-weight: bolder !important;
        }

        .scrollbar::-webkit-scrollbar {
            width: 15px;
            background-color: #e0e0e0;
        }

        .scrollbar::-webkit-scrollbar-thumb {
            border-radius: 5px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
            background-color: #c0c0c0;
            border: 1px solid #2e2d2d;
        }

        .scrollbar::-webkit-scrollbar-thumb:hover {
            border-radius: 5px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
            background-color: #adadad;
            border: 1px solid #2e2d2d;
        }
    </style>

    <body onload="zoom_auto()" class="sb-nav-fixed">
        <div id="layoutSidenav_content" style="background-color: #fafafa">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4" style="color: rgb(37, 150, 190)"><b>E-Certification<b
                                style="float: right; color: rgb(238, 62, 128)">Hi, <?php echo $row_user['Nama']; ?></b></b></h1>
                    <ol class="breadcrumb mb-4" style="font-size: 14px">
                        <li class="breadcrumb-item"><a href="../index-rm.php" style="color: #33abf6"><i
                                    class="fa fa-home"></i></a></li>
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                    <center style="margin-bottom: 2%; background-color: #5a5a5a; border-radius: 50px;">
                        <hr size="3px" color="black" style="background-color: black; border-radius: 50px;" />
                    </center>
                    <div class="card mb-4" style="border: 0,5px solid #2e2d2d">
                        <!-- <div class="card-header" style="text-align: center; background-color: #2e2d2d">
                            <i class="bi bi-journals"
                                style="margin-right: 2px; font-size: 16px; color: white; font-weight: bolder;"></i>
                            <b style="color: white">Data Kategori</b>
                        </div> -->
                        <div class="card-body tabel-mahasiswa cell-border">
                            <center>
                                <b style="color: #2e2d2d; font-size: 28px">Category of Certificates</b>
                            </center>
                            <button onclick='window.location.reload(true);' class="btn btn-danger" style="float: right"
                                title='Refresh'><b><i class="bi bi-arrow-clockwise"></i></b></button>
                            <br><br>
                            <table id="tabel" class="cell-border table-sm dataTable" cellspacing="1" width="100%"
                                style="border: 0px solid; font-size: 14px;">
                                <thead style="background-color: #164396; color: white; text-align: center;">
                                    <tr>
                                        <th style='word-wrap: break-word; width: 25px;'>No</th>
                                        <th style='word-wrap: break-word; width: 50px'>ID</th>
                                        <th style='word-wrap: break-word;'>Category</th>
                                    </tr>
                                </thead>
                                <tbody class="table-bordered table-hover"
                                    style="text-align: center; border: 1px solid #ececec;">
                                    <?php
                                    $query = "SELECT * FROM `kategori`";
                                    $result = $conn->query($query);
                                    $i = 1;
                                    while ($row = $result->fetch_object()) {
                                        echo "<tr>
                                        <td style='background-color: #D4F1F4; border: 0px solid #2e2d2d'><b>" . $i . "</b></td>
                                    <td style='background-color: #f5f5f5; word-wrap: break-word;'><b>" . $row->ID . "</b></td>
                                    <td style='word-wrap: break-word;'>" . $row->Kategori . "</td>
                                    </tr>";
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <br>
                            <a type="submit" class="btn btn-danger" href="../index-rm.php"><b><i
                                        class="fas fa-arrow-circle-left"></i> Home</b></a>
                        </div>
                    </div>
                </div>
            </main>
            <?php require '../footer-rm.php'; ?>
        </div>
    </body>
<?php endif ?>