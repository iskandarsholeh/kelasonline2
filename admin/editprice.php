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
        $thisPage = "Eprice";
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
                    <h3 class="page-title">Price</h3>
                    <div class="panel panel-headline demo-icons">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Price</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Jenis</label>
                                <input type="text" class="form-control" name="jenis" required="required">
                            </div>
                            <div class="form-group">
                                <label>Benefit</label>
                                <input type="text" class="form-control" name="benefit" required="required">
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="text" class="form-control" name="harg" required="required">
                            </div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class=" btn btn-primary ">Edit</button>
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

    <div id="myModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">

                    <!-- <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" required="required">
                                </div> -->
                    <div class="row">

                        <form action="#" method="post">
                            <div class="col-md-12">
                                <center>
                                    <h3>Edit Price</h3>
                                </center>
                                <div class="form-group">
                                    <label>Jenis</label>
                                    <input type="text" class="form-control" name="jenis" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Benefit</label>
                                    <input type="text" class="form-control" name="benefit" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="text" class="form-control" name="harg" required="required">
                                </div>

                            </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class=" btn btn-primary ">Edit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <div id="mymodal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">

                    <!-- <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" required="required">
                                    </div> -->
                    <div class="row">

                        <form action="#" method="post">
                            <div class="col-md-12">
                                <center>
                                    <h3>Price</h3>
                                </center>
                                <div class="form-group">
                                    <label>Jenis</label>
                                    <input type="text" class="form-control" name="jenis" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Benefit</label>
                                    <input type="text" class="form-control" name="benefit" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="text" class="form-control" name="harg" required="required">
                                </div>

                            </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class=" btn btn-primary ">Edit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </form>
                </div>

            </div>
        </div>

        <!-- END WRAPPER -->
        <!-- Javascript -->
        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/scripts/klorofil-common.js"></script>
</body>

</html>