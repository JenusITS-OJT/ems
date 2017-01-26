<?php
$name=$_SESSION['session']['name'];
$userid=$_SESSION['session']['userid'];
$jobtitle=$_SESSION['session']['jobtitle'];
$sql="SELECT e.`Profile_Pic`
     FROM  employee as e
     WHERE e.`User_ID` = '$userid'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$profile_pic = $row[0];
require ('_Connection.php');
?>
  <!-- BEGIN SIDEBAR -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $profile_pic; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">        
          <p class="text-yellow"><?php echo $name?></p>
          <small class="text-yellow"><?php echo $jobtitle?></small>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        
        <li class="treeview">
          <a href="Dashboard.php">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
          </a>
        </li>
        
        <li class="treeview">
         <a href="#">
            <i class="fa fa-gear "></i>
            <span>Configuration Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>      

          <ul class="treeview-menu">
            <li><a href="CM_Branch.php"><i class="fa fa-circle-o"></i>Branches</a></li>
            <li><a href="CM_Department.php"><i class="fa fa-circle-o"></i>Department</a></li>
            <li><a href="CM_JobTitle.php"><i class="fa fa-circle-o"></i>Job Title</a></li>
          </ul>
        </li>

        <li class="treeview">
         <a href="#">
            <i class="fa fa-tasks"></i> <span>Transaction</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>      

          <ul class="treeview-menu">
            <li><a href="T_SetHireDate.php"><i class="fa fa-circle-o"></i>Set Hire Date</a></li>
            <li><a href="T_ViewEmployeeList.php"><i class="fa fa-circle-o"></i>View Employee List</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="R_Reports.php">
            <i class="fa fa-newspaper-o"></i>
            <span>Create Reports</span>
          </a>
        </li>

        <li class="treeview">
          <a href="T_ViewProfile_.php">
            <i class="fa fa-user"></i>
            <span>Profile</span>
          </a>
        </li>

        <li class="treeview">
          <a href="User_Account.php">
            <i class="fa fa-laptop"></i>
            <span>User Account</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>