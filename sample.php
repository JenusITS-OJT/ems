<?php require('_Connection.php');
if (isset($_GET['id']))
  $id = $_GET['id'];
?>

<html>
<head>
<title>
</title>

<!-- 
    <script src="others/jquery.js" type="text/JavaScript" language="javascript"></script>
    <script src="others/jquery.PrintArea.js" type="text/JavaScript" language="javascript"></script>
 -->


</head>

<script type="text/javascript" src="yeah/libs/FileSaver/FileSaver.min.js"></script>
<script type="text/javascript" src="yeah/libs/jsPDF/jspdf.min.js"></script>
<script type="text/javascript" src="yeah/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
<script type ="text/javascript" src = "yeah/tableExport.min.js"></script>


<script type ="text/javascript">
  $(document).ready(function(e) {

      $("#pdf").click(function(e) {
        $('#myTable').tableExport({type:'csv'});
      });

      $("#word").click(function(e) {
        $("#myTable").tableExport({
          type: 'doc',
          escape: 'false',
        });
      });

      $("#excel").click(function(e) {
        $("#myTable").tableExport({
          type: 'excel',
          escape: 'false',
        });
      });

  });
</script>


<body>

	<center><img src = "logo.png" align="middle" style = "width:250px;height:90px;"/>
	<h2 style="text-align:center;">Employee Management System</h2>
	<p style="text-align:center;">As of December 2016</p>
	<br/><br/>

	<!--Table-->
	<table id="myTable" border="1">
  <tr>
    <th><center><h3>Jenus ID</h3></center></th>
    <th><center><h3>Employee Name</h3></center></th>
    <th><center><h3>Workplace Address</h3></center></th>
    <th><center><h3>Department</h3></center></th>
    <th><center><h3>Job Title</h3></center></th>
    <th><center><h3>Date Hired</h3></center></th>
    <th><center><h3>Status</h3></center></th>
  </tr>
  <?php $sql="SELECT e.`ID`,
                  CONCAT(e.`Last_Name`,', ',e.`First_Name`,' ',e.`Middle_Name`) as name, 
                  e.`Branch_ID`, e.`Dept_ID`, e.`JobTitle_ID`, DATE_FORMAT(e.`Date_Hired`,'%M %d, %Y'),   e.`Status_ID` 
                  FROM Employee as e where e.`Dept_ID` = '2' ORDER BY `name`";
                    $result = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_array($result)){
                  ?>
  <tr>
    <td><?php echo $row[0]?></td>
    <td><?php echo $row[1]?></td>
    <td><?php $sql2 = "SELECT `address` from `branch` where `id` = '$row[2]'";
                      $result2 = mysqli_query($con, $sql2);
                      $row2 = mysqli_fetch_array($result2);
                        echo $row2[0];?></td>
    <td><?php $sql3 = "SELECT `dept_name` from `department` where `id` = '$row[3]'";
                      $result3 = mysqli_query($con, $sql3);
                      $row3 = mysqli_fetch_array($result3);
                        echo $row3[0];?></td>
    <td><?php $sql4 = "SELECT `job_title` from `job` where `id` = '$row[4]'";
                      $result4 = mysqli_query($con, $sql4);
                      $row4 = mysqli_fetch_array($result4);
                        echo $row4[0];?></td>
    <td><?php echo $row[5]?></td>
    <td><?php $sql4 = "SELECT `status_name` from `status` where `id` = '$row[6]'";
                      $result4 = mysqli_query($con, $sql4);
                      $row4 = mysqli_fetch_array($result4);
                        echo $row4[0];?></td>
  </tr>
  <?php } ?>
  </table>
	</center>

      
      <button id = "pdf" name="print_button1">Export as PDF</button>
      <button id = "word" name="print_button1">Export as Word</button>
      <button id = "excel" name="print_button1">Export as Excel</button>

  <!--    <script>
  //   $(document).ready(function(){
  //       $("#print_button1").click(function(){
  //           var mode = 'iframe'; // popup
  //           var close = mode == "popup";
  //           var options = { mode : mode, popClose : close};
  //           $("div.wrapper").printArea( options );
  //       });
  //   });

  // </script>-->
</body>
</html>