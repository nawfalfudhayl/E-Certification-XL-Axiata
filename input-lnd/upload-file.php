<?php
session_start();
include("../config.php");
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST['save_excel_data'])) {
    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls', 'csv', 'xlsx'];

    if (in_array($file_ext, $allowed_ext)) {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = "0";
        foreach ($data as $row) {
            if ($count > 0) {
                $IdUser = $row['0'];
                $Nama = $row['1'];
                $Email = $row['2'];
                $Directorate = $row['3'];
                $Division = $row['4'];
                $Department = $row['5'];
                $NamaSertif = $row['6'];
                $IssuedBy = $row['7'];
                $SertifID = $row['8'];
                $Filee = $row['9'];
                $TglTerbit = $row['10'];
                $TglExp = $row['11'];
                $Kategori = $row['12'];
                $Deskripsi = $row['13'];
                $CreatedAt = $row['14'];
                $CreatedBy = $_SESSION['username'];
                $TglEdit = $row['15'];
                $ApprovedBy = $row['16'];

                $employeeQuery = "INSERT INTO `sertif`(`IdUser`, `Nama`, `Email`, `Directorate`, `Division`, `Department`, `NamaSertif`, `IssuedBy`, `SertifID`, `Filee`, `TglTerbit`, `TglExp`, `Kategori`, `Deskripsi`, `CreatedAt`, `CreatedBy`, `TglEdit`, `ApprovedBy`) VALUES('$IdUser', '$Nama', '$Email', '$Directorate', '$Division', '$Department', '$NamaSertif', '$IssuedBy', '$SertifID', '$Filee', '$TglTerbit', '$TglExp', '$Kategori', '$Deskripsi', NOW(), '$CreatedBy', '$TglEdit', '$ApprovedBy')";
                $result = $conn->query($employeeQuery);
                $msg = true;
            } else {
                $count = "1";
            }
        }

        if (isset($msg)) {
            $_SESSION['message'] = "Successfully Imported";
            header('Location: bulk-upload-lnd.php');
            exit(0);
        } else {
            $_SESSION['message'] = "Not Imported";
            header('Location: bulk-upload-lnd.php');
            exit(0);
        }
    } else {
        $_SESSION['message'] = "Invalid File";
        header('Location: bulk-upload-lnd.php');
        exit(0);
    }

}
?>