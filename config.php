<?php
$server   = "localhost";
$user     = "root";
$pass     = "";
$database = "e-certificate";

$conn     = mysqli_connect($server, $user, $pass, $database);

if ($conn->connect_errno)
{
    die("<script>alert('Gagal tersambung dengan database.')</script>" . $conn->connect_error);
}
?>