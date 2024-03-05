<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['update']))
{
$athrid=intval($_GET['athrid']);
$author=$_POST['author'];
$sql="update  tblauthors set AuthorName=:author where id=:athrid";
$query = $dbh->prepare($sql);
$query->bindParam(':author',$author,PDO::PARAM_STR);
$query->bindParam(':athrid',$athrid,PDO::PARAM_STR);
$query->execute();
$_SESSION['updatemsg']="Author info updated successfully";
header('location:manage-authors.php');



}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Système de gestion de bibliothèque en ligne | Édition de l'auteur</title>
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
    <div class="content-wra
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Édition de l'auteur</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Informations sur l'auteur
</div>
<div class="panel-body">
<form role="form" method="post">
<div class="form-group">
<label>Nom de l'auteur</label>
<?php 
$athrid=intval($_GET['athrid']);
$sql = "SELECT * from  tblauthors where id=:athrid";
$query = $dbh -> prepare($sql);
$query->bindParam(':athrid',$athrid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>   
<input class="form-control" type="text" name="author" value="<?php echo htmlentities($result->AuthorName);?>" required />
<?php }} ?>
</div>

<button type="submit" name="update" class="btn btn-info">Mettre à jour </button>

                                    </form>
                            </div>
                        </div>
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