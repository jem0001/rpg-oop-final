<?php
include('../../class/DbFileManager');
$dbFileManager = new DbFileManager();
$db = $dbFileManager->connection;

$id = $_POST['id'];
$query = "SELECT * FROM characters WHERE id='$id'";

$queryrun = mysqli_query($db, $query);
$data = mysqli_fetch_array($queryrun);

$target_dir = "../../assets/img/";

if (isset($_POST['uupdate'])) {
    $charpic = $_FILES['charpic']['name'];
    if ($charpic == "") {
        $charpic = $data['charpic'];
    } else {
        $pdone = $dbFileManager->Upload('charpic', $target_dir);
    }


    $charname = $dbFileManager->escape_string($_POST['charname']);


    if ($pdone == "error") {
        header("location:../?edithome=true&msg=error");
    } else {
        $query = "UPDATE characters SET ";
        $query .= "charpic='$charpic',";
        $query .= "charname='$charname'";
        $query .= "WHERE id='$id'";
        echo $query;
        $queryrun = mysqli_query($db, $query);
        if ($queryrun) {
            header("location:../?editcharacters=true#done");
        }
    }
}

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $query = "DELETE FROM characters WHERE id='$id'";
    $queryrun = mysqli_query($db, $query);
    if ($queryrun) {
        header("location:../?editcharacters=true#done");
    }
}


if (isset($_POST['addtocharacters'])) {
    $charpic = $_FILES['charpic']['name'];
    if ($charpic == "") {
        $charpic = $data['charpic'];
    } else {
        $pdone = $dbFileManager->Upload('charpic', $target_dir);
    }


    $charname = $dbFileManager->escape_string($_POST['charname']);


    if ($pdone == "error") {
        header("location:../?editcharacters=true&msg=error");
    } else {
        $query = "INSERT INTO characters (charname,charpic) ";
        $query .= "VALUES ('$charname','$charpic')";
        $queryrun = mysqli_query($db, $query);
        if ($queryrun) {
            header("location:../?editcharacters=true&msg=updated");
        }
    }
}
