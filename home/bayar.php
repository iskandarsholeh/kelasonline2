<!doctype html>
<html lang="en">
<?php 
                
                             require '../db/db_connection.php';
                             $id3 = $_SESSION['id'];
                                $query = mysqli_query($db_connection, "SELECT * FROM users where id='$id3'")or die(mysqli_error($db_connection));
                                if ($result = mysqli_fetch_assoc($query)){

                                    if ($result['id_kelas'] !== NULL) {  
                                        echo"<script>alert('Anda sudah memesan kelas, silahkan tunggu di acc');
                                        document.location.href='library.php'</script>\n"; 
                                    }
                                    else { 
                                        ?>
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
         $thisPage = "Library";
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
                    <h3 class="page-title">Bayar</h3>
                    <div class="panel panel-headline demo-icons">
                        <div class="panel-heading">
                            <h3 class="panel-title">Pembayaran ke normer rekening 1400018114927</h3>
                        </div>
                        <?php 
                    $id = $_GET['id'];
                    $id2 = $_SESSION['login_id'];
                    
                                $select = mysqli_query($db_connection, "SELECT * FROM kelas where id = '$id'");
                              
                                   
                                while ($row = $select->fetch_array()) {
                                   
                                ?>
                        <div class="panel-body">
                        <form action="transaksi.php" method="post" enctype="multipart/form-data" >
                            <div class="form-group">
                                
                                <input type="hidden" class="form-control" value='<?php echo $id; ?>'  name="kelas" required="required">
                            </div>
                            <div class="form-group">
                              
                                <input type="hidden" class="form-control" value='<?php echo $id2; ?>'  name="user" required="required">
                            </div>
                            <div class="form-group">
                                <label>Bukti pembayaran</label>
                                <input type="file" class="form-control" name="foto">
                            </div>
                        
                            <?php } ?>
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
            <p class="copyright">&copy; 2021 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
        </div>
    </footer>
    </div>

    <?php    }
                                }
                             ?>

        <!-- END WRAPPER -->
        <!-- Javascript -->
        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/scripts/klorofil-common.js"></script>
</body>

  
</html>