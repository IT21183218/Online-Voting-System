<?php
include('db/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/crudvote.css">
    </head>
    <body>
        <div class="row">
            <div class="column">
                <h2 style="text-align: center;text-decoration-line: underline;text-decoration-style: solid;">Dashboard Vote</h2>
            </div>
</div>
        <div class="row">
            <div class="column">
                <table id="customers">
                    <tr>
                        <th>Candidate ID</th>
                        <th>Candidate</th>
                        <th>Voter ID</th>
                        <th>Voter</th>
                        <th>Count</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    $sqlsds = mysqli_query($con, "SELECT * from voting_server");
                    while ($row = mysqli_fetch_array($sqlsds)) {
                        ?> 
                        <tr>
                            <td><?php echo $row['C_ID'] ?></td>
                            <?php
                            $id=$row['C_ID'];
                            $sqlsdss = mysqli_query($con, "SELECT * from candidate where C_ID='$id'");
                            $rows = mysqli_fetch_array($sqlsdss);
                            if($rows>0) {
                                ?>
                            <td><?php echo $rows['F_Name'] . ' ' . $rows['L_Name'] ?></td>
                            <?php } ?>
                            <td><?php echo $row['V_ID'] ?></td>
                            <?php
                            $id=$row['V_ID'];
                            $sqlsdss = mysqli_query($con, "SELECT * from voter where V_ID='$id'");
                            $rows = mysqli_fetch_array($sqlsdss);
                            if($rows>0) {
                                ?>
                                <td><?php echo $rows['F_Name'] . ' ' . $rows['L_Name'] ?></td>
                            <?php } ?>
                                <td><?php echo $row['Votes_Count'] ?></td>
                                <td><a class="button button1" href="deletevote.php?a=<?php echo $row['C_ID'] ?>&b=<?php echo $row['V_ID'] ?>">Delete</a></td>
                            </tr>
                        <?php } ?>


                </table>


            </div>

        </div>

    </body>
</html>


