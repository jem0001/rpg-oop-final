<?php include('./class/DbFileManager');
$dbFileManager = new DbFileManager();
$db = $dbFileManager->connection;

if (!$db) {
    header("location:index-2.php");
    exit();
}

$query = "SELECT * FROM home_setup,aboutus_setup";
$runquery = mysqli_query($db, $query);

$data = mysqli_fetch_array($runquery);
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $data['name'] ?></title>
    <link rel="icon" href="assets/img/<?= $data['profilepic'] ?>">
    <!-- <meta content="<?= $data['description'] ?>" name="description"> -->


    <!-- Favicons -->
    <!-- <link href="assets/img/<?= $data['icon'] ?>" rel="icon">
    <link href="assets/img/<?= $data['icon'] ?>" rel="apple-touch-icon"> -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">


    <style>
        #hero {


            background-image: url(assets/img/<?= $data['homewallpaper'] ?>);
        }
    </style>
</head>

<body>

    <!-- ======= Mobile nav toggle button ======= -->
    <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

    <!-- ======= Header ======= -->
    <header id="header">
        <div class="d-flex flex-column">

            <div class="profile">
                <img src="assets/img/<?= $data['profilepic'] ?>" alt="" class="img-fluid rounded-circle">
                <h1 class="text-light"><a href="#"><?= $data['name'] ?></a></h1>
                <div class="social-links mt-3 text-center">
                    <?php

                    if ($data['netlify'] != "") {
                    ?>
                        <a href="<?= $data['netlify'] ?>" class="netlify"><i class="fa fa-link"></i></a>
                    <?php
                    }
                    if ($data['github'] != "") {
                    ?>
                        <a href="<?= $data['github'] ?>" class="github"><i class="bx bxl-github"></i></a>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <nav class="nav-menu">
                <ul>
                    <li class=""><a href="#hero"><i class="bx bx-home"></i> <span>Home</span></a></li>
                    <li><a href="#characters"><i class="fa fa-users"></i> Characters</a></li>
                    <li><a href="#settings"><i class="fa fa-map-o"></i> <span>Settings</span></a></li>
                    <li><a href="#script"><i class="fa fa-book"></i> Script</a></li>
                    <li><a href="#storyboard"><i class="fa fa-book"></i> Storyboard</a></li>
                    <li><a href="#developer"><i class="bx bx-user"></i> <span>Developer</span></a></li>


                </ul>
            </nav><!-- .nav-menu -->
            <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
        <img src="assets/img/<?= $data['homewallpaper'] ?>" class="homewallpaper" alt="" style="width: 100%; height: 100vh; position: absolute; z-index: -100;">
        <div class="hero-container" data-aos="fade-in">

        </div>
    </section><!-- End Hero -->

    <main id="main">




        <!-- ======= Character Section ======= -->
        <section id="characters" class="portfolio section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>Characters</h2>
                </div>


                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">

                    <?php
                    $query5 = "SELECT * FROM characters";
                    $runquery5 = mysqli_query($db, $query5);
                    while ($data5 = mysqli_fetch_array($runquery5)) {
                    ?>
                        <div class="col-lg-4 col-md-6 portfolio-item">
                            <div class="portfolio-wrap">
                                <img src="assets/img/<?= $data5['charpic'] ?>" class="img-fluid" alt="">
                                <div class="portfolio-links" title="<?= $data5['charname'] ?>">

                                    <a href="assets/img/<?= $data5['charpic'] ?>" data-gall="portfolioGallery" class="venobox" style="font-size: 16px;" title="<?= $data5['charname'] ?>"><?= $data5['charname'] ?></a>


                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>





                </div>

            </div>
        </section><!-- End Character Section -->

        <!-- ======= Settings Section ======= -->
        <section id="settings" class="portfolio section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>Settings</h2>
                </div>


                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">

                    <?php
                    $query6 = "SELECT * FROM settings";
                    $runquery6 = mysqli_query($db, $query6);
                    while ($data6 = mysqli_fetch_array($runquery6)) {
                    ?>
                        <div class="col-lg-4 col-md-6 portfolio-item">
                            <div class="portfolio-wrap">
                                <img src="assets/img/<?= $data6['settpic'] ?>" class="img-fluid" alt="">
                                <div class="portfolio-links" title="<?= $data6['settname'] ?>">

                                    <a href="assets/img/<?= $data6['settpic'] ?>" data-gall="portfolioGallery" class="venobox" style="font-size: 16px;" title="<?= $data6['settname'] ?>"><?= $data6['settname'] ?></a>


                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>





                </div>

            </div>
        </section><!-- End Setting Section -->

        <!-- Script Section -->
        <section id="script" class="portfolio section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>Script, Questionnare, and Answer Key</h2>
                </div>


                <iframe name="myiframe" id="myiframe" src="assets/Tulalang-Script.pdf" style="width: 100%; height: 100vh;"></iframe>

            </div>
        </section><!-- End Script Section -->
        <!-- Storyboard Section -->
        <section id="storyboard" class="portfolio section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>Storyboard</h2>
                </div>


                <iframe name="myiframe" id="myiframe" src="assets/Storyboard (1).pdf" style="width: 100%; height: 100vh;"></iframe>

            </div>
        </section><!-- End Storyboard Section -->

        <!-- ======= Developer Section ======= -->
        <section id="developer" class="about">
            <div class="container">

                <div class="section-title">
                    <h2>Developers</h2>

                </div>

                <div class="row">
                    <div class="col-lg-4" data-aos="fade-right">
                        <img src="assets/img/about.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
                        <h3>Jemuel Salcedo</h3>
                        <div>
                            <ul class="row" style="padding-top: 2rem;">
                                <li class="col-lg-6"><i class="icofont-rounded-right"></i> <strong>Year level: </strong>3rd year college</li>
                                <li class="col-lg-6"><i class="icofont-rounded-right"></i> <strong>Section: </strong>3WMAD2</li>
                                <li class="col-lg-6"><i class="icofont-rounded-right"></i> <strong>Email : </strong>0321-3087@lspu.edu.ph</li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="row" style="margin-top: 1rem;">
                    <div class="col-lg-4" data-aos="fade-right">
                        <img src="assets/img/about1.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
                        <h3>Neil Gabrielle Retuerto</h3>
                        <div>
                            <ul class="row" style="padding-top: 2rem;">
                                <li class="col-lg-6"><i class="icofont-rounded-right"></i> <strong>Year level: </strong>3rd year college</li>
                                <li class="col-lg-6"><i class="icofont-rounded-right"></i> <strong>Section: </strong>3WMAD2</li>
                                <li class="col-lg-6"><i class="icofont-rounded-right"></i> <strong>Email : </strong>0321-3624@lspu.edu.ph</li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
        </section><!-- End About Section -->





    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <!--
            <div class="copyright">
                &copy; Copyright <strong><span>iPortfolio</span></strong>
            </div>
-->
            <div class="credits">
                Developed in<a href="#"> 2024</a>
            </div>
        </div>
    </footer><!-- End  Footer -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
    <?php $dbFileManager->closeDb() ?>

    <!-- Vendor JS Files -->
    <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counterup/counterup.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/typed.js/typed.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
        if (window.self == window.top) {
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o), m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '../../../../www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-55234356-4', 'auto');
            ga('send', 'pageview');
        }
    </script>
</body>


<!-- Mirrored from bootstrapmade.com/demo/themes/iPortfolio/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 May 2020 03:40:16 GMT -->

</html>