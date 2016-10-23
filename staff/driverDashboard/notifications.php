<?php
    session_start();
    include("../../dbTools/dbConnect.php");

    $notificationResult = $dbConnection->prepare('SELECT * FROM notifications WHERE notificationFor = :email ORDER BY notificationDate DESC');
    $notificationResult->bindParam(':email', $_SESSION['username']);
    $notificationResult->execute();
?>

<!doctype html>
<html lang="en">
<head>
    <title>Notifications</title>

    <?php include("includes/styling_scripts/meta.html"); ?>
    <?php include("includes/styling_scripts/css.html"); ?>
    <?php include("includes/styling_scripts/fonts-icons.html"); ?>
    <?php include("includes/styling_scripts/javascript.html"); ?>
</head>
<body>

<div class="wrapper">
    <?php include("includes/sidebar.html"); ?>

    <div class="main-panel">
        <?php include("includes/navbar-mobile-open.html"); ?>
        <a class="navbar-brand">Notifications</a>
        <?php include("includes/navbar-mobile-close.html"); ?>

        <div class="content">

            <div class="container-fluid">
                <table class="table" style="margin-top: 10px">
                    <thead>
                        <tr>
                            <th class='col-md-1'>Date</th>
                            <th class='col-md-2'>From</th>
                            <th class='col-md-9'>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($notificationResult as $notification)
                        {
                            echo '<tr>';
                                echo '<td>';
                                    //echo $notification['notificationDate'];
                                    $date = date("d/m/Y", strtotime($notification['notificationDate']));
                                    echo $date;

                                echo '</td>';
                                echo '<td>';
                                    echo $notification['notificationFrom'];
                                echo '</td>';
                                echo '<td>';
                                    echo $notification['notificationDescription'];
                                echo '</td>';
                            echo '</tr>';
                        }
                    echo '</tbody>
                    </table>';
                ?>

                <br /><br />


            </div>
        </div>


        <?php include("includes/footer.html"); ?>

    </div>
</div>
</body>


</html>
