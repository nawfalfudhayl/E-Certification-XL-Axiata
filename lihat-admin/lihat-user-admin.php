<!-- Header dan Sidebar -->
<?php
require '../header-admin.php';
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
                        <li class="breadcrumb-item"><a href="../index-admin.php" style="color: #33abf6"><i
                                    class="fa fa-home"></i></a></li>
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                    <center style="margin-bottom: 2%; background-color: #5a5a5a; border-radius: 50px;">
                        <hr size="3px" color="black" style="background-color: black; border-radius: 50px;" />
                    </center>
                    <div class="card mb-4" style="border: 0,5px solid #2e2d2d">
                        <!-- <div class="card-header" style="text-align: center; background-color: #2e2d2d">
                            <i class="bi bi-people-fill"
                                style="margin-right: 2px; font-size: 16px; color: white; font-weight: bolder;"></i>
                            <b style="color: white">Data User</b>
                        </div> -->
                        <div class="card-body tabel-mahasiswa cell-border">
                            <center>
                                <b style="color: #2e2d2d; font-size: 28px">User of E-Certification</b>
                            </center>
                            <button onclick='window.location.reload(true);' class="btn btn-danger" style="float: right"
                                title='Refresh'><b><i class="bi bi-arrow-clockwise"></i></b></button>
                            <br><br>
                            <table id="tabel" class="cell-border table-sm dataTable" cellspacing="1" width="100%"
                                style="border: 0px solid; box-shadow: 0px 0px 7px 0px rgba(0,0,0,0.75); font-size: 14px;">
                                <thead style="background-color: #164396; color: white; text-align: center;">
                                    <tr>
                                        <th style='word-wrap: break-word; width: 25px;'>No</th>
                                        <th style='word-wrap: break-word;'><label style='width: 30px;'>ID</label></th>
                                        <th style='word-wrap: break-word;'>Nama</th>
                                        <th style='word-wrap: break-word;'>Directorate</th>
                                        <th style='word-wrap: break-word;'>Division</th>
                                        <th style='word-wrap: break-word;'>Department</th>
                                        <th style='word-wrap: break-word;'>Access</th>
                                        <th style='word-wrap: break-word;'>Username</th>
                                        <th style='word-wrap: break-word;'>E-mail</th>
                                        <th style='word-wrap: break-word;'>Phone Number</th>
                                    </tr>
                                </thead>
                                <tbody class="table-bordered table-hover"
                                    style="text-align: center; border: 1px solid #ececec;">
                                    <?php
                                    $query = "SELECT * FROM `user`";
                                    $result = $conn->query($query);
                                    $i = 1;
                                    while ($row = $result->fetch_object()) {
                                        echo "<tr>
                                        <td style='background-color: #D4F1F4; border: 0px solid #2e2d2d'><b>" . $i . "</b></td>
                                    <td style='background-color: #f5f5f5; word-wrap: break-word;'><b>" . $row->IdUser . "</b></td>
                                    <td style='word-wrap: break-word;'>" . $row->Nama . "</td>
                                    <td style='word-wrap: break-word;'>" . $row->Directorate . "</td>
                                    <td style='word-wrap: break-word;'>" . $row->Division . "</td>
                                    <td style='word-wrap: break-word;'>" . $row->Department . "</td>
                                    <td style='word-wrap: break-word;'>
                                        " . $row->Akses . "
                                        <form action='../edit-admin/edit-user-admin.php?name=" . $row->IdUser . "' method='GET'>
                                            <input type='hidden' name='ID' value='" . $row->ID . "'>
                                            <input type='submit' class='btn btn-default' style='background-color: transparent; border: 0px solid' name='submit' value='📝' title='Edit Akses User ini'>
                                        </form>
                                    </td>
                                    <td style='word-wrap: break-word;'>" . $row->username . "</td>
                                    <td style='word-wrap: break-word;'>" . $row->Email . "</td>
                                    <td style='word-wrap: break-word;'>" . $row->Telp . "</td>
                                    ";
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <br>
                            <a type="submit" class="btn btn-danger" href="../index-admin.php"><b><i
                                        class="fas fa-arrow-circle-left"></i> Home</b></a>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function () {
                            $('#tabel').DataTable({
                                scrollX: true,
                                scrollY: '525px',
                                scrollCollapse: true,
                                "language": {
                                    "emptyTable": "<b>--</b> <em style='font-weight: lighter; font-size: 16px'>Empty</em> <b>--</b>",
                                    "info": "<em style='font-size: 14px;'><i class='bi bi-caret-right-fill' style='color: rgb(37, 150, 190)'></i> &nbsp;-- Showing <b>_START_</b> to <b>_END_</b> of <b>_TOTAL_</b> entries --</em>",
                                    "infoFiltered": "<b style='font-size: 14px'>(Difilter dari Total <a style='color: red'>_MAX_</a> Data)</b>",
                                    "paginate": {
                                        "first": "<a style='font-size: 20px;'><b>⇇</b></a>",
                                        "last": "<a style='font-size: 20px;'><b>⇉</b></a>",
                                        "next": "<a style='font-size: 20px;'><b>→</b></a>",
                                        "previous": "<a style='font-size: 20px;'><b>←</b></a>"
                                    },
                                    "zeroRecords": "<em>Data Not Found</em>",
                                    "infoEmpty": "<em style='font-size: 14px;'><i class='bi bi-caret-right-fill' style='color: rgb(37, 150, 190)'></i> &nbsp;-- Data Not Available --</em>",
                                    "lengthMenu": "<a style='font-size: 14px;'><i class='bi bi-caret-right-fill' style='color: rgb(37, 150, 190)'></i> &nbsp;<b>Show _MENU_ entries</b></a>",
                                    "search": "<i class='bi bi-caret-right-fill' style='color: rgb(37, 150, 190)'></i> &nbsp;<a style='font-size: 18px;'><b><i class='fas fa-search'></i></b> </a>"
                                },
                                "columnDefs": [
                                    { "orderable": false, "targets": [1, 2, 3, 4] },
                                    { "orderable": true, "targets": [0] },
                                    { "targets": [0, 1, 2, 3, 4], "className": "dt-head-center" }
                                ],
                                "initComplete": function (settings, json) {
                                    $('body').find('.dataTables_scrollBody').addClass("scrollbar");
                                }
                            });
                        });
                    </script>
                    <script type="text/javascript">
                        function zoom_auto() {
                            document.body.style.zoom = "100%"
                        }
                    </script>
                </div>
            </main>
            <?php require '../footer-admin.php'; ?>
        </div>
        </div>
    </body>
<?php endif ?>