<?php
include('../../class/DbFileManager');
$dbFileManager = new DbFileManager();
$db = $dbFileManager->connection;


$id = $_POST['id'];
$query = "SELECT * FROM settings WHERE id='$id'";

$queryrun = mysqli_query($db, $query);
$data = mysqli_fetch_array($queryrun);

$target_dir = "../../assets/img/";

if (isset($_POST['supdate'])) {
    $settpic = $_FILES['settpic']['name'];
    if ($settpic == "") {
        $settpic = $data['settpic'];
    } else {
        $pdone = $dbFileManager->Upload('settpic', $target_dir);
    }


    $settname = $dbFileManager->escape_string($_POST['settname']);


    if ($pdone == "error") {
        header("location:../?edithome=true&msg=error");
    } else {
        $query = "UPDATE settings SET ";
        $query .= "settpic='$settpic',";
        $query .= "settname='$settname'";
        $query .= "WHERE id='$id'";
        echo $query;
        $queryrun = mysqli_query($db, $query);
        if ($queryrun) {
            header("location:../?editsettings=true#done");
        }
    }
}

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $query = "DELETE FROM settings WHERE id='$id'";
    $queryrun = mysqli_query($db, $query);
    if ($queryrun) {
        header("location:../?editsettings=true#done");
    }
}


if (isset($_POST['addtosettings'])) {
    $settpic = $_FILES['settpic']['name'];
    if ($settpic == "") {
        $settpic = $data['settpic'];
    } else {
        $pdone = $dbFileManager->Upload('settpic', $target_dir);
    }


    $settname = $dbFileManager->escape_string($_POST['settname']);


    if ($pdone == "error") {
        header("location:../?editsettings=true&msg=error");
    } else {
        $query = "INSERT INTO settings (settname,settpic) ";
        $query .= "VALUES ('$settname','$settpic')";
        $queryrun = mysqli_query($db, $query);
        if ($queryrun) {
            header("location:../?editsettings=true&msg=updated");
        }
    }
}
