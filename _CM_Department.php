<?php
require ("_Connection.php");

    $msg="";
    $id = $_GET['id']; 
    $department = mysqli_real_escape_string($con, $_GET['department']);
    $description = mysqli_real_escape_string($con, $_GET['description']);
    $status = mysqli_real_escape_string($con, $_GET['status']);

//Add

if(empty($id)){
    $msg = "Added";
    $sql="INSERT INTO `department`
            (
             `Dept_Name`,
             `Functions`,
             `Status`)
                VALUES (
                        '$department',
                        '$description',
                        '$status');";
        $stm = mysqli_query($con, $sql);
        myResponse($stm,$msg);
                 }

if(!empty($id)){
        $msg = "Updated";
        $sql="UPDATE `department`
                SET 
                  `Dept_Name` = '$department',
                  `Functions` = '$description',
                  `Status` = '$status'
                WHERE `id` = '$id';";
        $stm = mysqli_query($con, $sql);
        myResponse($stm, $msg);
    }

function myResponse($stm, $msg){
            if($stm)
            {   
                $msg .= " SUCCESSFULLY!";
                header("Location: CM_Department.php?id=success&msg=$msg");
            }
            else
            {
                $msg .= " FAILED!";
                header("Location: CM_Department.php?id=success&msg=$msg");
            }  
}

mysqli_commit($con); 
?>