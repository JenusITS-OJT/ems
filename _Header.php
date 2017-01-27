<?php
session_start();
$name=$_SESSION['session']['name'];
$userid=$_SESSION['session']['userid'];
$jobtitle=$_SESSION['session']['jobtitle'];
$logid=$_SESSION['session']['logid'];
$sql="SELECT e.`Profile_Pic`
     FROM  employee as e
     WHERE e.`User_ID` = '$userid'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$profile_pic = $row[0];
//$name=$_COOKIE['koki']['name'];
//$role=$_COOKIE['koki']['role'];
if(!isset($name))
  {
    header('Location: Login_NoAccess.php?id=failed&msg=Please insert valid credential!');
  }
require ('_Connection.php');
?>

  <header class="main-header" >
    <!-- Logo -->
    <a href="Dashboard.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="logo.png" alt="Jenus ITS" height="20" width="50"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="logo.png" alt="Jenus ITS" height="55" width="200"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"></a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo $profile_pic; ?>" class="user-image" alt="User Image">
              <span class="username text-yellow" style="font-size: 12pt;"><?php echo $name?></span>              
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo $profile_pic; ?>" class="img-circle" alt="User Image">
                <p class="text-yellow">
                  <?php echo $name; ?>
                </p>
                <p class="text-yellow">
                  <?php echo $jobtitle; ?>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="T_ViewProfile_.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="_Logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>