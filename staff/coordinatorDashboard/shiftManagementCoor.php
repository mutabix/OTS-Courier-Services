<?php
    include("../../dbTools/dbConnect.php");
    include("checkLogin.php");

    session_start();

    $employees = $dbConnection->prepare('SELECT * FROM employees WHERE employeeStatus=0 ORDER BY employeeID ASC');
    $employees->bindParam(':employeeID', $_SESSION['employeeID']);
    try {
        $employees->execute();
    } catch(Exception $error) {
        echo 'Exception -> ';
        var_dump($error->getMessage());
    }


?>

<!doctype html>
<html lang="en">
<head>
	<title>Shift Management</title>

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
        <a class="navbar-brand" href="#">Shift Management</a>
        <?php include("includes/navbar-mobile-close.html"); ?>


        <div class="content">
            <div class="container-fluid">
            <form action="updateShifts.php" method="POST">
              <?php
                $employeeCount = 0;
                $employeeArray = array();

                foreach($employees as $employee){
                  $employeeArray[$employeeCount] = $employee['employeeID'];
                  $_SESSION['employeeCount'] = $employeeCount;

                  echo "<h4>".$employee['firstName']." ".$employee['lastName']." (ID: ".$employee['employeeID'].")</h4>";
                    $shiftInfo = $dbConnection->prepare('SELECT * FROM Shift_Management WHERE employeeID=:employeeID LIMIT 1');
                    $shiftInfo->bindParam(':employeeID', $employee['employeeID']);
                    try {
                        $shiftInfo->execute();
                    } catch(Exception $error) {
                        echo 'Exception -> ';
                        var_dump($error->getMessage());
                    }
                    $shift = $shiftInfo->fetch();
                  echo "<table class='table table-hover'>";
          			echo "<thead>";
          			  echo "<tr>";
                        echo "<th>Week</th>";
                        echo "<th>Monday</th>";
                        echo "<th>Tuesday</th>";
                        echo "<th>Wednesday</th>";
                        echo "<th>Thursday</th>";
                        echo "<th>Friday</th>";
                      echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                      echo "<tr>";
                        echo "<td>Week 1</td>";
                        echo "<td>";
                            echo "<select name='cur_Mon-".$employee['employeeID']."'>";
                                if($shift['cur_Mon']){
                                    echo "<option selected value=1>Working</option>";
                                    echo "<option value=0>Not Working</option>";
                                } else {
                                    echo "<option value=1>Working</option>";
                                    echo "<option selected value=0>Not Working</option>";
                                }
                            echo "</select>";
                        echo "</td>";
                        echo "<td>";
                            echo "<select name='cur_Tues-".$employee['employeeID']."'>";
                                if($shift['cur_Tues']){
                                    echo "<option selected value=1>Working</option>";
                                    echo "<option value=0>Not Working</option>";
                                } else {
                                    echo "<option value=1>Working</option>";
                                    echo "<option selected value=0>Not Working</option>";
                                }
                            echo "</select>";
                        echo "</td>";
                        echo "<td>";
                            echo "<select name='cur_Wed-".$employee['employeeID']."'>";
                                if($shift['cur_Wed']){
                                    echo "<option selected value=1>Working</option>";
                                    echo "<option value=0>Not Working</option>";
                                } else {
                                    echo "<option value=1>Working</option>";
                                    echo "<option selected value=0>Not Working</option>";
                                }
                            echo "</select>";
                        echo "</td>";
                        echo "<td>";
                            echo "<select name='cur_Thurs-".$employee['employeeID']."'>";
                                if($shift['cur_Thurs']){
                                    echo "<option selected value=1>Working</option>";
                                    echo "<option value=0>Not Working</option>";
                                } else {
                                    echo "<option value=1>Working</option>";
                                    echo "<option selected value=0>Not Working</option>";
                                }
                            echo "</select>";
                        echo "</td>";
                        echo "<td>";
                            echo "<select name='cur_Fri-".$employee['employeeID']."'>";
                                if($shift['cur_Fri']){
                                    echo "<option selected value=1>Working</option>";
                                    echo "<option value=0>Not Working</option>";
                                } else {
                                    echo "<option value=1>Working</option>";
                                    echo "<option selected value=0>Not Working</option>";
                                }
                            echo "</select>";
                        echo "</td>";
                      echo "</tr>";
                      echo "<tr>";
                        echo "<td>Week 2</td>";
                        echo "<td>";
                            echo "<select name='nex_Mon-".$employee['employeeID']."'>";
                                if($shift['nex_Mon']){
                                    echo "<option selected value=1>Working</option>";
                                    echo "<option value=0>Not Working</option>";
                                } else {
                                    echo "<option value=1>Working</option>";
                                    echo "<option selected value=0>Not Working</option>";
                                }
                            echo "</select>";
                        echo "</td>";
                        echo "<td>";
                            echo "<select name='nex_Tues-".$employee['employeeID']."'>";
                                if($shift['nex_Tues']){
                                    echo "<option selected value=1>Working</option>";
                                    echo "<option value=0>Not Working</option>";
                                } else {
                                    echo "<option value=1>Working</option>";
                                    echo "<option selected value=0>Not Working</option>";
                                }
                            echo "</select>";
                        echo "</td>";
                        echo "<td>";
                            echo "<select name='nex_Wed-".$employee['employeeID']."'>";
                                if($shift['nex_Wed']){
                                    echo "<option selected value=1>Working</option>";
                                    echo "<option value=0>Not Working</option>";
                                } else {
                                    echo "<option value=1>Working</option>";
                                    echo "<option selected value=0>Not Working</option>";
                                }
                            echo "</select>";
                        echo "</td>";
                        echo "<td name='nex_Thurs-".$employee['employeeID']."'>";
                            echo "<select>";
                                if($shift['nex_Thurs']){
                                    echo "<option selected value=1>Working</option>";
                                    echo "<option value=0>Not Working</option>";
                                } else {
                                    echo "<option value=1>Working</option>";
                                    echo "<option selected value=0>Not Working</option>";
                                }
                            echo "</select>";
                        echo "</td>";
                        echo "<td name='nex_Fri-".$employee['employeeID']."'>";
                            echo "<select>";
                                if($shift['nex_Fri']){
                                    echo "<option selected value=1>Working</option>";
                                    echo "<option value=0>Not Working</option>";
                                } else {
                                    echo "<option value=1>Working</option>";
                                    echo "<option selected value=0>Not Working</option>";
                                }
                            echo "</select>";
                        echo "</td>";
                      echo "</tr>";
                    echo "</tbody>";
                  echo "</table>";

                  $employeeCount++;
                }

                $_SESSION['employeeArray'] = $employeeArray;
              ?>

              <div class='row'>
                <div class='md-col-12'>
                    <button type='submit' class='btn btn-info btn-fill pull-left' name='submitShiftChanges'>Submit Shift Changes</button>
                </div>
              </div>
              </form>




            </div>
        </div>


        <?php include("includes/footer.html"); ?>

    </div>
</div>
</body>


</html>
