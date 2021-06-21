<!doctype html>
<html lang="en">
    
<?php 
$thisPage = "Browser";
    include 'header.php';
    ?>

<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Chose Class</h3>
                </div>
                <div class="panel-body">
                    <!-- Main -->
          
                    <div class="row">
                    <?php 
                        $select = mysqli_query($db_connection, "SELECT * FROM kelas");
                        if($select->num_rows>0){
                            $no=1;
                        while ($row = $select->fetch_array()) {
                           
                        ?>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="card" style="width: 20rem;">
                                <img class="card-img-top" src="../img/kelas/<?php echo $row['foto']?>" alt="Card image cap">
                                <div class="card-block">
                                    <h4 class="card-title"><?php echo $row['nama']?></h4>
                                    <p class="card-text">Harga <?php echo $row['harga']?></p>
                                    <a href="bayar.php?id=<?php echo $row['id']; ?>" data-name="Orange" data-price="0.5" class="add-to-cart btn btn-primary">Pilih</a>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="card" style="width: 20rem;">
                                <img class="card-img-top" src="https://www.php.net/images/logos/new-php-logo.svg" alt="Card image cap">
                                <div class="card-block">
                                    <h4 class="card-title">Php Dasar</h4>
                                    <p class="card-text">Price: $0</p>
                                    <a href="#" data-name="Banana" data-price="1.22" class="add-to-cart btn btn-primary">Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="card" style="width: 20rem;">
                                <img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/commons/b/bf/Front-end-logo-color%402x.png" alt="Card image cap">
                                <div class="card-block">
                                    <h4 class="card-title">FrontEnd</h4>
                                    <p class="card-text">Price: $50</p>
                                    <a href="#" data-name="Lemon" data-price="5" class="add-to-cart btn btn-primary">Add to cart</a>
                                </div>
                            </div>
                        </div> -->
                        <?php }} ?>
                    </div>

                   
                    <style>
                        .show-cart li {
                            display: flex;
                        }
                        
                        .card {
                            margin-bottom: 20px;
                        }
                        
                        .card-img-top {
                            width: 200px;
                            height: 200px;
                            align-self: center;
                        }
                    </style>


            
                </div>

                <!-- END OVERVIEW -->


                <!-- END REALTIME CHART -->
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