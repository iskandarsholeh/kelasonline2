<?php
require 'db/db_connection.php';

// if(isset($_SESSION['login_id'])){
//     header('Location: home/index.php');
//     exit;
// }
require '../vendor/autoload.php';
// Creating new google client instance
$client = new Google_Client();

// Enter your Client ID
$client->setClientId('550724294949-07kqfqa8l4timk4u5j006lmb1ct101bq.apps.googleusercontent.com');
// Enter your Client Secrect
$client->setClientSecret('4tIDXyMiQgoRgCNFFreNm28B');
// Enter the Redirect URL
$client->setRedirectUri('http://localhost/kelas-kode22/index.php');

// Adding those scopes which we want to get (email & profile Information)
$client->addScope("email");
$client->addScope("profile");

                            

if(isset($_GET['code'])):

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if(!isset($token["error"])){

        $client->setAccessToken($token['access_token']);

        // getting profile information
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
    
        // Storing data into database
        $id = mysqli_real_escape_string($db_connection, $google_account_info->id);
        $full_name = mysqli_real_escape_string($db_connection, trim($google_account_info->name));
        $email = mysqli_real_escape_string($db_connection, $google_account_info->email);
        $profile_pic = mysqli_real_escape_string($db_connection, $google_account_info->picture);

        // checking user already exists or not
        $get_user = mysqli_query($db_connection, "SELECT * FROM users WHERE google_id='$id'");
        if(mysqli_num_rows($get_user) > 0){
            $user = mysqli_fetch_assoc($get_user);
            if($user['id_level']=="1"){
                $_SESSION['id'] = $user['id']; 
                $_SESSION['bayar'] = $user['bayar']; 
            $_SESSION['login_id'] = $id;
            $_SESSION['email'] = $user['email'];
            $_SESSION['id_level'] = $user['id_level'];
             
            header('Location: admin/index.php');
            exit;
            } else {
                $_SESSION['id'] = $user['id']; 
                $_SESSION['bayar'] = $user['bayar']; 
                $_SESSION['login_id'] = $id; 
                $_SESSION['email'] = $user['email'];
                $_SESSION['id_level'] = $user['id_level'];
                if($user['password']==NULL){
		header("location: home/epassword.php");
    }else
		header("location: home/");
		
    }
         
        }
        
        else{

            // if user not exists we will insert the user
            $insert = mysqli_query($db_connection, "INSERT INTO users(google_id,name,email,profile_image,id_level,hire_date) VALUES('$id','$full_name','$email','$profile_pic','2',NOW())");

            if($insert){
                $_SESSION['id'] = $user['id']; 
                $_SESSION['login_id'] = $id; 
                $_SESSION['bayar'] = $user['bayar']; 
                $_SESSION['email'] = $user['email'];
                $_SESSION['id_level'] = $user['id_level'];
                if($user['password']==NULL){
                    header("location: home/epassword.php");
                }else
                    header("location: home/");
                exit;
            }
            else{
                echo "Sign up failed!(Something went salah).";
            }

        }

    }
    else{
        header('Location: index.php');
        exit;
    }
    
else: 
    // Google Login Url = $client->createAuthUrl(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>KelasKode</title>

    <!-- Favicon -->

    <link rel="icon" sizes="76x76" href="admin/assets/img/favicon.png">
    <!-- Core Stylesheet -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">

</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="colorlib-load"></div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header_area animated">
        <div class="container-fluid">
            <div class="row align-items-center">
                <!-- Menu Area Start -->
                <div class="col-12 col-lg-10">
                    <div class="menu_area">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <!-- Logo -->
                            <a class="navbar-brand" href="#">KelasKode</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ca-navbar"
                                aria-controls="ca-navbar" aria-expanded="false" aria-label="Toggle navigation"><span
                                    class="navbar-toggler-icon"></span></button>
                            <!-- Menu Area -->
                            <div class="collapse navbar-collapse" id="ca-navbar">
                                <ul class="navbar-nav ml-auto" id="nav">
                                    <li class="nav-item active"><a class="nav-link" href="#home">Home</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#pricing">Pricing</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#testimonials">Testimonials</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#team">Team</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                                </ul>
                                <div class="sing-up-button d-lg-none">
                                    <a href="#loginModal" data-target="#loginModal" data-toggle="modal">Sign Up Free</a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- Signup btn -->
                <div class="col-12 col-lg-2">
                    <div class="sing-up-button d-none d-lg-block">
                        <?php 
                    if(!isset($_SESSION['login_id'])){
                      echo  '<a href="#loginModal" data-target="#loginModal" data-toggle="modal">Sign Up Free</a>';
                    } 
                    else{
                    // echo  '<a href="#loginModal" data-target="#loginModal" data-toggle="modal">Sign Up Frasddadee</a>';
                    $id = $_SESSION['login_id'];
                    $get_user = mysqli_query($db_connection, "SELECT * FROM users WHERE google_id='$id'");
                    if(mysqli_num_rows($get_user) > 0){
                    $user = mysqli_fetch_assoc($get_user);
                    }
                    echo  '<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="'.$user['profile_image'].'" class="img-circle" alt="Avatar"><span>'.$user['name'].'</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>';
                }
                    ?>
                        <ul class="dropdown-menu">
                            <li><a href="page-profile.php"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                            <li><a href="changepass.php"><i class="lnr lnr-pencil"></i> <span>Change Password</span></a>
                            </li>
                            <li><a href="logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
    <script>
    $(document).ready(function() {
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    });
    </script>

    <!-- Modal -->

    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h4 class="text-center form-title">Login</h4>
                    <div class="d-flex flex-column">
                        <form action="login/loginproses.php" method="post">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="username" id="mail"
                                        placeholder="Your Mail" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" id="pass"
                                        placeholder="Your Password" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-block btn-round">Login</button>
                        </form>
                        <div class="text-center text-muted mb-2">or use a social network</div>
                        <div class="d-flex justify-content-center social-buttons">

                            <a class="login-btn" href="<?php echo $client->createAuthUrl(); ?>"> <button type="button"
                                    class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top"
                                    title="Gmail"><i class="fa fa-google-plus" data-inline="false"></i></button></a>
                            <?php endif; ?>
                            <!-- <button type=" button " class="btn btn-secondary btn-round " data-toggle="tooltip " data-placement="top " title="Facebook "><i class=" fa fa-facebook "></i></button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->
    <!-- ***** Wellcome Area Start ***** -->
    <section class="wellcome_area clearfix" id="home">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 col-md">
                    <div class="wellcome-heading">
                        <h2>KelasKode</h2>
                        <h3>K</h3>
                        <p>Everything You Need. To Start Learning Coding Online</p>
                    </div>
                    <div class="get-start-area">
                        <!-- Form Start -->

                        <!-- Form End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Welcome thumb -->
        <div class="welcome-thumb wow fadeInDown" data-wow-delay="0.5s">
            <img src="img/bg-img/welcome-img.png" alt="">
        </div>
    </section>
    <!-- ***** Wellcome Area End ***** -->

    <!-- ***** Special Area Start ***** -->
    <section class="special-area bg-white section_padding_100" id="about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading Area -->
                    <div class="section-heading text-center">
                        <h2>Why Is It Special</h2>
                        <div class="line-shape"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Special Area -->
                <div class="col-12 col-md-4">
                    <div class="single-special text-center wow fadeInUp" data-wow-delay="0.2s">
                        <div class="single-icon">
                            <i class="ti-mobile" aria-hidden="true"></i>
                        </div>
                        <h4>Easy to use</h4>
                        <p>Platform kami sangat mudah digunakan dan sangat membantu orang orang untuk belajar ngoding
                            dari nol.</p>
                    </div>
                </div>
                <!-- Single Special Area -->
                <div class="col-12 col-md-4">
                    <div class="single-special text-center wow fadeInUp" data-wow-delay="0.4s">
                        <div class="single-icon">
                            <i class="ti-ruler-pencil" aria-hidden="true"></i>
                        </div>
                        <h4>Powerful Design</h4>
                        <p>Platform kami memberikan tampilan user interface yang memanjakan mata, agar nyaman bagi user.
                        </p>
                    </div>
                </div>
                <!-- Single Special Area -->
                <div class="col-12 col-md-4">
                    <div class="single-special text-center wow fadeInUp" data-wow-delay="0.6s">
                        <div class="single-icon">
                            <i class="ti-settings" aria-hidden="true"></i>
                        </div>
                        <h4>Customizability</h4>
                        <p>Terdapat banyak kelas yang kami tawarkan kepada user, dan juga memberikan pelayanan terbaik.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Special Description Area -->
        <div class="special_description_area mt-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="special_description_img">
                            <img src="img/bg-img/special.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-5 ml-xl-auto">
                        <div class="special_description_content">
                            <h2>KelasKode</h2>
                            <p><?php
                           
                           $select = mysqli_query($db_connection, "SELECT * FROM aboutus");
                           while ($row = $select->fetch_assoc()) {
                            echo $row['content'];
                           
                        }?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- ***** Special Area End ***** -->



    <!-- ***** Cool Facts Area Start ***** -->
    <section class="cool_facts_area clearfix ">
        <div class="container ">
            <div class="row ">
                <!-- Single Cool Fact-->
                <div class="col-12 col-md-3 col-lg-3 ">
                    <div class="single-cool-fact d-flex justify-content-center wow fadeInUp " data-wow-delay="0.2s ">
                        <div class="counter-area ">
                            <h3><span class="counter ">3</span></h3>
                        </div>
                        <div class="cool-facts-content ">
                            <i class="ion-easel "></i>
                            <p>KELAS <br> KODING</p>
                        </div>
                    </div>
                </div>
                <!-- Single Cool Fact-->
                <div class="col-12 col-md-3 col-lg-3 ">
                    <div class="single-cool-fact d-flex justify-content-center wow fadeInUp " data-wow-delay="0.4s ">
                        <div class="counter-area ">
                            <h3><span class="counter ">3</span></h3>
                        </div>
                        <div class="cool-facts-content ">
                            <i class="ion-bookmark "></i>
                            <p>BUKU <br> KODING</p>
                        </div>
                    </div>
                </div>
                <!-- Single Cool Fact-->
                <div class="col-12 col-md-3 col-lg-3 ">
                    <div class="single-cool-fact d-flex justify-content-center wow fadeInUp " data-wow-delay="0.6s ">
                        <div class="counter-area ">
                            <?php
                           
                            $count = mysqli_query($db_connection,"SELECT count(*) as total  FROM users where id_level='2'");
                            while($count1 = mysqli_fetch_array($count)){
                            
                            ?>
                            <h3><span class="counter ">
                                    <?= $count1['total'];?>
                                </span></h3>
                            <?php }?>
                        </div>
                        <div class="cool-facts-content ">
                            <i class="ion-person "></i>
                            <p>AKUN <br>AKTIF</p>
                        </div>
                    </div>
                </div>
                <!-- Single Cool Fact-->
                <div class="col-12 col-md-3 col-lg-3 ">
                    <div class="single-cool-fact d-flex justify-content-center wow fadeInUp " data-wow-delay="0.8s ">
                        <div class="counter-area ">
                            <h3><span class="counter ">10</span></h3>
                        </div>
                        <div class="cool-facts-content ">
                            <i class="ion-ios-star-outline "></i>
                            <p>TOTAL <br>APP RATES</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Cool Facts Area End ***** -->


    <!-- ***** Pricing Plane Area Start *****==== -->
    <section class="pricing-plane-area section_padding_100_70 clearfix" id="pricing">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Heading Text  -->
                    <div class="section-heading text-center">
                        <h2>Pricing Plan</h2>
                        <div class="line-shape"></div>
                    </div>
                </div>
            </div>

            <div class="row no-gutters">
                <div class="col-12 col-md-6 col-lg-3">
                    <!-- Package Price  -->
                    <div class="single-price-plan text-center">
                        <!-- Package Text  -->
                        <div class="package-plan ">
                            <h5>Html Dasar</h5>
                            <div class="ca-price d-flex justify-content-center ">
                                <span>$</span>
                                <h4>1</h4>
                            </div>
                        </div>
                        <div class="package-description">
                            <p>1 kelas</p>
                            <p>Pdf materi html</p>
                            <p>Quiz</p>
                            <p>-</p>
                            <p>-</p>
                        </div>
                        <!-- Plan Button  -->
                        <div class="plan-button">
                            <a href="#">Select Plan</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <!-- Package Price  -->
                    <div class="single-price-plan text-center">
                        <!-- Package Text  -->
                        <div class="package-plan">
                            <h5>Frontend</h5>
                            <div class="ca-price d-flex justify-content-center ">
                                <span>$</span>
                                <h4>15</h4>
                            </div>
                        </div>
                        <div class="package-description">
                            <p>1 Kelas</p>
                            <p>HTML, CSS, JS</p>
                            <p>QUIZ</p>
                            <p>Forum</p>
                            <p>-</p>
                        </div>
                        <!-- Plan Button  -->
                        <div class="plan-button">
                            <a href="#">Select Plan</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <!-- Package Price  -->
                    <div class="single-price-plan active text-center">
                        <!-- Package Text  -->
                        <div class="package-plan">
                            <h5>Backend</h5>
                            <div class="ca-price d-flex justify-content-center ">
                                <span>$</span>
                                <h4>15</h4>
                            </div>
                        </div>
                        <div class="package-description">
                            <p>1 Kelas</p>
                            <p>Sql, PHP, JS</p>
                            <p>QUIZ</p>
                            <p>Forum</p>
                            <p>-</p>
                        </div>
                        <!-- Plan Button  -->
                        <div class="plan-button">
                            <a href="#">Select Plan</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <!-- Package Price  -->
                    <div class="single-price-plan text-center">
                        <!-- Package Text  -->
                        <div class="package-plan">
                            <h5>Full Stack</h5>
                            <div class="ca-price d-flex justify-content-center ">
                                <span>$</span>
                                <h4>50</h4>
                            </div>
                        </div>
                        <div class="package-description">
                            <p>2 Kelas</p>
                            <p>Full Pack</p>
                            <p>Quiz</p>
                            <p>Forum</p>
                            <p>Mentor</p>
                        </div>
                        <!-- Plan Button  -->
                        <div class="plan-button">
                            <a href="#">Select Plan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Pricing Plane Area End ***** -->

    <!-- ***** Client Feedback Area Start ***** -->
    <section class="clients-feedback-area bg-white section_padding_100 clearfix" id="testimonials">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="slider slider-for">
                        <!-- Client Feedback Text  -->
                        <div class="client-feedback-text text-center">
                            <div class="client">
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <div class="client-description text-center">
                                <p>“ Saya telah menggunakan KodeKelas selama 3 bulan, terimakasih KodeKelas dengan fitur
                                    fitur yang diberikan sangat bermanfaat. ”</p>
                            </div>
                            <div class="star-icon text-center">
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                            </div>
                            <div class="client-name text-center">
                                <h5>ASteven Backham</h5>
                                <p>Mahasiswa</p>
                            </div>
                        </div>
                        <!-- Client Feedback Text  -->
                        <div class="client-feedback-text text-center">
                            <div class="client">
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <div class="client-description text-center">
                                <p>“ Sya Menggunakan KodeKelas Lebih dari 2 Bulan, setelah belajar di KodeKelas saya
                                    dapat Mengerjakan tugas tugas sekolah.”</p>
                            </div>
                            <div class="star-icon text-center">
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                            </div>
                            <div class="client-name text-center">
                                <h5>Jennifer</h5>
                                <p>Pelajar</p>
                            </div>
                        </div>
                        <!-- Client Feedback Text  -->
                        <div class="client-feedback-text text-center">
                            <div class="client">
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <div class="client-description text-center">
                                <p>“ Saya memiliki masalah saat mengerjakan ujian kompetensi di sekolah, setelah join ke
                                    KodeKelas saya dapat mengerjakan Ujian Kompetensi saya”</p>
                            </div>
                            <div class="star-icon text-center">
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                            </div>
                            <div class="client-name text-center">
                                <h5>Helen</h5>
                                <p>Pelajar</p>
                            </div>
                        </div>
                        <!-- Client Feedback Text  -->
                        <div class="client-feedback-text text-center">
                            <div class="client">
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <div class="client-description text-center">
                                <p>“ Saya merupakan pelajar SMP yang belajar di KodeKelas ”</p>
                            </div>
                            <div class="star-icon text-center">
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                            </div>
                            <div class="client-name text-center">
                                <h5>Henry smith</h5>
                                <p>Pelajar</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Client Thumbnail Area -->
                <div class="col-12 col-md-6 col-lg-5">
                    <div class="slider slider-nav">
                        <div class="client-thumbnail">
                            <img src="img/bg-img/client-3.jpg" alt="">
                        </div>
                        <div class="client-thumbnail">
                            <img src="img/bg-img/client-2.jpg" alt="">
                        </div>
                        <div class="client-thumbnail">
                            <img src="img/bg-img/client-1.jpg" alt="">
                        </div>
                        <div class="client-thumbnail">
                            <img src="img/bg-img/client-2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Client Feedback Area End ***** -->

    <!-- ***** CTA Area Start ***** -->
    <section class="our-monthly-membership section_padding_50 clearfix">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="membership-description">
                        <h2>Come to Join</h2>
                        <p>Find the perfect plan for you — 100% satisfaction guaranteed.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="get-started-button wow bounceInDown" data-wow-delay="0.5s">
                        <a href="#loginModal" data-target="#loginModal" data-toggle="modal">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** CTA Area End ***** -->

    <!-- ***** Our Team Area Start ***** -->

    <section class="our-Team-area bg-white section_padding_100_50 clearfix" id="team">

        <div class="container ">
            <div class="row ">

                <div class="col-12 text-center ">
                    <!-- Heading Text  -->
                    <div class="section-heading ">
                        <h2>Our Team</h2>
                        <div class="line-shape "></div>
                    </div>
                </div>
            </div>
            <div class="row ">
                <?php
    $select = mysqli_query($db_connection, "SELECT * FROM team");
                           while ($row = $select->fetch_assoc()) {
                           
                           
                        ?>
                <div class="col-12 col-md-6 col-lg-4 ">
                    <div class="single-team-member ">
                        <div class="member-image ">
                            <img src="img/team-img/<?php echo $row['foto']; ?> " alt=" ">
                            <div class="team-hover-effects ">
                                <div class="team-social-icon ">
                                    <a href="# "><i class="fa fa-facebook " aria-hidden="true "></i></a>
                                    <a href="# "><i class="fa fa-twitter " aria-hidden="true "></i></a>
                                    <a href="# "><i class="fa fa-google-plus " aria-hidden="true "></i></a>
                                    <a href="# "> <i class="fa fa-instagram " aria-hidden="true "></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="member-text ">
                            <h4> <?php echo $row['nama']; ?></h4>
                            <p> <?php echo $row['jabatan']; ?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!-- <div class="col-12 col-md-6 col-lg-4 ">
                    <div class="single-team-member ">
                        <div class="member-image ">
                            <img src="img/team-img/raffi.JPG " alt=" ">
                            <div class="team-hover-effects ">
                                <div class="team-social-icon ">
                                    <a href="# "><i class="fa fa-facebook " aria-hidden="true "></i></a>
                                    <a href="# "><i class="fa fa-twitter " aria-hidden="true "></i></a>
                                    <a href="# "><i class="fa fa-google-plus " aria-hidden="true "></i></a>
                                    <a href="# "> <i class="fa fa-instagram " aria-hidden="true "></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="member-text ">
                            <h4>Rafi Abbyan</h4>
                            <p>CTO</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 ">
                    <div class="single-team-member ">
                        <div class="member-image ">
                            <img src="img/team-img/arina.JPG " alt=" ">
                            <div class="team-hover-effects ">
                                <div class="team-social-icon ">
                                    <a href="# "><i class="fa fa-facebook " aria-hidden="true "></i></a>
                                    <a href="# "><i class="fa fa-twitter " aria-hidden="true "></i></a>
                                    <a href="# "><i class="fa fa-google-plus " aria-hidden="true "></i></a>
                                    <a href="# "> <i class="fa fa-instagram " aria-hidden="true "></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="member-text ">
                            <h4>Dinda Arinawati</h4>
                            <p>Business Planner</p>
                        </div>
                    </div>
                </div> -->

            </div>
        </div>
    </section>
    <!-- ***** Our Team Area End ***** -->

    <!-- ***** Contact Us Area Start ***** -->
    <section class="footer-contact-area section_padding_100 clearfix" id="contact">
        <div class="container ">
            <div class="row ">
                <div class="col-md-6 ">
                    <!-- Heading Text  -->
                    <div class="section-heading ">
                        <h2>Get in touch with us!</h2>
                        <div class="line-shape "></div>
                    </div>
                    <div class="footer-text ">
                        <p></p>
                    </div>
                    <div class="address-text ">
                        <p><span>Address:</span> -</p>
                    </div>
                    <div class="phone-text ">
                        <p><span>Phone:</span> 082228300495</p>
                    </div>
                    <div class="email-text ">
                        <p><span>Email:</span> kodekelas@gmail.com</p>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <!-- Form Start-->
                    <style>
                    .notify {
                    padding: 10px;
                    background-color: #FFD76E;
                     margin-bottom: 10px;
                     border-radius: 3px;
                    font-weight: bold;
                    }
                    </style>
                    <div class="contact_from ">
                    <form id="contact" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                     <?php if(!empty($notify)){ ?>
                      <p class="notify <?php echo !empty($notifyClass)?$notifyClass:''; ?>"><?php echo $notify; ?></p>
                     <?php } ?>
                            <!-- Message Input Area Start -->
                            <div class="contact_input_area ">
                                <div class="row ">
                                    <!-- Single Input Area Start -->
                                    <div class="col-md-12 ">
                                        <div class="form-group ">
                                            <input placeholder="Your Name " class="form-control "  type="text" name="name" tabindex="1" required autofocus>
                                        </div>
                                    </div>
                                    <!-- Single Input Area Start -->
                                    <div class="col-md-12 ">
                                        <div class="form-group ">
                                        <fieldset>
                                        <input placeholder="Email Anda" class="form-control " type="text" name="email" tabindex="2" required>
                                        </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-12 ">
                                        <div class="form-group ">
                                        <fieldset>
                                        <input placeholder="Subject (optional)" class="form-control " type="text" name="subject" tabindex="4" required>
                                        </fieldset>        
                                        </div>
                                    </div>
                                    <!-- Single Input Area Start -->
                                    <div class="col-12 ">
                                        <div class="form-group ">
                                        <fieldset>
                                        <textarea placeholder="Ketikan pesan Anda" class="form-control " name="message" tabindex="5" required></textarea>
                                        </fieldset>
                                        </div>
                                    </div>
                                    <!-- Single Input Area Start -->
                                    <div class="col-12 ">
                                    <fieldset>
                                      
                                        <button name="submit" type="submit" id="contact-submit" class="btn submit-btn data-submit data-submit="...Mengirim pesan">Kirim</button>
                                    </fieldset>
                                    </div>
                                </div>
                            </div>
                            <!-- Message Input Area End -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Contact Us Area End ***** -->
<?php
$notify = '';
$notifyClass = '';
  
if(isset($_POST['submit'])){
    // Membuat variabl untuk menerima data dari form
    $email = $_POST['email'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
  
    // Cek apakah ada data yang belum diisi
    if(!empty($email) && !empty($name) && !empty($subject) && !empty($message)){
  
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $notify = 'Email Anda salah. Silakan ketikan alamat email yang benar.';
            $notifyClass = 'errordiv';
        }else{
            // Pengaturan penerima email dan subjek email
            $toEmail = 'info@eplusgo.com'; // Ganti dengan alamat email yang Anda inginkan
            $emailSubject = 'Pesan website dari '.$name;
            $htmlContent = '<h2> via Form Kontak Website</h2>
                <h4>Nama</h4><p>'.$name.'</p>
                <h4>Email</h4><p>'.$email.'</p>
                <h4>Subject</h4><p>'.$subject.'</p>
                <h4>Message</h4><p>'.$message.'</p>';
  
            // Mengatur Content-Type header untuk mengirim email dalam bentuk HTML
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  
            // Header tambahan
            $headers .= 'From: '.$name.'<'.$email.'>'. "\r\n";
  
            // Kirim email
            if(mail($toEmail,$emailSubject,$htmlContent,$headers)){
                $notify = 'Pesan Anda sudah terkirim dengan sukses !';
                $notifyClass = 'succdiv';
            }else{
                $notify = 'Maaf pesan Anda gagal terkirim, silahkan ulangi lagi.';
                $notifyClass = 'errordiv';
            }
        }
    }else{
        $notify = 'Harap mengisi semua field data';
        $notifyClass = 'errordiv';
    }
}
?>
    <!-- ***** Footer Area Start ***** -->
    <footer class="footer-social-icon text-center section_padding_70 clearfix">
        <!-- footer logo -->
        <div class="footer-text">
            <h2>KelasKode</h2>
        </div>
        <!-- social icon-->
        <div class="footer-social-icon">
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#"><i class="active fa fa-twitter" aria-hidden="true"></i></a>
            <a href="#"> <i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
        </div>
        <div class="footer-menu">
            <nav>
                <ul>
                    <li><a href="# ">About</a></li>
                    <li><a href="# ">Terms &amp; Conditions</a></li>
                    <li><a href="# ">Privacy Policy</a></li>
                    <li><a href="# ">Contact</a></li>
                </ul>
            </nav>
        </div>
        <!-- Foooter Text-->
        <div class="copyright-text">
            <!-- ***** Removing this text is now allowed! This template is licensed under CC BY 3.0 ***** -->

        </div>
    </footer>
    <!-- ***** Footer Area Start ***** -->

    <!-- Jquery-2.2.4 JS -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap-4 Beta JS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All Plugins JS -->
    <script src="js/plugins.js"></script>
    <!-- Slick Slider Js-->
    <script src="js/slick.min.js"></script>
    <!-- Footer Reveal JS -->
    <script src="js/footer-reveal.min.js"></script>
    <!-- Active JS -->
    <script src="js/active.js"></script>
</body>

</html>