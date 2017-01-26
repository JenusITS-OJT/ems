<!DOCTYPE html>
<?php require('_Connection.php');
if (isset($_GET['id']) && isset($_GET['userid'])){
  $id = $_GET['id'];   
  $userid = $_GET['userid'];
  }   
else
   header("Location: T_ViewProfile_.php");
?>
<?php require('_Header.php');?>
<?php require('_Sidebar.php');?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel='shortcut icon' type='image/x-icon' href='logo.png'/>
  <title>Jenus ITS</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
  <style type="text/css">
    .bs-example{
      margin: 20px;
    }
    @media screen and (min-width: 768px) {
        .modal-dialog {
          width: 1000px; /* New width for default modal */
        }
        .modal-sm {
          width: 350px; /* New width for small modal */
        }
    }
    @media screen and (min-width: 992px) {
        .modal-lg {
          width: 950px; /* New width for large modal */
        }
    }
  </style>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->

      <section class="content-header">
        <h1>
        Employee Management System
          <small>| Work Background</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="Dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="T_ViewProfile_.php"><i class="fa fa-user"></i>Profile</a></li>
          <li><a href="T_Work_.php"><i class="fa fa-building"></i>Work Background</a></li>
        </ol>
      </section>
      <br>

      <!-- Main content -->
      <section class="content">

        <form action="_T_Work_.php" method="get">

          <?php $sql="SELECT
                  w.`id`,  
                  w.`Company_Name`, 
                  w.`Job_Title`, 
                  w.`From_Year`, 
                  w.`To_Year`
                    FROM `emp_workbg` AS w
                    WHERE w.`id` = $id AND w.`User_ID` = $userid";
                    $result = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_array($result)){
                          $wid = $row[0];
                          $company = $row[1];
                          $jobtitle = $row[2];
                          $wfromyear = $row[3];
                          $wtoyear = $row[4];
                        }
          ?>          

          <!--Work Background-->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Update Work Background</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div>

            <div class="box-body">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="company"> Company </label>
                  <input type="text" class="form-control" id="company" name="company" value="<?php echo $company; ?>" placeholder="Company">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="GSIS">Job Title</label>
                  <input type="text" class="form-control" id="jobtitle" name="jobtitle" value="<?php echo $jobtitle; ?>" placeholder="Job Title">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label for="fromyear">From Year:</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="date" class="form-control pull-right" id="datepicker" name="datepicker" value="<?php echo $wfromyear; ?>" required></input>                    
                  </div>
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label for="fromyear">To Year:</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="date" class="form-control pull-right" id="datepicker1" name="datepicker1" value="<?php echo $wtoyear; ?>" required></input>                    
                  </div>
                </div>
              </div>

              <div class="box-footer" align="right">
                <button type="submit" class="btn btn-primary">Update</button>
                &nbsp;&nbsp;&nbsp;
                <button type="reset" class="btn btn-default">Clear Fields</button>
                <input type="hidden" name="userid" value="<?php echo $userid; ?>"/>
                <input type="hidden" name="id" value="<?php echo $wid; ?>"/>
              </div>
            </div>
          </div>
        </form>

        <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Work Background</h3>
                <div class="box-tools pull-right">
                  <form action="T_ViewProfile_.php?userid=<?php echo $_GET['userid'];?>" method="get">
                    <button type="submit" class="btn form-control btn-warning"  value="Update">
                      <i class="fa fa-eye"> View Profile</i>
                      <input type="hidden" name="userid" value="<?php echo $userid; ?>"/>
                    </button>
                  </form>
                </div>
              </div>

              <table id="work" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Company Name</th>
                    <th>Job Title</th>
                    <th>Year</th>
                    <th>Action</th>
                  </tr>
                </thead>
                  <?php $sql="SELECT 
                    w.`ID`,
                    w.`Company_Name`,
                    w.`Job_Title`,
                    CONCAT(DATE_FORMAT(w.`From_Year`,'%Y'),'-', DATE_FORMAT(w.`To_Year`,'%Y')) as Year
                      FROM `emp_workbg` AS w
                      WHERE w.`User_ID` = $userid
                      ORDER BY w.`To_Year` ASC";
                        $result = mysqli_query($con, $sql);
                        while($row = mysqli_fetch_array($result)){
                      ?>
                <tbody>
                  <tr>
                    <?php $id=$row[0] ?>
                    <td><?php echo $row[1] ?></td>
                    <td><?php echo $row[2] ?></td>
                    <td><?php echo $row[3] ?></td>
                    <td>
                      <div class="btn-group">
                        <form action="T_Work1_.php?userid=<?php echo $_GET['userid'];?>&id=<?php echo $_GET['id'];?>" method="get">
                          <button type="submit" class="btn btn-success btn-flat btn-sm"  value="Update">
                            <i class="fa fa-pencil"></i>
                            Update
                          </button>
						              <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                          <input type="hidden" name="userid" value="<?php echo $userid; ?>"/>
						            </form>
                        &nbsp;
                        <form action="T_Work2_.php?userid=<?php echo $_GET['userid'];?>&id=<?php echo $_GET['id'];?>" method="get">
                          <button type="submit" class="btn btn-block btn-danger btn-flat btn-sm"  value="Delete">
                            <i class="fa fa-trash"></i>
                            Delete
                          </button>
                          <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                          <input type="hidden" name="userid" value="<?php echo $userid; ?>"/>
                        </form>
                      </div>
                    </td>
                  </tr>
                  <?php } ?>                    
                </tbody>
              </table>

        </div>

      </section>
    </div>

<?php require("_Footer.php");?>

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
  