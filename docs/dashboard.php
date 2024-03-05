<?php

session_start();

error_reporting(0);

include('includes/config.php');

if(strlen($_SESSION['login'])==0)

  { 

header('location:index.php');

}

else{?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

  <!-- Google Tag Manager -->

  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':

  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],

  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=

  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);

  })(window,document,'script','dataLayer','GTM-MWZKDP7H');</script>

  <!-- End Google Tag Manager -->

<link rel='dns-prefetch' href='//fonts.googleapis.com' />

<link rel='preconnect' href='https://code.jquery.com' />

<script src="https://kit.fontawesome.com/d11b59cd3d.js" crossorigin="anonymous"></script>







<!--  -->

<link rel='stylesheet' id='vtx-css-css' href='assets/css/main.be0e7d.css' type='text/css' media='all' />

<!--  -->







<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js" id="jquery-js"></script>

</head>

<head>

    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <meta name="description" content="" />

    <meta name="author" content="" />

    <title>SGBL OF ESGR | TABLEAU DE BORD UTILISATEUR</title>

    <!-- BOOTSTRAP CORE STYLE  -->

    <link href="assets/css/bootstrap.css" rel="stylesheet" />

    <!-- FONT AWESOME STYLE  -->

    <link href="assets/css/font-awesome.css" rel="stylesheet" />

    <!-- CUSTOM STYLE  -->

    <link href="assets/css/style.css" rel="stylesheet" />

    <!-- GOOGLE FONT -->

    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <!-- Favicon -->

    <link rel="apple-touch-icon" sizes="180x180" href="https://esgr.csspo.gouv.qc.ca/wp-content/themes/ecoles.csspo.gouv.qc.ca/assets/favicon/apple-touch-icon.png">

    <link rel="icon" type="image/png" sizes="32x32" href="https://esgr.csspo.gouv.qc.ca/wp-content/themes/ecoles.csspo.gouv.qc.ca/assets/favicon/favicon-32x32.png">

    <link rel="icon" type="image/png" sizes="16x16" href="https://esgr.csspo.gouv.qc.ca/wp-content/themes/ecoles.csspo.gouv.qc.ca/assets/favicon/favicon-16x16.png">

    <link rel="manifest" href="https://esgr.csspo.gouv.qc.ca/wp-content/themes/ecoles.csspo.gouv.qc.ca/assets/favicon/site.webmanifest">

    <link rel="mask-icon" href="https://esgr.csspo.gouv.qc.ca/wp-content/themes/ecoles.csspo.gouv.qc.ca/assets/favicon/safari-pinned-tab.svg" color="#00a6e9">



</head>

<body>

      <!------MENU SECTION START-->

<?php include('includes/header.php');?>

<!-- MENU SECTION END-->

    <div class="content-wrapper">

         <div class="container">

        <div class="row pad-botm">

            <div class="col-md-12">

                <h4 class="header-line">TABLEAU DE BORD UTILISATEUR</h4>

                

            </div>



        </div>

             

             <div class="row">







            

                 <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-info back-widget-set text-center">
                        <a href="issued-books.php">
                          <img src="https://cdn-icons-png.freepik.com/512/5597/5597135.png" alt style="width: 65%">
                        </a>

<?php 

$sid=$_SESSION['stdid'];

$sql1 ="SELECT id from tblissuedbookdetails where StudentID=:sid";

$query1 = $dbh -> prepare($sql1);

$query1->bindParam(':sid',$sid,PDO::PARAM_STR);

$query1->execute();

$results1=$query1->fetchAll(PDO::FETCH_OBJ);

$issuedbooks=$query1->rowCount();

?>



                            <h3><?php echo htmlentities($issuedbooks);?> </h3>

                            Nombre d'emprunts

                        </div>

                    </div>

             

               <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-warning back-widget-set text-center">
                        <a href="issued-books.php">
                          <img src="https://cdn-icons-png.freepik.com/512/5597/5597034.png" alt style="width: 65%">
                        </a>

<?php 

$rsts=0;

$sql2 ="SELECT id from tblissuedbookdetails where StudentID=:sid and RetrunStatus=:rsts";

$query2 = $dbh -> prepare($sql2);

$query2->bindParam(':sid',$sid,PDO::PARAM_STR);

$query2->bindParam(':rsts',$rsts,PDO::PARAM_STR);

$query2->execute();

$results2=$query2->fetchAll(PDO::FETCH_OBJ);

$returnedbooks=$query2->rowCount();

?>



                            <h3><?php echo htmlentities($returnedbooks);?></h3>

                          Livres non retournés

                        </div>

                    </div>

        </div>



        <div class="row">

                <header class="site-header" role="banner">   

                  <div class="header-slider text-color-white">

                    <div class="header-slider__carousel swiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">

                      <div class="swiper-wrapper" id="swiper-wrapper-677e2f89105cab10bb" aria-live="off" style="transform: translate3d(-5432px, 0px, 0px); transition-duration: 0ms;"><div class="header-slider__slide swiper-slide swiper-slide-duplicate swiper-slide-next swiper-slide-duplicate-prev" data-swiper-slide-index="2" style="width: 1358px;" role="group" aria-label="3 / 3">

                          

                                        <div class="header-slider__slide__inner container">

                              <a href="https://esgr.csspo.gouv.qc.ca/" class="custom-logo-link" rel="home" aria-current="page"><img width="1563" height="1563" src="https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere.png" class="custom-logo" alt="Ã‰cole secondaire Grande-RiviÃ¨re" decoding="async" srcset="https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere.png 1563w, https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere-300x300.png 300w, https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere-1024x1024.png 1024w, https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere-150x150.png 150w, https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere-768x768.png 768w, https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere-1536x1536.png 1536w" sizes="(max-width: 1563px) 100vw, 1563px"></a>              <p class="header-slider__slide__title">Ensemble vers<br> la r&#233;ussite!</p>

                                                          <div class="header-slider__slide__divider" aria-hidden="true">

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 104 8" xml:space="preserve"><path fill="#10E0C6" d="m91.05 4.27 1.32-.03c3.56-.42 7.22.57 10.99-.57-.22-.01-.43-.03-.65-.03.02.44-.86.23-.98.17-.92.32-1.9.19-2.87.07.27-.32 1.44-.18.56.03m0-.01c1.14-.27 2.2-.31 3.3-.26.01-.01.02-.03.03-.04-4.43-.84-8-.31-12.43-1.1-.21-.05-.16.39-.58.29-1.5-.28-2.68.61-3.6-.53-.4-.5-45.42-2.02-68.1.05-3.42 1.06-9.62.63-6.65.12-5.25.85-7.34.03-9.98 1.6-.21.11-2.49 1.99 1.91 2.72 27.48-.54 55.26-1.98 82.7-2.38-.02.01-.06.02-.08.04 1.56-.27 3.45-.01 5.11-.14"></path></svg>              </div>

                            </div>

                          </div>

                                  <div class="header-slider__slide swiper-slide swiper-slide-duplicate-active" data-swiper-slide-index="0" style="width: 1358px;" role="group" aria-label="1 / 3">

                            <picture class="header-slider__slide__background">

                              <img src="https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2024/01/Photo-bandeau-secondaire-3-2.png" alt="">

                            </picture>

                                        <div class="header-slider__slide__inner container">

                              <a href="https://esgr.csspo.gouv.qc.ca/" class="custom-logo-link" rel="home" aria-current="page"><img width="1563" height="1563" src="https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere.png" class="custom-logo" alt="Ã‰cole secondaire Grande-RiviÃ¨re" decoding="async" srcset="https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere.png 1563w, https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere-300x300.png 300w, https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere-1024x1024.png 1024w, https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere-150x150.png 150w, https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere-768x768.png 768w, https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere-1536x1536.png 1536w" sizes="(max-width: 1563px) 100vw, 1563px"></a>              <p class="header-slider__slide__title">Ensemble vers<br> la r&#233;ussite!</p>

                                                          <div class="header-slider__slide__divider" aria-hidden="true">

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 104 8" xml:space="preserve"><path fill="#10E0C6" d="m91.05 4.27 1.32-.03c3.56-.42 7.22.57 10.99-.57-.22-.01-.43-.03-.65-.03.02.44-.86.23-.98.17-.92.32-1.9.19-2.87.07.27-.32 1.44-.18.56.03m0-.01c1.14-.27 2.2-.31 3.3-.26.01-.01.02-.03.03-.04-4.43-.84-8-.31-12.43-1.1-.21-.05-.16.39-.58.29-1.5-.28-2.68.61-3.6-.53-.4-.5-45.42-2.02-68.1.05-3.42 1.06-9.62.63-6.65.12-5.25.85-7.34.03-9.98 1.6-.21.11-2.49 1.99 1.91 2.72 27.48-.54 55.26-1.98 82.7-2.38-.02.01-.06.02-.08.04 1.56-.27 3.45-.01 5.11-.14"></path></svg>              </div>

                            </div>

                          </div>

                                  <div class="header-slider__slide swiper-slide" data-swiper-slide-index="1" style="width: 1358px;" role="group" aria-label="2 / 3">

                            <picture class="header-slider__slide__background">

                              <img src="https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2024/01/Photo-bandeau-secondaire-2.png" alt="">

                            </picture>

                                        <div class="header-slider__slide__inner container">

                              <a href="https://esgr.csspo.gouv.qc.ca/" class="custom-logo-link" rel="home" aria-current="page"><img width="1563" height="1563" src="https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere.png" class="custom-logo" alt="Ã‰cole secondaire Grande-RiviÃ¨re" decoding="async" srcset="https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere.png 1563w, https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere-300x300.png 300w, https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere-1024x1024.png 1024w, https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere-150x150.png 150w, https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere-768x768.png 768w, https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere-1536x1536.png 1536w" sizes="(max-width: 1563px) 100vw, 1563px"></a>              <p class="header-slider__slide__title">Ensemble vers<br> la r&#233;ussite!</p>

                                                          <div class="header-slider__slide__divider" aria-hidden="true">

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 104 8" xml:space="preserve"><path fill="#10E0C6" d="m91.05 4.27 1.32-.03c3.56-.42 7.22.57 10.99-.57-.22-.01-.43-.03-.65-.03.02.44-.86.23-.98.17-.92.32-1.9.19-2.87.07.27-.32 1.44-.18.56.03m0-.01c1.14-.27 2.2-.31 3.3-.26.01-.01.02-.03.03-.04-4.43-.84-8-.31-12.43-1.1-.21-.05-.16.39-.58.29-1.5-.28-2.68.61-3.6-.53-.4-.5-45.42-2.02-68.1.05-3.42 1.06-9.62.63-6.65.12-5.25.85-7.34.03-9.98 1.6-.21.11-2.49 1.99 1.91 2.72 27.48-.54 55.26-1.98 82.7-2.38-.02.01-.06.02-.08.04 1.56-.27 3.45-.01 5.11-.14"></path></svg>              </div>

                            </div>

                          </div>

                                  <div class="header-slider__slide swiper-slide swiper-slide-prev swiper-slide-duplicate-next" data-swiper-slide-index="2" style="width: 1358px;" role="group" aria-label="3 / 3">

                            <picture class="header-slider__slide__background">

                              <img src="https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2024/01/Bandeaux-officiels-sites-web-secondaire-1-pale-1920-x-877-px-1.png" alt="">

                            </picture>

                                        <div class="header-slider__slide__inner container">

                              <a href="https://esgr.csspo.gouv.qc.ca/" class="custom-logo-link" rel="home" aria-current="page"><img width="1563" height="1563" src="https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere.png" class="custom-logo" alt="Ã‰cole secondaire Grande-RiviÃ¨re" decoding="async" srcset="https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere.png 1563w, https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere-300x300.png 300w, https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere-1024x1024.png 1024w, https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere-150x150.png 150w, https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere-768x768.png 768w, https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere-1536x1536.png 1536w" sizes="(max-width: 1563px) 100vw, 1563px"></a>              <p class="header-slider__slide__title">Ensemble vers<br> la r&#233;ussite!</p>

                                                          <div class="header-slider__slide__divider" aria-hidden="true">

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 104 8" xml:space="preserve"><path fill="#10E0C6" d="m91.05 4.27 1.32-.03c3.56-.42 7.22.57 10.99-.57-.22-.01-.43-.03-.65-.03.02.44-.86.23-.98.17-.92.32-1.9.19-2.87.07.27-.32 1.44-.18.56.03m0-.01c1.14-.27 2.2-.31 3.3-.26.01-.01.02-.03.03-.04-4.43-.84-8-.31-12.43-1.1-.21-.05-.16.39-.58.29-1.5-.28-2.68.61-3.6-.53-.4-.5-45.42-2.02-68.1.05-3.42 1.06-9.62.63-6.65.12-5.25.85-7.34.03-9.98 1.6-.21.11-2.49 1.99 1.91 2.72 27.48-.54 55.26-1.98 82.7-2.38-.02.01-.06.02-.08.04 1.56-.27 3.45-.01 5.11-.14"></path></svg>              </div>

                            </div>

                          </div>

                              <div class="header-slider__slide swiper-slide swiper-slide-duplicate swiper-slide-active" data-swiper-slide-index="0" role="group" aria-label="1 / 3" style="width: 1358px;">

                            <picture class="header-slider__slide__background">

                              <img src="https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2024/01/Photo-bandeau-secondaire-3-2.png" alt="">

                            </picture>

                                        <div class="header-slider__slide__inner container">

                              <a href="https://esgr.csspo.gouv.qc.ca/" class="custom-logo-link" rel="home" aria-current="page"><img width="1563" height="1563" src="https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere.png" class="custom-logo" alt="Ã‰cole secondaire Grande-RiviÃ¨re" decoding="async" srcset="https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere.png 1563w, https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere-300x300.png 300w, https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere-1024x1024.png 1024w, https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere-150x150.png 150w, https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere-768x768.png 768w, https://esgr.csspo.gouv.qc.ca/wp-content/uploads/sites/34/2023/10/cropped-044-Ecole-secondaire-Grande-Riviere-1536x1536.png 1536w" sizes="(max-width: 1563px) 100vw, 1563px"></a>              <p class="header-slider__slide__title">Ensemble vers<br> la rÃ©ussite!</p>

                                                          <div class="header-slider__slide__divider" aria-hidden="true">

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 104 8" xml:space="preserve"><path fill="#10E0C6" d="m91.05 4.27 1.32-.03c3.56-.42 7.22.57 10.99-.57-.22-.01-.43-.03-.65-.03.02.44-.86.23-.98.17-.92.32-1.9.19-2.87.07.27-.32 1.44-.18.56.03m0-.01c1.14-.27 2.2-.31 3.3-.26.01-.01.02-.03.03-.04-4.43-.84-8-.31-12.43-1.1-.21-.05-.16.39-.58.29-1.5-.28-2.68.61-3.6-.53-.4-.5-45.42-2.02-68.1.05-3.42 1.06-9.62.63-6.65.12-5.25.85-7.34.03-9.98 1.6-.21.11-2.49 1.99 1.91 2.72 27.48-.54 55.26-1.98 82.7-2.38-.02.01-.06.02-.08.04 1.56-.27 3.45-.01 5.11-.14"></path></svg>              </div>

                            </div>

                          </div></div>

                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>

                  </div>





                <!--[CDATA[ */

                var aiStrings = {"play_title":"Play %s","pause_title":"Pause %s","previous":"Previous track","next":"Next track","toggle_list_repeat":"Toggle track listing repeat","toggle_track_repeat":"Toggle track repeat","toggle_list_visible":"Toggle track listing visibility","buy_track":"Buy this track","download_track":"Download this track","volume_up":"Volume Up","volume_down":"Volume Down","open_track_lyrics":"Open track lyrics","set_playback_rate":"Set playback rate","skip_forward":"Skip forward","skip_backward":"Skip backward","shuffle":"Shuffle"};

                var aiStats = {"enabled":"","apiUrl":"https:\/\/esgr.csspo.gouv.qc.ca\/wp-json\/audioigniter\/v1"};

                /* ]]-->



                <script type="text/javascript" src="https://esgr.csspo.gouv.qc.ca/wp-content/plugins/audioigniter/player/build/app.js?ver=2.0.0" id="audioigniter-js"></script>

                <script type="text/javascript" src="https://esgr.csspo.gouv.qc.ca/wp-content/themes/ecoles.csspo.gouv.qc.ca/dist/scripts/swiper.41f935.js" id="swiper-js"></script>

                <script type="text/javascript" src="https://esgr.csspo.gouv.qc.ca/wp-includes/js/dist/vendor/wp-polyfill-inert.min.js?ver=3.1.2" id="wp-polyfill-inert-js"></script>

                <script type="text/javascript" src="https://esgr.csspo.gouv.qc.ca/wp-includes/js/dist/vendor/regenerator-runtime.min.js?ver=0.14.0" id="regenerator-runtime-js"></script>

                <script type="text/javascript" src="https://esgr.csspo.gouv.qc.ca/wp-includes/js/dist/vendor/wp-polyfill.min.js?ver=3.15.0" id="wp-polyfill-js"></script>

                <script type="text/javascript" src="https://esgr.csspo.gouv.qc.ca/wp-includes/js/dist/dom-ready.min.js?ver=392bdd43726760d1f3ca" id="wp-dom-ready-js"></script>

                <script type="text/javascript" src="https://esgr.csspo.gouv.qc.ca/wp-includes/js/dist/hooks.min.js?ver=c6aec9a8d4e5a5d543a1" id="wp-hooks-js"></script>

                <script type="text/javascript" src="https://esgr.csspo.gouv.qc.ca/wp-includes/js/dist/i18n.min.js?ver=7701b0c3857f914212ef" id="wp-i18n-js"></script>

                <script type="text/javascript" id="wp-i18n-js-after">

                /* <![CDATA[ */

                wp.i18n.setLocaleData( { 'text direction\u0004ltr': [ 'ltr' ] } );

                /* ]]> */

                </script>

                <script type="text/javascript" id="vtx-js-js-extra">

                /* <![CDATA[ */

                var theme = {"ajax_url":"https:\/\/esgr.csspo.gouv.qc.ca\/wp-admin\/admin-ajax.php","assets_path":"https:\/\/esgr.csspo.gouv.qc.ca\/wp-content\/themes\/ecoles.csspo.gouv.qc.ca\/dist\/"};

                /* ]]> */

                </script>

                <script type="text/javascript" id="vtx-js-js-translations">

                /* <![CDATA[ */

                ( function( domain, translations ) {

                  var localeData = translations.locale_data[ domain ] || translations.locale_data.messages;

                  localeData[""].domain = domain;

                  wp.i18n.setLocaleData( localeData, domain );

                } )( "vtx", {"domain":"messages","locale_data":{"messages":{"":{"domain":"messages","plural_forms":"nplurals=2; plural=(n > 1);","lang":"fr_CA"},"You are using an <strong>outdated</strong> browser. Please <a href=\"http://browsehappy.com/\">upgrade your browser</a> to improve your experience.":["Vous utilisez prÃ©sentement un navigateur <strong>dÃ©suet</strong>. Veuillez <a href=\"http://browsehappy.com/\">mettre Ã&nbsp; jour votre navigateur</a> pour amÃ©liorer votre expÃ©rience."],"Theme documentation":["Documentation du thÃ¨me"],"Vortex blocks":["Blocs Vortex"],"Admin Only?":["En admin seulement?"],"Show this field in admin only. This field will be hidden in front-end forms.":["Afficher ce champ en administration seulement. Ce champ sera non visible sur les formulaires publics."],"Relational":["Relationnel"],"Yes":["Oui"],"No":["Non"],"Return Value":["Valeur de retour"],"An array of selected format will be returned if multiple is allowed.":["Un tableau de formats sÃ©lectionnÃ©s sera retournÃ© si la sÃ©lection multiple est autorisÃ©e."],"Gravity Form Object":["Objet du formulaire Gravity"],"Gravity Form ID":["ID du formulaire Gravity"],"Content":["Contenu"],"Primary Navigation":["Navigation principale"],"Footer Copyrights Navigation":["Navigation des crÃ©dits du pied de page"],"Latest Posts":["Derniers articles"],"Search Results for %s":["RÃ©sultats de recherche pour %s"],"Sorry, no results were found.":["Malheureusement, aucun rÃ©sultat n'a Ã©tÃ© trouvÃ©."],"&larr; Older comments":["&larr; Commentaires plus anciens"],"Newer comments &rarr;":["Commentaires plus rÃ©cents &rarr;"],"Comments are closed.":["Les commentaires sont fermÃ©s."],"Pages:":["Pages :"],"Vortex":["Vortex"],"Vortex starter theme":["ThÃ¨me de dÃ©part Vortex"],"Vortex Solution":["Vortex Solution"],"http://www.vortexsolution.com/":["http://www.vortexsolution.com/"],"News Listing":["Liste de nouvelles"],"Redirect":["Redirection"],"Sitemap":["Plan du site"],"Header with slider":["En-tÃªte en carrousel"],"404 page content\u0004We are sorry, but the page or file you are looking for can't be found.":["Nous sommes dÃ©solÃ©s, mais la page ou le fichier que vous cherchez est introuvable."],"404 page content\u0004Thank you!":["Merci !"],"404 page content, home page url\u0004We invite you to navigate from the <a href=\"%s\">home page</a>.":["Nous vous invitons Ã&nbsp; naviguer Ã&nbsp; partir de la <a href=\"%s\">page d'accueil</a>."],"drag and drop instruction\u0004Drag and drop file to upload":["Glisser-dÃ©poser un fichier pour tÃ©lÃ©verser"],"skip nav link\u0004Skip to main content":["Passer au contenu principal"],"Block name\u0004{BLOCK NAME}":["{NOM DU BLOC}"],"Block name\u0004Accordion":["AccordÃ©on"],"Block name\u0004Accordions":["AccordÃ©ons"],"Block name\u0004Box Item":["Boite"],"Block name\u0004Contact Info With Map":["CoordonnÃ©es avec carte"],"Block name\u0004CSSPO News Carousel":["Carrousel des actualitÃ©s du CSSPO"],"Block name\u0004Grid of calls to action with icon":["Grille d'appels Ã&nbsp; l'action avec icÃ´ne"],"Block name\u0004Documents List":["Liste de documents"],"Block name\u0004Buttons With Icon":["Boutons avec icÃ´ne"],"Block name\u0004News Carousel":["Carrousel des nouvelles"],"Block name\u0004Time Slots":["Plages horaires"],"Block description\u0004{BLOCK DESCRIPTION}":["{DESCRIPTION DU BLOC}"],"Block description\u0004Display content blocks inside an accordion.":["Affiche des blocs de contenu Ã&nbsp; l'intÃ©rieur d'un accordÃ©on."],"Block description\u0004Section containing one or more accordions.":["Section contenant un ou plusieurs accordÃ©ons."],"Block description\u0004Block inside Boxes Grid.":["Block Ã&nbsp; l'intÃ©rieur de la grille de boites."],"Block description\u0004Section with map and contact info.":["Section contenant une carte et des coordonnÃ©es."],"Block description\u0004Carousel of latest news from CSSPO main website.":["Carrousel des derniÃ¨res actualitÃ©s tirÃ©es du site web principal du CSSPO."],"Block description\u0004Grid of calls to action with icon.":["Grille d'appels Ã&nbsp; l'action avec icÃ´ne."],"Block description\u0004List of downloadable documents.":["Liste de documents tÃ©lÃ©chargeables."],"Block description\u0004Group of buttons with icon.":["Groupe de boutons avec icÃ´ne."],"Block description\u0004Carousel of latest news.":["Carrousel des derniÃ¨res nouvelles."],"Block description\u0004Table of time slots to display a schedule.":["Tableau de plages horaires pour afficher un horaire."],"accordion placeholder\u0004Enter a title":["Entrer un titre"],"acf innerblock label\u0004Accordions":["AccordÃ©ons"],"boxes grid item\u0004Read more":["En savoir plus"],"admin block style label\u0004Secondary color and icon":["Couleur secondaire et icÃ´ne"],"admin block style label\u0004Grey Overlay":["Overlay gris"],"admin placeholder map\u0004Google Maps":["Google Maps"],"admin placeholder map\u0004Manage map in right panel":["Configurer la carte dans le panneau de droite"],"Google map\u0004Interactive map that show CSSPO address.":["Carte interactive qui affiche une adresse sÃ©lectionnÃ©e."],"google maps info window title\u0004Address":["Adresse"],"news carousel default title\u0004News from CSSPO":["ActualitÃ©s du CSSPO"],"news carousel default title\u0004News":["ActualitÃ©s"],"see all link\u0004See all news":["Voir toutes les actualitÃ©s"],"news carousel navigation\u0004Previous":["PrÃ©cÃ©dent"],"news carousel navigation\u0004Next":["Suivant"],"download button label\u0004Download file":["TÃ©lÃ©charger le fichier"],"time slots label\u0004%s:":["%s :"],"schedule separator\u0004and":["et"],"admin block options label\u0004Image Position":["Position de l'image"],"admin block button label\u0004Align image to the left":["Aligner l'image Ã&nbsp; gauche"],"admin block button label\u0004Align image to the right":["Aligner l'image Ã&nbsp; droite"],"admin block button label\u0004Clear selected image":["Enlever l'image sÃ©lectionnÃ©e"],"admin block panel title\u0004Media Settings":["RÃ©glages du mÃ©dia"],"admin media button\u0004Select image":["Choisir une image"],"admin block field label\u0004Video URL":["URL du vidÃ©o"],"Accessibility font size label\u0004Normal":["RÃ©gulier"],"Accessibility font size label\u0004Bigger":["Grand"],"Accessibility font size label\u0004Biggest":["Plus grand"],"Button label\u0004Close accessibility menu":["Fermer le menu d'accessibilitÃ©."],"Button label\u0004High contrast":["Contraste Ã©levÃ©"],"screen reader label\u0004Open the accessibility toolbar.":["Ouvrir la barre d'accessibilitÃ©."],"screen reader label\u0004Close the accessibility toolbar.":["Fermer la barre d'accessibilitÃ©."],"screen reader label\u0004Accessibility toolbar":["Barre d'accessibilitÃ©"],"WCAG menu description\u0004Configure display options for accessibility.":["Configurer les options d'affichage en lien avec l'accessibilitÃ©."],"accessibility title\u0004Color scheme":["ThÃ¨me de couleur"],"accessibility title\u0004Font size":["Taille du texte"],"admin page title\u0004Documentation":["Documentation"],"admin menu name\u0004Documentation":["Documentation"],"Block param name\u0004Small":["Petit"],"Block param name\u0004Large":["Large"],"Block param shortname\u0004S":["S"],"Block param shortname\u0004L":["L"],"Admin page title\u0004Alerts bar":["Barre d'alertes"],"Admin page title\u0004Options":["Options"],"Admin page title\u0004Post type to Page":["Liaison entre pages et types de publication"],"Admin page title\u0004Default image by post type":["Image par dÃ©faut par type de contenu"],"Admin page title\u0004Global search":["Recherche globale"],"Admin menu title\u0004Alerts":["Alertes"],"Admin menu title\u0004Options":["Options"],"Admin menu title\u0004Post type to Page":["Liaison entre pages et types de publication"],"Admin menu title\u0004Default image by post type":["Image par dÃ©faut par type de contenu"],"Admin menu title\u0004Global search":["Recherche globale"],"Breadcrumb title\u0004Search":["Recherche"],"Breadcrumb title\u0004Home":["Accueil"],"SR Only: Readable Passed time\u0004Published %s ago.":["PubliÃ© il y a %s."],"Readable Passed time\u0004%s ago":["il y a %s"],"Formatted date\u0004%2$s %1$s, %3$s":["%1$s %2$s %3$s"],"Formatted date\u0004From %3$s %1$s to %2$s, %4$s":["Du %1$s au %2$s %3$s %4$s"],"Formatted date\u0004From %2$s %1$s to %4$s %3$s, %5$s":["Du %1$s %2$s au %3$s %4$s %5$s"],"Formatted date\u0004From %2$s %1$s, %3$s, to %5$s %4$s, %6$s":["Du %1$s %2$s %3$s au %4$s %5$s %6$s"],"SR-Only sub menu label\u0004Open %s sub menu.":["Ouvrir le sous-menu %s."],"SR-Only sub menu label\u0004Close %s sub menu.":["Fermer le sous-menu %s."],"Page unilingual notice\u0004This page is only editable in this language. Changing language will redirect to this page.":["Cette page est modifiable dans cette langue seulement. Changer de langue fera une redirection sur cette page."],"admin message\u0004You should not edit field groups in beta or production. <a href=\"mailto:wordpress@vortexsolution.com?subject=[%s] I want to edit ACF Group Fields live !\">Talk to the manager</a>":["Vous ne devriez pas modifier un groupe de champs en environnement de beta ou de production. <a href=\"mailto:wordpress@vortexsolution.com?subject=[%s] Je veux modifier un groupe ACF en ligne !\">Parler Ã&nbsp; un administrateur</a>"],"Acf field label\u0004Gravity Forms":["Gravity Forms"],"Acf field label\u0004Image select":["SÃ©lection d'image"],"Acf field label\u0004Post Types Select":["SÃ©lection de type de contenu"],"Acf field label\u0004Allow Multiple?":["Autoriser la sÃ©lection multiple ?"],"Acf field label\u0004Disallowed post types":["Types de contenu non-autorisÃ©s"],"Acf field label\u0004Taxonomies Select":["SÃ©lection de taxonomies"],"Acf field label\u0004Disallowed taxonomies":["Taxonomies dÃ©sactivÃ©es"],"Acf field label\u0004Filter taxonomies by a post types select field":["Filtrer les taxonomies par un champ de sÃ©lection de types de contenu"],"Default select choice\u0004Select a form":["Choisir un formulaire"],"ACF Admin field creation label\u0004Get image method":["MÃ©thode de rÃ©cupÃ©ration d'image"],"ACF Admin field creation label\u0004Images list":["Liste d'images"],"ACF Admin field creation label\u0004Folder path":["Chemin du dossier"],"ACF Admin field creation label\u0004Font path":["Chemin de la police"],"ACF Admin field creation label\u0004Return format":["Format de retour"],"ACF Admin field creation label\u0004Allow \"None\" to be a choice":["Autoriser \"Aucun\" dans les choix"],"Admin field creation instructions\u0004An array of selected format will be returned if multiple is allowed.<br>All path are relative to the active theme folder.":["Un tableau de formats sÃ©lectionnÃ©s sera retournÃ© si la sÃ©lection multiple est autorisÃ©e.<br>Tous les chemins sont relatifs au dossier du thÃ¨me actif."],"Admin field creation instructions\u0004Write each image class/URL on a different line.<br>For the URL, you can use either a full URL starting with HTTP or a path relative to the active theme.":["Ã‰crire chaque classe/URL d'image sur une ligne diffÃ©rente.<br>Pour l'URL, il est possible d'utiliser l'URL complet commenÃ§ant par HTTP ou un chemin relatif au thÃ¨me actif."],"Admin field creation instructions\u0004Start the path at the root of the active theme. Example: dist/images/img-for-acf":["Commencer le chemin Ã&nbsp; partir de la racine du thÃ¨me actif. Exemple : dist/images/img-for-acf"],"Admin field creation instructions\u0004Start the path at the root of the active theme. Example: dist/fonts/icomoon":["Commencer le chemin Ã&nbsp; partir de la racine du thÃ¨me actif. Exemple : dist/fonts/icomoon"],"Radio button label\u0004Directory path":["Chemin du dossier"],"Radio button label\u0004Array of classes and/or paths":["Tableau de classes et/ou de chemins"],"Radio button label\u0004Font path":["Chemin de la police"],"Radio button label\u0004URL":["URL"],"Radio button label\u0004File name":["Nom du fichier"],"ACF None label\u0004None":["Aucun"],"ACF Admin field instructions\u0004Only usefull if \"Allow Multiple\" is activated.":["Seulement utile si \"Autoriser la sÃ©lection multiple\" est activÃ©."],"ACF Admin field instructions\u0004Add a field name here (same as a get_field()).":["Ajouter un nom de champ ici (comme get_field())."],"Gravity next button\u0004Next":["Suivant"],"Gravity previous button\u0004Previous":["PrÃ©cÃ©dent"],"AutocompleteSearch\u0004Search":["Rechercher"],"AutocompleteSearch\u0004Search :":["Rechercher :"],"AutocompleteSearch\u0004No suggestion found":["Aucune suggestion trouvÃ©e"],"autocomplete\u0004Search: ":["Rechercher : "],"Price format\u0004$9":["9 $"],"Date format\u0004Y-m-d":["Y-m-d"],"Date format readable\u0004F j, Y":["j F Y"],"404 page title\u0004Page Not Found":["Page non trouvÃ©e"],"Custom Post Type\u0004Add New":["Ajouter"],"Custom Post Type\u0004Add New %s":["Ajouter un nouveau %s"],"Custom Post Type\u0004Edit %s":["Modifier %s"],"Custom Post Type\u0004New %s":["Nouveau %s"],"Custom Post Type\u0004View %s":["Voir %s"],"Custom Post Type\u0004Search %s":["Rechercher %s"],"Custom Post Type\u0004No %s found":["Aucun %s trouvÃ©"],"Custom Post Type\u0004No %s found in Trash":["Aucun %s trouvÃ© dans la corbeille"],"Custom Post Type\u0004Parent %s:":["%s parent :"],"taxonomy\u0004All %s":["Tous les %s"],"taxonomy\u0004Edit %s":["Modifier %s"],"taxonomy\u0004View %s":["Voir %s"],"taxonomy\u0004Update %s":["Mettre Ã&nbsp; jour %s"],"taxonomy\u0004Add New %s":["Ajouter un nouveau %s"],"taxonomy\u0004New %s Name":["Nom du nouveau %s"],"taxonomy\u0004Parent %s":["%s parent"],"taxonomy\u0004Parent %s:":["%s parent :"],"taxonomy\u0004Search %s":["Rechercher %s"],"taxonomy\u0004Popular %s":["%s populaires"],"taxonomy\u0004Seperate %s with commas":["SÃ©parer les %s avec une virgule"],"taxonomy\u0004Add or remove %s":["Ajouter ou enlever %s"],"taxonomy\u0004Choose from most used %s":["Choisir parmi les %s plus utilisÃ©s"],"taxonomy\u0004No %s found":["Aucun %s trouvÃ©"],"close button\u0004Close alert bar":["Fermer la barre d'alertes"],"comments title\u0004%1$s response to &ldquo;%2$s&rdquo;":["%1$s rÃ©ponse Ã&nbsp; &ldquo;%2$s&rdquo;","%1$s rÃ©ponses Ã&nbsp; &ldquo;%2$s&rdquo;"],"Label for {link label} accordion.\u0004Open or close accordion \"%s\".":["Ouvrir ou fermer l'accordÃ©on \"%s\"."],"main website name\u0004Centre de services scolaire des Portages-de-lâ€™Outaouais":[""],"copyrights footer\u0004All rights reserved.":["Tous droits rÃ©servÃ©s."],"copyrights footer\u0004Web agency":["Agence web"],"vortex solution website url\u0004https://www.vortexsolution.com/en":["https://www.vortexsolution.com/"],"footer section title\u0004Contact Info":["CoordonnÃ©es"],"footer section title\u0004Address: ":["Adresse : "],"footer section title\u0004Email address: ":["Adresse courriel : "],"footer section title\u0004Phone number: ":["NumÃ©ro de tÃ©lÃ©phone : "],"footer section title\u0004Fax number: ":["TÃ©lÃ©copieur : "],"footer section title\u0004Website: ":["Site web : "],"Go to top btn\u0004Go to top":["Retour vers le haut"],"language switcher label\u0004Visit page in: %s.":["Visiter la page en : %s."],"Social media link's title attribute\u0004See CSSPO's %s page":["Visiter la page %s de CSSPO"],"Social media link's title attribute\u0004See our %s page":["Visiter notre page %s"],"SR only burger menu label\u0004Open site navigation":["Ouvrir la navigation du site"],"socials title\u0004Social Medias":["MÃ©dias sociaux"],"read more aria label\u0004Read post \"%s\"":["Lire l'article \"%s\""],"no result listing page\u0004No results were found.":["Aucun rÃ©sultat n'a Ã©tÃ© trouvÃ©."],"search form label\u0004Search":["Rechercher"],"search form submit\u0004Submit search":["Soumettre la recherche"],"link to homepage label\u0004Back to homepage":["Retour Ã&nbsp; la page d'accueil"],"search toggle label\u0004Close search bar":["Fermer la barre de recherche"],"search bar\u0004Search":["Rechercher"]}}} );

                /* ]]> */

                </script>

                <script type="text/javascript" src="https://esgr.csspo.gouv.qc.ca/wp-content/themes/ecoles.csspo.gouv.qc.ca/dist/scripts/main.4f519c.js" id="vtx-js-js"></script>

                <script type="text/javascript" src="https://esgr.csspo.gouv.qc.ca/wp-content/themes/ecoles.csspo.gouv.qc.ca/dist/scripts/header-slider.e31904.js" id="header-slider-js"></script>

                <script type="text/javascript" src="https://esgr.csspo.gouv.qc.ca/wp-content/themes/ecoles.csspo.gouv.qc.ca/dist/scripts/news-carousel.a602cc.js" id="news-carousel-js"></script>

                <script type="text/javascript" src="https://esgr.csspo.gouv.qc.ca/wp-content/themes/ecoles.csspo.gouv.qc.ca/dist/scripts/csspo-news-carousel.b0e51d.js" id="csspo-news-carousel-js"></script>

                  



                </header>

              </div>                          

             </div>       





            

    </div>

    </div>

     <!-- CONTENT-WRAPPER SECTION END-->

<?php include('includes/footer.php');?>

      <!-- FOOTER SECTION END-->

    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->

    <!-- CORE JQUERY  -->

    <script src="assets/js/jquery-1.10.2.js"></script>

    <!-- BOOTSTRAP SCRIPTS  -->

    <script src="assets/js/bootstrap.js"></script>

      <!-- CUSTOM SCRIPTS  -->

    <script src="assets/js/custom.js"></script>

</body>

</html>

<?php } ?>

