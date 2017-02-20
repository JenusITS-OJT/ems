<!DOCTYPE html>
<html>
<?php require('_Connection.php');
if (isset($_GET['id']))
  $id = $_GET['id'];
else
   header("Location: CM_Team.php");
?>
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
        <small>| Team</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="Dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-gear"></i>Configuration Management</a></li>
        <li class="active">Team</li>
      </ol>
    </section>
    <br>
    <!-- Main content -->  
    <section class="content">

      <form action="F_CM_Team.php" method="get">
        <div class="box box-warning">
          <div class="box-header">
            <h3 class="box-title">Delete Record?</h3>
          </div>
          <div class="box-body" style="overflow-x:auto;">
            <h4>Do you want to delete the record below?</h4>
            <small>You will not be able to retrieve this anymore.</small>
            <br/>
            <br/>
            <table id="team" class="table table-bordered table-striped">
                <?php $sql="SELECT 
                          t.`id`, 
                          t.`Team_Name`, 
                          t.`Shift`, 
                          t.`Status`, 
                          d.`Dept_Name` 
                          FROM `team` as t 
                          INNER JOIN `department` AS d 
                          ON d.`ID` = t.`Dept_ID`
                          WHERE t.`id` = '$id'";
                  $result = mysqli_query($con, $sql);
                  while($row = mysqli_fetch_array($result)){
                        $id = $row[0];
                        $teamname = $row[1];
                        $department = $row[4];
                        $shift = $row[2];
                        $status = $row[3];
                  }
                ?>
                <thead>
                  <tr>
                    <th>Team Name</th>
                    <th>Department</th>
                    <th>Shift</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?php echo $teamname ?></td>
                    <td><?php echo $department ?></td>
                    <td><?php
                          if ($shift == 0)
                            { echo 'Day Shift';}
                          else 
                            { echo 'Night Shift';}
                        ?>
                    </td>
                    <td><?php
                          if ($status == 0 )
                            { echo 'Active';}
                          else 
                            { echo 'Inactive';}
                        ?>
                    </td>
                  </tr>                   
                </tbody>
            </table>

          </div>
          <input type="hidden" name="id" value="<?php echo $id; ?>"/>
          <div class="box-footer" align="right">
            <button type="submit" class="btn btn-danger">Delete Record</button>
            &nbsp;&nbsp;&nbsp;
            <a href="CM_Team.php"><button type="button" class="btn btn-default">Cancel</button></a>
          </div>
        </div>
      </form>

        <div class="box box-warning">
          <div class="box-header">
            <h3 class="box-title">Team</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body" style="overflow-x:auto;">
            <table id="team" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Team Name</th>
                  <th>Department</th>
                  <th>Shift</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
                <?php $sql="SELECT 
                          t.`id`, 
                          t.`Team_Name`,
                          d.`Dept_Name`,
                          t.`Shift`, 
                          t.`Status`
                          FROM `team` as t 
                          INNER JOIN `department` AS d 
                          ON d.`ID` = t.`Dept_ID`";
                  $result = mysqli_query($con, $sql);
                  while($row = mysqli_fetch_array($result)){
                ?> 
              <tbody>
                <tr>
                    <?php $id=$row[0]; ?> 
                    <td><?php echo $row[1] ?></td>
                    <td><?php echo $row[2] ?></td>
                    <td><?php
                          $shift= $row[3];
                          if ($shift == 0)
                            { echo 'Day Shift';}
                          else 
                            { echo 'Night Shift';}
                        ?></td>
                    <td><?php
                          $status= $row[4];
                          if ($status == 0 )
                            { echo 'Active';}
                          else 
                            { echo 'Inactive';}
                        ?></td>
                    <td>
                    <div class="btn-group">

                      <form action="CM_Team1.php?id=<?php echo $_GET['id'];?>" method="get">
                          <button type="submit" class="btn btn-success btn-flat btn-sm"  value="Update">
                            <i class="fa fa-pencil"></i>
                            Update
                          </button>
                          <input type="hidden" name="id" value="<?php echo $row[0]; ?>"/>
                        </form>
                          &nbsp;
                        <form action="CM_Team2.php?id=<?php echo $_GET['id'];?>" method="get">
                          <button type="submit" class="btn btn-danger btn-flat btn-sm"  value="Delete">
                            <i class="fa fa-trash"></i>
                            Delete
                          </button>
                          <input type="hidden" name="id" value="<?php echo $row[0]; ?>"/>
                        </form>

                    </div>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>        
      </div>
    </section>

  </div> 
    <!-- ./wrapper -->
    
<?php require('_Footer.php');?>
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
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>


<script>
  $(function () {
      //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );
  //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  
  $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

</body>
</html>
