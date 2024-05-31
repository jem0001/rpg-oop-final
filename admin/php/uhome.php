<?php
include('../../class/DbFileManager');
$dbFileManager = new DbFileManager();
$db = $dbFileManager->connection;


$query = "SELECT * FROM home_setup";

$queryrun = mysqli_query($db, $query);
$data = mysqli_fetch_array($queryrun);

$target_dir = "../../assets/img/";

if (isset($_POST['save'])) {

    $profilepic = $_FILES['profile']['name'];
    $homewallpaper = $_FILES['cover']['name'];

    if ($profilepic == "") {
        $profilepic = $data['profilepic'];
    } else {
        $pdone = $dbFileManager->Upload('profile', $target_dir);
    }

    if ($homewallpaper == "") {
        $homewallpaper = $data['homewallpaper'];
    } else {
        $cdone = $dbFileManager->Upload('cover', $target_dir);
    }


    $name = $dbFileManager->escape_string($_POST['name']);

    $netlify = $dbFileManager->escape_string($_POST['netlify']);
    $github = $dbFileManager->escape_string($_POST['github']);





    if ($pdone == "error") {
        header("location:../?edithome=true&msg=error");
    } else if ($cdone == "error") {
        header("location:../?edithome=true&msg=error");
    } else {
        $query = "UPDATE home_setup SET ";
        $query .= "profilepic='$profilepic',";
        $query .= "name='$name',";

        $query .= "netlify='$netlify',";
        $query .= "github='$github',";
        $query .= "homewallpaper='$homewallpaper' ";
        $query .= "WHERE 1";
        echo $query;
        $queryrun = mysqli_query($db, $query);
        if ($queryrun) {
            header("location:../?edithome=true&msg=updated");
        }
    }
}
