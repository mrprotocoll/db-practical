<?php
include("conn.php");
$action = $_GET['action'];
$id = $_GET['id'];
$entry = @$_POST["entry"];
$program = @$_POST["program"];
$matric = @$_POST["matric"];
$firstname = @$_POST["firstname"];
$lastname = @$_POST["lastname"];
$level = @$_POST["level"];
switch ($action){
    
    case "new":
        $sql = "INSERT into student(matric_no,firstname,lastname,`level`,`entry_year`,program) VALUES ('$matric','$firstname','$lastname','$level','$entry','$program')";

        $query = mysqli_query($connect,$sql);
        if($query){
            header("Location:./");
        }
    break;

    case "update":
        $sql = "UPDATE student SET firstname = '$firstname',lastname = '$lastname',`level` = '$level',`entry_year` = '$entry',program = '$program' WHERE matric_no = '$matric'";
        // echo $sql;exit;
        $query = mysqli_query($connect,$sql);
        if($query){
            
            header("Location:./");
        }
    break;

    case "del":
        $sql = "DELETE FROM student WHERE id = '$id'";
        // echo $sql;exit;
        $query = mysqli_query($connect,$sql);
        if($query){
            header("Location:./");
        }
    break;
}

?>

