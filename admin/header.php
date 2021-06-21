
<?php
require '../db/db_connection.php';

if(!isset($_SESSION['login_id'])){
    header('Location: ../index.php');
    exit;
} else if ($_SESSION['id_level'] != "1"){
  header('Location: ../index.php');
}

$id = $_SESSION['login_id'];

$get_user = mysqli_query($db_connection, "SELECT * FROM users WHERE google_id='$id'");

if(mysqli_num_rows($get_user) > 0){
    $user = mysqli_fetch_assoc($get_user);
}
else{
    header('Location: logout.php');
    exit;
}
?>



<title>Dashboard | Admin</title>
<nav class="navbar navbar-default navbar-fixed-top">
            <div class="brand">
                <a href="index.php"><img src="assets/img/logo.png" alt="Klorofil Logo" class="img-responsive logo"></a>
            </div>
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
                </div>
                <div id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo $user['profile_image']; ?>" class="img-circle" alt="Avatar"> <span><?php echo $user['name'];?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="page-profile.php"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                                <li><a href="changepass.php"><i class="lnr lnr-pencil"></i> <span>Change Password</span></a></li>
                                <li><a href="../logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                <i class="lnr lnr-alarm"></i>
                                <span class="badge bg-danger">5</span>
                            </a>


                            <ul class="dropdown-menu notifications">
                                <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>
                                <li><a href="#" class="more">See all notifications</a></li>
                            </ul>
                        </li>

                        <ul class="dropdown-menu">
                            <li><a href="#">Basic Use</a></li>
                            <li><a href="#">Working With Data</a></li>
                            <li><a href="#">Security</a></li>
                            <li><a href="#">Troubleshooting</a></li>
                        </ul>
                        </li>

                        <!-- <li>
							<a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
						</li> -->
                    </ul>
                </div>
            </div>
        </nav>
        <div id="sidebar-nav" class="sidebar">
            <div class="sidebar-scroll">
                <nav>
                    <ul class="nav">
                        <li><a href="index.php" <?php if($thisPage == "Home") echo "class='active'"; ?>><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                        <li>
                            <a href="#subHome" data-toggle="collapse" <?php if($thisPage == "About" || $thisPage == "Team") echo "class='active'"; ?>><i class="lnr lnr-file-empty"></i> <span>Home</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="subHome" class="collapse ">
                                <ul class="nav">
                                    <li><a href="about.php" <?php if($thisPage == "About") echo "class='active'"; ?>>About Us</a></li>
                                    <li><a href="team.php" <?php if($thisPage == "Team") echo "class='active'"; ?>>Team</a></li>
                                    <!-- <li><a href="price.php" <?php if($thisPage == "Price") echo "class='active'"; ?>>Price</a></li> -->
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#subUser" data-toggle="collapse" <?php if($thisPage == "User" || $thisPage == "Quiz" || $thisPage == "Kelas"|| $thisPage == "Bayar") echo "class='active'"; ?>><i class="lnr lnr-user"></i> <span>User</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="subUser" class="collapse ">
                                <ul class="nav">
                                    <li><a href="user.php" <?php if($thisPage == "User") echo "class='active'"; ?>>users</a></li>
                                    <li><a href="kelas.php" <?php if($thisPage == "Kelas") echo "class='active'"; ?>>Kelas</a></li>
                                    <li><a href="quiz.php" <?php if($thisPage == "Quiz") echo "class='active'"; ?>>Quiz</a></li>
                                    <li><a href="pembayaran.php" <?php if($thisPage == "Bayar") echo "class='active'"; ?>>Pembayaaran</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>