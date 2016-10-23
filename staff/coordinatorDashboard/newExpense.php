<?php
    session_start();
    include("../../dbTools/dbConnect.php");
    date_default_timezone_set('Australia/Brisbane');
	include("checkLogin.php");

    $expenseDate = $_POST["expenseDate"];
    $expenseAmount = $_POST["expenseAmount"];
    $expenseDescription = $_POST["expenseDescription"];
    $expenseIncurredBy = $_POST["expenseIncurredBy"];
    $expenseApprovedBy = $_POST["expenseApprovedBy"];

    $formattedDate = date ("Y-m-d H:i:s", $expenseDate);
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
        <a class="navbar-brand">New Expense</a>
        <?php include("includes/navbar-mobile-close.html"); ?>

        <div class="content">

            <div class="container-fluid">
                
                <?php
                    $errorsExist = false;
                    if(isset($expenseDate) && isset($expenseAmount) && isset($expenseDescription) && isset($expenseIncurredBy) && isset($expenseApprovedBy)){

                        if($errorsExist){
                            include ("newExpenseForm.php");
                        } else{
                            $dateExploded = explode('/', $expenseDate);
                            $dateFormatted = "$dateExploded[2]-$dateExploded[1]-$dateExploded[0]";
                            
                            $addExpense = $dbConnection->prepare("INSERT INTO expenses (expenseID, expenseDescription, expenseIncurredBy, expenseDate, expenseAmount, expenseApprovedBy)VALUES (DEFAULT, :expenseDescription, :expenseIncurredBy, :expenseDate, :expenseAmount, :expenseApprovedBy)");

                            $addExpense->bindParam(':expenseDescription', $expenseDescription);
                            $addExpense->bindParam(':expenseIncurredBy', $expenseIncurredBy);
                            $addExpense->bindParam(':expenseDate', $dateFormatted);
                            $addExpense->bindParam(':expenseAmount', $expenseAmount);
                            $addExpense->bindParam(':expenseApprovedBy', $expenseApprovedBy);

                            try {
                                $addExpense->execute(); //Executes $addBooking - adds the data into the database

                            } catch(Exception $error) {
                                echo 'Exception -> ';
                                var_dump($error->getMessage());
                            }

                            header("Location: expenses.php");
                            exit();
                        }
                    } else {
                        include ("newExpenseForm.php");
                    }
                ?>

            </div>
        </div>


        <?php include("includes/footer.html"); ?>

    </div>
</div>
</body>
<script type="text/javascript">
    function enableDate(){
        document.getElementById('expenseDate').disabled = false;
    }

    function enableDateForSubmit(){
        document.getElementById('expenseDate').disabled = false;
    }
</script>

</html>
