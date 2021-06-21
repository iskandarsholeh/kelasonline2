<!doctype html>
<html lang="en">

<?php 
$thisPage = "Page-Profile";
include 'header.php';
    
    ?>

<style>
.profile-header .profile-main {
    position: relative;
    padding: 20px;
    background-image: url("gambar/<?php echo $user['latar_image']; ?>");
    background-repeat: no-repeat;
    background-size: cover;
}
</style>
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
                                <style>
                                .custom-file-input {
                                    color: transparent;
                                }

                                .custom-file-input::-webkit-file-upload-button {
                                    visibility: hidden;
                                }

                                .custom-file-input::before {
                                    content: 'Edit Foto Background';
                                    color: black;
                                    display: inline-block;
                                    background: -webkit-linear-gradient(top, #f9f9f9, #e3e3e3);
                                    border: 1px solid #999;
                                    border-radius: 3px;
                                    padding: 5px 8px;
                                    outline: none;
                                    white-space: nowrap;
                                    -webkit-user-select: none;
                                    cursor: pointer;
                                    text-shadow: 1px 1px #fff;
                                    font-weight: 700;
                                    font-size: 10pt;
                                }

                                .custom-file-input:hover::before {
                                    border-color: black;
                                }

                                .custom-file-input:active {
                                    outline: 0;
                                }

                                .custom-file-input:active::before {
                                    background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
                                }
                                </style>

                                <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

                                <img src="<?php echo $user['profile_image']; ?>" class="img-circle" alt="Avatar">
                                <h3 class="name"><?php echo $user['name'];?></h3>
                                <span class="online-status status-available">Available</span>

                                <form id="form" action="upbackimage.php" method="POST" enctype="multipart/form-data">
                                    <input type="file" id="file" class="custom-file-input" name="foto">
                                </form>
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
                                    <li>Birthdate <span><?php echo $user['umur'];?></span></li>
                                    <li>Mobile <span><?php echo $user['no_tlp'];?></span></li>
                                    <li>Email <span><?php echo $user['email'];?></span></li>
                                    <li>Pekerjaan <span><?php echo $user['pekerjaan'];?></span>
                                    <li>Alamat <span><?php echo $user['alamat'];?></span>
                                    </li>
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
                                <p><?php echo $user['about'];?></p>
                            </div>
                            <div class="text-center"><a href="#" class="btn btn-primary">Edit Profile</a></div>
                        </div>
                        <!-- END PROFILE DETAIL -->
                    </div>
                    <!-- END LEFT COLUMN -->
                    <!-- RIGHT COLUMN -->
                    <div class="profile-right">
                        <h4 class="heading"><?php echo $user['name'];?> Awards</h4>
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
                                <li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Recent
                                        Activity</a></li>
                                <li><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Timeline <span
                                            class="badge">7</span></a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab-bottom-left1">
                                <ul class="list-unstyled activity-timeline">
                                    <li>
                                        <i class="fa fa-comment activity-icon"></i>
                                        <p>Commented on post <a href="#">Prototyping</a> <span class="timestamp">2
                                                minutes ago</span></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-cloud-upload activity-icon"></i>
                                        <p>Uploaded new file <a href="#">Proposal.docx</a> to project <a href="#">New
                                                Year Campaign</a> <span class="timestamp">7 hours ago</span></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-plus activity-icon"></i>
                                        <p>Added <a href="#">Martin</a> and <a href="#">3 others colleagues</a> to
                                            project repository <span class="timestamp">Yesterday</span></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check activity-icon"></i>
                                        <p>Finished 80% of all <a href="#">assigned tasks</a> <span class="timestamp">1
                                                day ago</span></p>
                                    </li>
                                </ul>
                                <div class="margin-top-30 text-center"><a href="#" class="btn btn-default">See all
                                        activity</a></div>
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
        <p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All
            Rights Reserved.</p>
    </div>
</footer>
</div>
<!-- END WRAPPER -->
<!-- Javascript -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/scripts/klorofil-common.js"></script>
<script>
document.getElementById("file").onchange = function() {
    document.getElementById("form").submit();
}
</script>
</body>

</html>