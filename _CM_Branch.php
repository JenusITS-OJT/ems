<?php
require ("_Connection.php");

    $msg="";
    $id = mysqli_real_escape_string($con, $_GET['id']);
    $address = mysqli_real_escape_string($con, $_GET['address']);
    $contactno = mysqli_real_escape_string($con, $_GET['contactno']);
    $email = mysqli_real_escape_string($con, $_GET['email']);
    $datepicker = mysqli_real_escape_string($con, $_GET['datepicker2']);
    $status = mysqli_real_escape_string($con, $_GET['status']);

//Add

if(empty($id)){
    $msg = "Added";
    $sql="INSERT INTO `branch`
            (
             `Address`,
             `Contact_No`,
             `Email`,
             `Date_Established`,
             `Status`)
                VALUES (
                        '$address',
                        '$contactno',
                        '$email',
                        '$datepicker',
                        '$status'
                        );";
        $stm = mysqli_query($con, $sql);
        myResponse($stm,$msg);
                 }

if(!empty($id)){
        $msg = "Updated";
        $sql="UPDATE `branch`
                SET 
                  `Address` = '$address',
                  `Contact_No` = '$contactno',
                  `Email` = '$email',
                  `Date_Established` = '$datepicker',
                  `Status` = '$status'
                WHERE `id` = '$id';";
        $stm = mysqli_query($con, $sql);
        myResponse($stm, $msg);
    }

function myResponse($stm, $msg){
            if($stm)
            {   
                $msg .= " SUCCESSFULLY!";
                header("Location: CM_Branch.php?id=success&msg=$msg");
            }
            else
            {
                $msg .= " FAILED!";
                header("Location: CM_Branch.php?id=failed&msg=$msg");
            }  
}

mysqli_commit($con); 
?>