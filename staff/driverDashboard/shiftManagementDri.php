<?php
    session_start();
    include("../../dbTools/dbConnect.php");
    include("checkLogin.php");

    $employeeID = $_SESSION['employeeID'];

?>

<!doctype html>
<html lang="en">
<head>
	<title>Employee Dashboard</title>

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
        <a class="navbar-brand" href="#">Dashboard</a>
        <?php include("includes/navbar-mobile-close.html"); ?>


        <div class="content">
            <div class="container-fluid">

              <?php
              $getShiftTimes = $dbConnection->prepare('SELECT * FROM Shift_Management WHERE employeeID = :siteEmployeeID'); //WHERE employeeID = (SOME RANDOM SESSION VARIABLE)
              $getShiftTimes->bindParam(':siteEmployeeID', $employeeID);
              try {
                  $getShiftTimes->execute();
              } catch(Exception $error) {
                  echo 'Exception -> ';
                  var_dump($error->getMessage());
              }


              $timetable = $getShiftTimes->fetch();

              ?>

              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Week</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                  </tr>
                </thead>
              </tbody>
                <?php
                if ($employeeID == 1)
                {
                  echo '<h2>Roster for Employee: Bob Fob</h2>';
                }else if($employeeID == 3){
                  echo '<h2>Roster for Employee: Bill Nobby</h2>';
                }else if($employeeID == 4){
                  echo '<h2>Roster for Employee: Ben Hill</h2>';
                }


                echo '<tbody>';
                  echo '<tr>';
                    echo '<td>Week 1</td>';
                    echo '<td>';
                    if ($timetable['cur_Mon'] == 1)
                    {
                      echo 'Rostered On';
                    }else{
                      echo 'Not working';
                    }
                    echo'</td>';
                    echo '<td>';
                    if ($timetable['cur_Tues'] == 1)
                    {
                      echo 'Rostered On';
                    }else{
                      echo 'Not working';
                    }
                    echo'</td>';
                    echo '<td>';
                    if ($timetable['cur_Wed'] == 1)
                    {
                      echo 'Rostered On';
                    }else{
                      echo 'Not working';
                    }
                    echo'</td>';
                    echo '<td>';
                    if ($timetable['cur_Thurs'] == 1)
                    {
                      echo 'Rostered On';
                    }else{
                      echo 'Not working';
                    }
                    echo '<td>';
                    if ($timetable['cur_Fri'] == 1)
                    {
                      echo 'Rostered On';
                    }else{
                      echo 'Not working';
                    }
                    echo'</td>';
                  echo '</tr>';
                  echo '<tr>';
                    echo '<td>Week 2</td>';
                    echo '<td>';
                    if ($timetable['nex_Mon'] == 1)
                    {
                      echo 'Rostered On';
                    }else{
                      echo 'Not working';
                    }
                    echo'</td>';
                    echo '<td>';
                    if ($timetable['nex_Tues'] == 1)
                    {
                      echo 'Rostered On';
                    }else{
                      echo 'Not working';
                    }
                    echo'</td>';
                    echo '<td>';
                    if ($timetable['nex_Wed'] == 1)
                    {
                      echo 'Rostered On';
                    }else{
                      echo 'Not working';
                    }
                    echo'</td>';
                    echo '<td>';
                    if ($timetable['nex_Thurs'] == 1)
                    {
                      echo 'Rostered On';
                    }else{
                      echo 'Not working';
                    }
                    echo'</td>';
                    echo '<td>';
                    if ($timetable['nex_Fri'] == 1)
                    {
                      echo 'Rostered On';
                    }else{
                      echo 'Not working';
                    }
                    echo'</td>';
                  echo '</tr>';
                ?></tbody></table>






            </div>
        </div>


        <?php include("includes/footer.html"); ?>

    </div>
</div>
</body>


</html>
