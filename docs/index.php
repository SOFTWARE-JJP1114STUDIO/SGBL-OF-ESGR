<?php

session_start();

error_reporting(0);

include('includes/config.php');



if ($_SESSION['login'] != '') {

    $_SESSION['login'] = '';

}



if (isset($_POST['login'])) {

    // Code for hCaptcha verification

    $hCaptchaSecret = 'ES_15949ae4dabb475e9b88f8d085232566'; // Replace with your hCaptcha secret key

    $hCaptchaResponse = $_POST['h-captcha-response'];



    $hCaptchaVerifyUrl = "https://hcaptcha.com/siteverify?secret=$hCaptchaSecret&response=$hCaptchaResponse";

    $hCaptchaVerifyResult = json_decode(file_get_contents($hCaptchaVerifyUrl));



    if (!$hCaptchaVerifyResult->success) {

        echo "<script>alert('hCaptcha verification failed');</script>";

    } else {

        $email = $_POST['emailid'];

        $password = md5($_POST['password']);

        $sql = "SELECT EmailId,Password,StudentId,Status FROM tblstudents WHERE EmailId=:email and Password=:password";

        $query = $dbh->prepare($sql);

        $query->bindParam(':email', $email, PDO::PARAM_STR);

        $query->bindParam(':password', $password, PDO::PARAM_STR);

        $query->execute();

        $results = $query->fetchAll(PDO::FETCH_OBJ);



        if ($query->rowCount() > 0) {

            foreach ($results as $result) {

                $_SESSION['stdid'] = $result->StudentId;

                if ($result->Status == 1) {

                    $_SESSION['login'] = $_POST['emailid'];

                    echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";

                } else {

                    echo "<script>alert('Your Account Has been blocked. Please contact admin');</script>";

                }

            }

        } else {

            echo "<script>alert('Invalid Details');</script>";

        }

    }

}

?>



<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <meta name="description" content="" />

    <meta name="author" content="" />

    <title>SGBL OF ESGR | CONNEXION UTILISATEUR</title>

    <!-- BOOTSTRAP CORE STYLE  -->

    <link href="assets/css/bootstrap.css" rel="stylesheet" />

    <!-- FONT AWESOME STYLE  -->

    <link href="assets/css/font-awesome.css" rel="stylesheet" />

    <!-- CUSTOM STYLE  -->

    <link href="assets/css/style.css" rel="stylesheet" />

    <!-- GOOGLE FONT -->

    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <!-- hCaptcha -->

    <script src='https://www.hCaptcha.com/1/api.js' async defer></script>

    <!-- Favicon -->

    <link rel="apple-touch-icon" sizes="180x180" href="https://esgr.csspo.gouv.qc.ca/wp-content/themes/ecoles.csspo.gouv.qc.ca/assets/favicon/apple-touch-icon.png">

    <link rel="icon" type="image/png" sizes="32x32" href="https://esgr.csspo.gouv.qc.ca/wp-content/themes/ecoles.csspo.gouv.qc.ca/assets/favicon/favicon-32x32.png">

    <link rel="icon" type="image/png" sizes="16x16" href="https://esgr.csspo.gouv.qc.ca/wp-content/themes/ecoles.csspo.gouv.qc.ca/assets/favicon/favicon-16x16.png">

    <link rel="manifest" href="https://esgr.csspo.gouv.qc.ca/wp-content/themes/ecoles.csspo.gouv.qc.ca/assets/favicon/site.webmanifest">

    <link rel="mask-icon" href="https://esgr.csspo.gouv.qc.ca/wp-content/themes/ecoles.csspo.gouv.qc.ca/assets/favicon/safari-pinned-tab.svg" color="#00a6e9">



</head>

<body>
    <script>
    if (typeof navigator.serviceWorker !== 'undefined') {
        navigator.serviceWorker.register('sw.js')
    }
    </script>

    <!------MENU SECTION START-->

    <?php include('includes/header.php'); ?>

    <!-- MENU SECTION END-->

    <div class="content-wrapper">

        <div class="container">

            <div class="row pad-botm">

                <div class="col-md-12">

                    <h4 class="header-line">USER LOGIN FORM</h4>

                </div>

            </div>

            <!--LOGIN PANEL START-->

            <div class="row">

                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                    <div class="panel panel-info">

                        <div class="panel-heading">

                            LOGIN FORM

                        </div>

                        <div class="panel-body">

                            <form role="form" method="post">



                                <div class="form-group">

                                    <label>Enter Email id</label>

                                    <input class="form-control" type="text" name="emailid" required autocomplete="off" />

                                </div>

                                <div class="form-group">

                                    <label>Password</label>

                                    <input class="form-control" type="password" name="password" required autocomplete="off"  />

                                    <p class="help-block"><a href="user-forgot-password.php">Forgot Password</a></p>

                                </div>

                                <div class="form-group">

                                    <label>Verify you're not a robot</label>

                                    <div class="h-captcha" data-sitekey="b4e2a8d6-fe38-49cd-af6e-867b933229bf"></div>

                                </div>



                                <button type="submit" name="login" class="btn btn-info">LOGIN </button> | <a href="signup.php">Not Register Yet</a>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

            <!---LOGIN PANEL END-->

        </div>

    </div>

    <!-- CONTENT-WRAPPER SECTION END-->

    <?php include('includes/footer.php'); ?>

    <!-- FOOTER SECTION END-->

    <script src="assets/js/jquery-1.10.2.js"></script>

    <!-- BOOTSTRAP SCRIPTS  -->

    <script src="assets/js/bootstrap.js"></script>

    <!-- CUSTOM SCRIPTS  -->

    <script src="assets/js/custom.js"></script>



</body>

</html>

