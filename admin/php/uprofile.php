<?php
session_start();
include('../../class/DbFileManager');
$dbFileManager = new DbFileManager();
$db = $dbFileManager->connection;

if (isset($_POST['uprofile'])) {
    $name = $dbFileManager->escape_string($_POST['username']);
    $password = $dbFileManager->escape_string($_POST['userpass']);
    $email = $dbFileManager->escape_string($_POST['userid']);
    $query = "UPDATE admin_users SET ";
    $query .= "username='$name',";
    $query .= "user_pass='$password',";
    $query .= "user_id='$email' WHERE 1";
    echo $query;
    $queryrun = mysqli_query($db, $query);
    if ($queryrun) {
        $_SESSION['username'] = $name;
        header("location:../?editprofile=true&msg=updated");
    }
}
