<!doctype html>
<html lang="en">

<?php 
$thisPage = "";
    include 'header.php';
    
    ?>
        <!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <h3 class="page-title">New Password</h3>
                    <div class="panel panel-headline demo-icons">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Password</h3>
                        </div>
              <form action="cpass.php" method="post">
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control" name="password" required="required">
                            </div>
                            <div class="form-group">
                                <label>Password Baru</label>
                                <input type="text" class="form-control" name="epassword" required="required">
                            </div>
                            <div class="form-group">
                                <label>Ulangi Password Baru</label>
                                <input type="text" class="form-control" name="rpassword" required="required">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class=" btn btn-primary ">Edit</button>
                </div>
             </form>
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