<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['add'])) {
    $bookname=$_POST['bookname'];
    $category=$_POST['category'];
    $author=$_POST['author'];
    $serie=$_POST['serie'];
    $quantity=$_POST['quantity'];
    $volume=$_POST['volume']; // Nouveau champ pour le tome
    $location=$_POST['location']; // Nouveau champ pour l'emplacement

    $sql="INSERT INTO  tblbooks(BookName,CatId,AuthorId,Serie,Quantity,Tome,Emplacement) VALUES(:bookname,:category,:author,:serie,:quantity,:volume,:location)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':bookname',$bookname,PDO::PARAM_STR);
    $query->bindParam(':category',$category,PDO::PARAM_STR);
    $query->bindParam(':author',$author,PDO::PARAM_STR);
    $query->bindParam(':serie',$serie,PDO::PARAM_STR);
    $query->bindParam(':quantity',$quantity,PDO::PARAM_STR);
    $query->bindParam(':volume',$volume,PDO::PARAM_STR); // Binding pour le tome
    $query->bindParam(':location',$location,PDO::PARAM_STR); // Binding pour l'emplacement

    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId) {
        $_SESSION['msg']="Book Listed successfully";
        header('location:manage-books.php');
    } else {
        $_SESSION['error']="Something went wrong. Please try again";
        header('location:manage-books.php');
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
    <title>Système de gestion de bibliothèque en ligne | Ajouter un livre</title>
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
                <h4 class="header-line">Ajouter un livre</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Infos sur le livre
</div>
<div class="panel-body">
<form role="form" method="post">
<div class="form-group">
<label>Nom du livre<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="bookname" autocomplete="off"  required />
</div>

<div class="form-group">
    <label>Tome<span style="color:red;">*</span></label>
    <input class="form-control" type="text" name="volume" autocomplete="off" />
</div>

<div class="form-group">
<label>Nom de la série</label>
<input class="form-control" type="text" name="serie" autocomplete="off"  />
</div>

<div class="form-group">
<label> Catégorie<span style="color:red;">*</span></label>
<select class="form-control" name="category" required="required">
<option value=""> Sélectionner une catégorie</option>
<?php 
$status=1;
$sql = "SELECT * from  tblcategory where Status=:status";
$query = $dbh -> prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->CategoryName);?></option>
 <?php }} ?> 
</select>
</div>


<div class="form-group">
<label> Auteur<span style="color:red;">*</span></label>
<select class="form-control" name="author" required="required">
<option value=""> Sélectionner l'auteur</option>
<?php 

$sql = "SELECT * from  tblauthors ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->AuthorName);?></option>
 <?php }} ?> 
</select>
</div>

<div class="form-group">
    <label>Emplacement<span style="color:red;">*</span></label>
    <input class="form-control" type="text" name="location" autocomplete="off" />
</div>

 <div class="form-group">
 <label>Quantité</label>
 <input class="form-control" type="text" name="quantity" autocomplete="off"/>
 </div>
<button type="submit" name="add" class="btn btn-info">Ajouter </button>

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
