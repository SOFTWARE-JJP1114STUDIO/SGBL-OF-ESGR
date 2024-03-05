<?php 

session_start();

include('includes/config.php');

error_reporting(0);

if(strlen($_SESSION['login'])==0)

    {   

header('location:index.php');

}

else{ 

if(isset($_POST['update']))

{    

$sid=$_SESSION['stdid'];  

$fname=$_POST['fullanme'];

$mobileno=$_POST['mobileno'];



$sql="update tblstudents set FullName=:fname,MobileNumber=:mobileno where StudentId=:sid";

$query = $dbh->prepare($sql);

$query->bindParam(':sid',$sid,PDO::PARAM_STR);

$query->bindParam(':fname',$fname,PDO::PARAM_STR);

$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);

$query->execute();



echo '<script>alert("Your profile has been updated")</script>';

}



?>



<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <meta name="description" content="" />

    <meta name="author" content="" />

    <!--[if IE]>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <![endif]-->

    <title>SGBL OF ESGR | MON COMPTE</title>

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

                <h4 class="header-line">Mon Profil</h4>

                

            </div>



        </div>

             <div class="row">

           

<div class="col-md-9 col-md-offset-1">

               <div class="panel panel-danger">

                        <div class="panel-heading">

                           Mon Profil

                        </div>

                        <div class="panel-body">

                            <form name="signup" method="post">

<?php 

$sid=$_SESSION['stdid'];

$sql="SELECT StudentId,FullName,EmailId,MobileNumber,RegDate,UpdationDate,Status from  tblstudents  where StudentId=:sid ";

$query = $dbh -> prepare($sql);

$query-> bindParam(':sid', $sid, PDO::PARAM_STR);

$query->execute();

$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;

if($query->rowCount() > 0)

{

foreach($results as $result)

{               ?>  



<div class="form-group">

<label>Identifiant de l'étudiant : </label>

<?php echo htmlentities($result->StudentId);?>

</div>



<div class="form-group">

<label>Date d'enregistrement : </label>

<?php echo htmlentities($result->RegDate);?>

</div>

<?php if($result->UpdationDate!=""){?>

<div class="form-group">

<label>Date de la dernière mise à jour : </label>

<?php echo htmlentities($result->UpdationDate);?>

</div>

<?php } ?>





<div class="form-group">

<label>Statut du profil : </label>

<?php if($result->Status==1){?>

<span style="color: green">Actif</span>

<?php } else { ?>

<span style="color: red">Bloqué</span>

<?php }?>

</div>





<div class="form-group">

<label>Entrez votre nom complet</label>

<input class="form-control" type="text" name="fullanme" value="<?php echo htmlentities($result->FullName);?>" autocomplete="off" required />

</div>





<div class="form-group">

<label>Numéro de téléphone mobile :</label>

<input class="form-control" type="text" name="mobileno" maxlength="10" value="<?php echo htmlentities($result->MobileNumber);?>" autocomplete="off" required />

</div>

                                        

<div class="form-group">

<label>Saisir l'adresse électronique :</label>

<input class="form-control" type="email" name="email" id="emailid" value="<?php echo htmlentities($result->EmailId);?>"  autocomplete="off" required readonly />

</div>

<?php }} ?>

                              

<button type="submit" name="update" class="btn btn-primary" id="submit">Mettre à jour maintenant </button>



                                    </form>

                            </div>

                        </div>

                            </div>

        </div>

    </div>

    </div>

     <!-- CONTENT-WRAPPER SECTION END-->

    <?php include('includes/footer.php');?>

    <script src="assets/js/jquery-1.10.2.js"></script>

    <!-- BOOTSTRAP SCRIPTS  -->

    <script src="assets/js/bootstrap.js"></script>

      <!-- CUSTOM SCRIPTS  -->

    <script src="assets/js/custom.js"></script>

</body>

</html>

<?php } ?>

