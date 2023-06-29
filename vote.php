<?php
session_start();
error_reporting(0);
include('db/dbconnection.php');
$_SESSION['login'] = 1100;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/vote.css">

    </head>
    <body>
        <?php
        include('header.php');
        ?>
        <div class="row">

            <div class="rightcolumn">
                <div class="card" style="align-content: center;align-items: center;text-align: center" >
                    <h2 style="text-align: center;text-decoration-line: underline;text-decoration-style: solid;padding-bottom: 20px;">How to Vote</h2>

                    <img src="img/howto.png" style="width: 50%">
                </div>

            </div>
            <div class="leftcolumn">
                <div class="card" style="align-content: center">
                    <h2 style="text-align: left;text-decoration-line: underline;text-decoration-style: solid;padding-bottom: 20px">Voting List</h2>
                    <?php
                    $sqlsds = mysqli_query($con, "SELECT * from candidate");
                    while ($row = mysqli_fetch_array($sqlsds)) {
                        ?> 
                        <div class="vote">

                            <a>
                                <img src="img/user.png" alt="Cinque Terre" width="100%">
                            </a>
                            <div class="desc" style="padding-bottom: 10px"><?php echo $row['F_Name'] . ' ' . $row['L_Name']; ?></div>
                            <?php
                            if (isset($_SESSION['login'])) {
                                $id = $_SESSION['login'];
                                ?>
                                <a style="cursor: pointer" href="voteadd.php?a=<?php echo $row['C_ID'] ?>&b=<?php echo $id ?>" class="button button2">Vote Now</a>
                            <?php } else { ?>
                                <button style="cursor: pointer" onclick="myFunction()" class="button button2">Vote Now</button>
                            <?php } ?>
                        </div>
                    <?php } ?>




                </div>


            </div>
        </div>
        <div style="padding-top: 20px"></div>
        <?php
        include('footer.php');
        ?>

        <script>
            function myFunction() {
                alert("Please Login first");
            }
        </script>
    </body>
</html>
