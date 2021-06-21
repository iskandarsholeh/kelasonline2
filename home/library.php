<!doctype html>
<html lang="en">

<?php 
$thisPage = "Library";
    include 'header.php';
    
    ?>
    <?php 
                $id3 = $_SESSION['login_id'];
                   $query = mysqli_query($db_connection, "SELECT * FROM pembayaran where id_user='$id3'");
                   if ($result = mysqli_fetch_assoc($query)){

                       if ($result['bayar'] !== '1' || $result['bayar'] === NULL) {  
                        ?>
                        <div class="main">
                        <!-- MAIN CONTENT -->
                        <div class="main-content">
                            <div class="container-fluid">
                                <!-- OVERVIEW -->
                                <div class="panel panel-headline">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">My Library</h3>
            
                                    </div>
                                    <div class="panel-body">
                                       Silahkan tunggu teracc
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END MAIN CONTENT -->
                    </div>
                <?php
                       }
                       else { 
                           ?>

        <!-- MAIN -->
        
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <!-- OVERVIEW -->
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">My Library</h3>
                            <?php 
                         $idg = $_SESSION['login_id'];
                          $query = mysqli_query($db_connection, "SELECT * FROM users a inner join kelas b ON a.id_kelas=b.id WHERE  a.google_id='$idg'");
                          if ($result = mysqli_fetch_assoc($query)){
                          ?>
                        </div>
                        <div class="panel-body">
                       <center> <img src="../img/kelas/<?php echo $result['foto'] ?>" alt="Girl in a jacket" width="200" height="200"></center>
                        <p align="justify"> <font size='5'> &emsp; &emsp;  <?php echo $result['caption'] ?> </font> </p>
                        <center>  <video src="../img/kelas/<?php echo $result['video'] ?>"  controls width='500px' height='320px' ></video> </center>
                           <a href="../img/kelas/<?php echo $result['pdf1'] ?>" download>PDF1</a>
                           <a href="../img/kelas/<?php echo $result['pdf2'] ?>" download> &nbsp PDF2</a>
                           <a href="../img/kelas/<?php echo $result['pdf3'] ?>" download>&nbsp  PDF3</a>
                           
                        </div>
                        &nbsp &nbsp &nbsp &nbsp   <a href="quiz.php?id=<?php echo $result['id_quiz']; ?>" class="btn btn-success">Take a quiz</a>
                        <?php } ?>
                       
                    </div>
                    
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        <?php } }?>
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
    <script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="assets/vendor/chartist/js/chartist.min.js"></script>
    <script src="assets/scripts/klorofil-common.js"></script>
    <script>
        $(function() {
            var data, options;

            // headline charts
            data = {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                series: [
                    [23, 29, 24, 40, 25, 24, 35],
                    [14, 25, 18, 34, 29, 38, 44],
                ]
            };

            options = {
                height: 300,
                showArea: true,
                showLine: false,
                showPoint: false,
                fullWidth: true,
                axisX: {
                    showGrid: false
                },
                lineSmooth: false,
            };

            new Chartist.Line('#headline-chart', data, options);


            // visits trend charts
            data = {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                series: [{
                    name: 'series-real',
                    data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
                }, {
                    name: 'series-projection',
                    data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
                }]
            };

            options = {
                fullWidth: true,
                lineSmooth: false,
                height: "270px",
                low: 0,
                high: 'auto',
                series: {
                    'series-projection': {
                        showArea: true,
                        showPoint: false,
                        showLine: false
                    },
                },
                axisX: {
                    showGrid: false,

                },
                axisY: {
                    showGrid: false,
                    onlyInteger: true,
                    offset: 0,
                },
                chartPadding: {
                    left: 20,
                    right: 20
                }
            };

            new Chartist.Line('#visits-trends-chart', data, options);


            // visits chart
            data = {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                series: [
                    [6384, 6342, 5437, 2764, 3958, 5068, 7654]
                ]
            };

            options = {
                height: 300,
                axisX: {
                    showGrid: false
                },
            };

            new Chartist.Bar('#visits-chart', data, options);


            // real-time pie chart
            var sysLoad = $('#system-load').easyPieChart({
                size: 130,
                barColor: function(percent) {
                    return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
                },
                trackColor: 'rgba(245, 245, 245, 0.8)',
                scaleColor: false,
                lineWidth: 5,
                lineCap: "square",
                animate: 800
            });

            var updateInterval = 3000; // in milliseconds

            setInterval(function() {
                var randomVal;
                randomVal = getRandomInt(0, 100);

                sysLoad.data('easyPieChart').update(randomVal);
                sysLoad.find('.percent').text(randomVal);
            }, updateInterval);

            function getRandomInt(min, max) {
                return Math.floor(Math.random() * (max - min + 1)) + min;
            }

        });
    </script>
    
</body>
</html>