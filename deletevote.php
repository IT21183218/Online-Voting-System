<?php

include('db/dbconnection.php');
$C_ID = $_GET['a'];
$V_ID = $_GET['b'];
$sqll = mysqli_query($con, "DELETE FROM voting_server WHERE C_ID='$C_ID' && V_ID='$V_ID'");
if ($sqll) {
    echo "<script>alert('Successful');</script>";
    header('location:crudvote.php');
} else {
    echo "<script>alert('Invalid Details');</script>";
    header('location:crudvote.php');
}
?>

