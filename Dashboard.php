<!DOCTYPE html>
<html>
<?php require('_Connection.php') ?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel='shortcut icon' type='image/x-icon' href='logo.png'/>
  <title>Jenus ITS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
</head>
<body class="hold-transition sidebar-mini">
<?php require('_Header.php');?>
<?php require('_Sidebar.php');?>
  <div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Employee Management System
          <small>| Dashboard</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="Dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>
      <br>
    <!-- Main content -->
      <section class="content">
        <!-- Info boxes -->
        <div class="row">

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
              <div class="info-box bg-maroon">
                <span class="info-box-icon"><i class="glyphicon glyphicon-pencil"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Newly Hired</span>
                  <span class="info-box-number">
                    <?php
                      $string = $result = mysqli_query($con, "SELECT * FROM employee 
                          WHERE `date_hired` is null or `date_hired` = '0000-00-00'");
                      $yes = mysqli_num_rows($result);
                      echo $yes;
                    ?>

                     New Employees</span>
                  <small>As of <?php echo date("F")?> <?php echo date("Y")?></small>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
              <div class="info-box bg-blue">
                <span class="info-box-icon"><i class="glyphicon glyphicon-pencil"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Registration</span>
                  <span class="info-box-number">
                    <?php
                      $string = $result = mysqli_query($con, "SELECT * FROM employee 
                          WHERE `date_hired` is not null and `date_hired` != '0000-00-00'");
                      $yes = mysqli_num_rows($result);
                      echo $yes;
                    ?> Inactive Employees</span>
                  <small><?php echo date("F")?> <?php echo date("Y")?></small>
                </div>
    			    </div>
            </div>
          </div>
          <!-- /.col -->

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
              <div class="info-box bg-light-blue">
                <span class="info-box-icon"><i class="glyphicon glyphicon-user"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Employees</span>
                  <span class="info-box-number">
                    <?php
                      $string = $result = mysqli_query($con, "SELECT * FROM employee");
                      $yes = mysqli_num_rows($result);
                      echo $yes;
                    ?>
                   Total Employees</span>
                  <small><?php echo date("F")?> <?php echo date("Y")?></small>
                </div>
  			      </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <br>
        <div class="row">

  		    <div class="col-md-6">
            <!-- TABLE: LATEST ORDERS -->
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Latest Registrations</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive" style="overflow-x:auto;">
                  <?php
                      $string = $result = mysqli_query($con, "SELECT `user_id`,
                          CONCAT(`First_Name`,' ', `Last_Name`), `contact_no`, `email` FROM employee 
                          WHERE (`date_hired` = '0000-00-00' or `date_hired` is null)");
                      $yes = mysqli_num_rows($result);
                       if($yes >= 1){
                    ?>
                  <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Registration ID</th>
                      <th>Employee Name</th>
                      <th>Contact Number</th>
                      <th>Email</th>
                      <th>Status</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    while($row = mysqli_fetch_array($result)){
                      ?>
            					<tr>
            						<td><?php echo $row[0] ?></td>
            						<td><?php echo $row[1] ?></td>
                        <td><?php echo $row[2] ?></td>
                        <td><?php echo $row[3] ?></td>
                        <td><span class="label label-warning"> Pending</span></td>
            					</tr>
                    <?php }
                    }
                    else
                    {
                      echo '<center><h1>No Latest Registration yet!</h1></center><br>';
                    }
                 ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer" align="right">
                <a href="T_SetHireDate.php" class="btn btn-default">View All New Registrations</a>
              </div>
  		      </div>
  		    </div>

          <div class="col-md-6">
            <!-- TABLE: LATEST ORDERS -->
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">System Logs</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>

              <!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive" style="overflow-x:auto;">
                    <?php
                        $sql = "SELECT l.`user_id`,
                                e.`ID`, 
                                CONCAT(e.`Last_Name`,', ',e.`First_Name`,' ',e.`Middle_Name`) AS name,
                                l.`Login_Time`, 
                                l.`Logout_Time`
                                FROM `log` as l 
                                INNER JOIN `employee` AS e 
                                ON e.`user_ID` = l.`user_id`
                                GROUP BY e.`user_ID`
                                ORDER BY l.`Login_Time` DESC
                                LIMIT 10";
                        $result = mysqli_query($con, $sql);
                      ?>
                  <table id = "myTable"class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Jenus ID</th>
                        <th>Name</th>
                        <th>Time of Log-In</th>
                        <th>Time of Log-Out</th>
                      </tr>
                    </thead>                    
                    <tbody>
                        <?php
                          while($row = mysqli_fetch_array($result)){
                        ?>
                      <tr>
                        <td><?php echo $row[1] ?></td>
                        <td><?php echo $row[2] ?></td>
                        <td><?php echo $row[3] ?></td>
                        <td>
                          <?php
                          if($row[4] != '0000-00-00 00:00:00')
                          {
                            echo $row[4];
                          }
                          else
                          {
                            echo "Currently Logged In.";
                          }                        
                         ?>                        
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer" align="right">
                <a href="T_SetHireDate.php" class="btn btn-default">View All Time Logs</a>
              </div>
            </div>
          </div>
            


        </div>
      </section>
    <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->
<?php require('_Footer.php');?>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
