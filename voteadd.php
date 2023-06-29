<?php

include('db/dbconnection.php');
$C_ID = $_GET['a'];
$V_ID = $_GET['b'];
$sqlsds = mysqli_query($con, "SELECT * from voting_server where C_ID='$C_ID' && V_ID='$V_ID'");
$row = mysqli_fetch_array($sqlsds);
if ($row > 0) {
    $count = $row['Votes_Count'];
    $count = $count + 1;
    $sqll = mysqli_query($con, "UPDATE voting_server SET Votes_Count='$count'  where C_ID='$C_ID' && V_ID='$V_ID'");
    if ($sqll) {
        echo "<script>alert('Successful');</script>";
        header('location:vote.php');
    } else {
        echo "<script>alert('Invalid Details');</script>";
        header('location:vote.php');
    }
} else {
    $sqll = mysqli_query($con, "insert into voting_server values('$C_ID','$V_ID','1')");
    if ($sqll) {
        echo "<script>alert('Successful');</script>";
        header('location:vote.php');
    } else {
        echo "<script>alert('Invalid Details');</script>";
        header('location:vote.php');
    }
}
?>
