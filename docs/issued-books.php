<?php

session_start();

error_reporting(0);

include('includes/config.php');

if(strlen($_SESSION['login'])==0)

    {   

header('location:index.php');

}

else{ 

if(isset($_GET['del']))

{

$id=$_GET['del'];

$sql = "delete from tblbooks  WHERE id=:id";

$query = $dbh->prepare($sql);

$query -> bindParam(':id',$id, PDO::PARAM_STR);

$query -> execute();

$_SESSION['delmsg']="Category deleted scuccessfully ";

header('location:manage-books.php');



}





    ?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <meta name="description" content="" />

    <meta name="author" content="" />

    <title>SGBL OF ESGR | MES EMPRUNTS</title>

    <!-- BOOTSTRAP CORE STYLE  -->

    <link href="assets/css/bootstrap.css" rel="stylesheet" />

    <!-- FONT AWESOME STYLE  -->

    <link href="assets/css/font-awesome.css" rel="stylesheet" />

    <!-- DATATABLE STYLE  -->

    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

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

                <h4 class="header-line">Mes emprunts</h4>

    </div>

    



            <div class="row">

                <div class="col-md-12">

                    <!-- Advanced Tables -->

                    <div class="panel panel-default">

                        <div class="panel-heading">

                          L'historique de mes emprunts 

                        </div>

                        <div class="panel-body">

                            <div class="table-responsive">

                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                                    <thead>

                                        <tr>

                                            <th>#</th>

                                            <th>Nom du livre</th>

                                            <th>Tome</th>

                                            <th>Série </th>

                                            <th>Date d'emprunt</th>

                                            <th>Date de retour</th>

                                            <th>Amende</th>

                                        </tr>

                                    </thead>

                                    <tbody>

<?php 

$sid=$_SESSION['stdid'];

$sql="SELECT tblbooks.BookName,tblbooks.Tome,tblbooks.Serie,tblissuedbookdetails.IssuesDate,tblissuedbookdetails.ReturnDate,tblissuedbookdetails.id as rid,tblissuedbookdetails.fine from  tblissuedbookdetails join tblstudents on tblstudents.StudentId=tblissuedbookdetails.StudentId join tblbooks on tblbooks.id=tblissuedbookdetails.BookId where tblstudents.StudentId=:sid order by tblissuedbookdetails.id desc";

$query = $dbh -> prepare($sql);

$query-> bindParam(':sid', $sid, PDO::PARAM_STR);

$query->execute();

$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;

if($query->rowCount() > 0)

{

foreach($results as $result)

{               ?>                                      

                                        <tr class="odd gradeX">

                                            <td class="center"><?php echo htmlentities($cnt);?></td>

                                            <td class="center"><?php echo htmlentities($result->BookName);?></td>

                                            <td class="center"><?php echo htmlentities($result->Tome); ?></td>

                                            <td class="center"><?php echo htmlentities($result->Serie);?></td>

                                            <td class="center"><?php echo htmlentities($result->IssuesDate);?></td>

                                            <td class="center"><?php if($result->ReturnDate=="")

                                            {?>

                                            <span style="color:red">

                                             <?php   echo htmlentities("Not Return Yet"); ?>

                                                </span>

                                            <?php } else {

                                            echo htmlentities($result->ReturnDate);

                                        }

                                            ?></td>

                                              <td class="center"><?php echo htmlentities($result->fine);?></td>

                                         

                                        </tr>

 <?php $cnt=$cnt+1;}} ?>                                      

                                    </tbody>

                                </table>

                            </div>

                            

                        </div>

                    </div>

                    <!--End Advanced Tables -->

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

    <!-- DATATABLE SCRIPTS  -->

    <script src="assets/js/dataTables/jquery.dataTables.js"></script>

    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>

      <!-- CUSTOM SCRIPTS  -->

    <script src="assets/js/custom.js"></script>



</body>

</html>

<?php } ?>

