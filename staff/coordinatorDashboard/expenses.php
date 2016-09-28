<?php
    session_start();
    include("../../dbTools/dbConnect.php");

    $expenseData = $dbConnection->prepare('SELECT * FROM expenses ORDER BY expenseDate DESC');
    $expenseData->execute();
?>

<!doctype html>
<html lang="en">
<head>
    <title>Expenses</title>

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
                            <th class='col-md-1'>Amount</th>
                            <th class='col-md-4'>Description</th>
                            <th class='col-md-1'>Incured By</th>
                            <th class='col-md-1'>Approved By</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($expenseData as $expense) {
                            echo '<tr>';
                                echo '<td>';
                                    $date = date("d/m/Y", strtotime($expense['expenseDate']));
                                    echo $date;

                                echo '</td>';
                                echo '<td>';
                                    echo $expense['expenseAmount'];
                                echo '</td>';
                                echo '<td>';
                                    echo $expense['expenseDescription'];
                                echo '</td>';
                                echo '<td>';
                                    echo $expense['expenseIncurredBy'];
                                echo '</td>';
                                echo '<td>';
                                    echo $expense['expenseApprovedBy'];
                                echo '</td>';
                            echo '</tr>';
                        }
                    echo '</tbody>
                    </table>';
                ?>

                <br /><br />
                <button type="button" class="btn btn-warning" onclick="newExpense()">New Expense</button>


            </div>
        </div>


        <?php include("includes/footer.html"); ?>

    </div>
</div>
</body>

<script type="text/javascript">
    function newExpense(){
        window.location.href = "newExpense.php";
    }
</script>


</html>
