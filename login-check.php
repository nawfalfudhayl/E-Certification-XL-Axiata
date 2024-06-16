<?php
require 'config.php';

// username, email, and password sent from form 
$username = 'user';
$userr    = $_POST['username'];
$password = $_POST['password'];

// Protect MySQL injection
$userr    = stripslashes($userr);
$password = stripslashes($password);
$userr    = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Admin or LnD Team or Employee or RM Team
$result = mysqli_query($conn, "SELECT * FROM $username  WHERE username='$userr' and passwordu='$password'");
$akses  = mysqli_fetch_object($result);
$count  = mysqli_num_rows($result);


// If result matched $email and $password, table row must be 1 row
if ($count == 1 and $apakahada <= 0)
{
    // Register $username, $email, and $password and redirect to each of their own index file
    session_start();
    $_SESSION["password"] = $password;
    $_SESSION["username"] = $userr;

    if ($akses->Akses == 'LnD Team')
    {
        header("location:index-lnd.php");
    }
    else if ($akses->Akses == 'Admin')
    {
        header("location:index-admin.php");
    }
    else if ($akses->Akses == 'Employee')
    {
        header("location:index-employee.php");
    }
    else if ($akses->Akses == 'RM Team')
    {
        header("location:index-rm.php");
    }
    else if ($akses->Akses == 'Chief')
    {
        header("location:index-chief.php");
    }
    else if ($akses->Akses == 'Group Head')
    {
        header("location:index-gh.php");
    }
}