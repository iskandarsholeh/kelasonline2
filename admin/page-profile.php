<!doctype html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendor/linearicons/style.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="assets/css/demo.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <!-- NAVBAR -->
        <?php 
        $thisPage = "";
            include 'header.php';
            ?>
        <!-- END NAVBAR -->
        <!-- LEFT SIDEBAR -->
        <!-- END LEFT SIDEBAR -->
        <!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <div class="panel panel-profile">
                        <div class="clearfix">
                            <!-- LEFT COLUMN -->
                            <div class="profile-left">
                                <!-- PROFILE HEADER -->
                                <div class="profile-header">
                                    <div class="overlay"></div>
                                    <div class="profile-main">
                                        <img src="assets/img/user-medium.png" class="img-circle" alt="Avatar">
                                        <h3 class="name">Samuel Gold</h3>
                                        <span class="online-status status-available">Available</span>
                                    </div>
                                    <div class="profile-stat">
                                        <div class="row">
                                            <div class="col-md-4 stat-item">
                                                45 <span>Projects</span>
                                            </div>
                                            <div class="col-md-4 stat-item">
                                                15 <span>Awards</span>
                                            </div>
                                            <div class="col-md-4 stat-item">
                                                2174 <span>Points</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END PROFILE HEADER -->
                                <!-- PROFILE DETAIL -->
                                <div class="profile-detail">
                                    <div class="profile-info">
                                        <h4 class="heading">Basic Info</h4>
                                        <ul class="list-unstyled list-justify">
                                            <li>Birthdate <span>24 Aug, 2016</span></li>
                                            <li>Mobile <span>(124) 823409234</span></li>
                                            <li>Email <span>samuel@mydomain.com</span></li>
                                            <li>Website <span><a href="https://www.themeineed.com">www.themeineed.com</a></span></li>
                                        </ul>
                                    </div>
                                    <div class="profile-info">
                                        <h4 class="heading">Social</h4>
                                        <ul class="list-inline social-icons">
                                            <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#" class="google-plus-bg"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="#" class="github-bg"><i class="fa fa-github"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="profile-info">
                                        <h4 class="heading">About</h4>
                                        <p>Interactively fashion excellent information after distinctive outsourcing.</p>
                                    </div>
                                    <div class="text-center"><a href="#" class="btn btn-primary">Edit Profile</a></div>
                                </div>
                                <!-- END PROFILE DETAIL -->
                            </div>
                            <!-- END LEFT COLUMN -->
                            <!-- RIGHT COLUMN -->
                            <div class="profile-right">
                                <h4 class="heading">Samuel's Awards</h4>
                                <!-- AWARDS -->
                                <div class="awards">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6">
                                            <div class="award-item">
                                                <div class="hexagon">
                                                    <span class="lnr lnr-sun award-icon"></span>
                                                </div>
                                                <span>Most Bright Idea</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="award-item">
                                                <div class="hexagon">
                                                    <span class="lnr lnr-clock award-icon"></span>
                                                </div>
                                                <span>Most On-Time</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="award-item">
                                                <div class="hexagon">
                                                    <span class="lnr lnr-magic-wand award-icon"></span>
                                                </div>
                                                <span>Problem Solver</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="award-item">
                                                <div class="hexagon">
                                                    <span class="lnr lnr-heart award-icon"></span>
                                                </div>
                                                <span>Most Loved</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center"><a href="#" class="btn btn-default">See all awards</a></div>
                                </div>
                                <!-- END AWARDS -->
                                <!-- TABBED CONTENT -->
                                <div class="custom-tabs-line tabs-line-bottom left-aligned">
                                    <ul class="nav" role="tablist">
                                        <li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Recent Activity</a></li>
                                        <li><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Timeline <span class="badge">7</span></a></li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tab-bottom-left1">
                                        <ul class="list-unstyled activity-timeline">
                                            <li>
                                                <i class="fa fa-comment activity-icon"></i>
                                                <p>Commented on post <a href="#">Prototyping</a> <span class="timestamp">2 minutes ago</span></p>
                                            </li>
                                            <li>
                                                <i class="fa fa-cloud-upload activity-icon"></i>
                                                <p>Uploaded new file <a href="#">Proposal.docx</a> to project <a href="#">New Year Campaign</a> <span class="timestamp">7 hours ago</span></p>
                                            </li>
                                            <li>
                                                <i class="fa fa-plus activity-icon"></i>
                                                <p>Added <a href="#">Martin</a> and <a href="#">3 others colleagues</a> to project repository <span class="timestamp">Yesterday</span></p>
                                            </li>
                                            <li>
                                                <i class="fa fa-check activity-icon"></i>
                                                <p>Finished 80% of all <a href="#">assigned tasks</a> <span class="timestamp">1 day ago</span></p>
                                            </li>
                                        </ul>
                                        <div class="margin-top-30 text-center"><a href="#" class="btn btn-default">See all activity</a></div>
                                    </div>
                                    <div class="tab-pane fade" id="tab-bottom-left2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Experience</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Hourly Rate</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>10$/hr</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Total Projects</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>230</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>English Level</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Availability</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>6 months</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label></label>
                                            </div>
                                            <div class="col-md-6">
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label></label>
                                            </div>
                                            <div class="col-md-6">
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label></label>
                                            </div>
                                            <div class="col-md-6">
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label></label>
                                            </div>
                                            <div class="col-md-6">
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label></label>
                                            </div>
                                            <div class="col-md-6">
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label></label>
                                            </div>
                                            <div class="col-md-6">
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label></label>
                                            </div>
                                            <div class="col-md-6">
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label></label>
                                            </div>
                                            <div class="col-md-6">
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END TABBED CONTENT -->
                        </div>
                        <!-- END RIGHT COLUMN -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->
    </div>
    <!-- END MAIN -->
    <div class="clearfix"></div>
    <footer>
        <div class="container-fluid">
            <p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
        </div>
    </footer>
    </div>
    <!-- END WRAPPER -->
    <!-- Javascript -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/scripts/klorofil-common.js"></script>
</body>

</html>