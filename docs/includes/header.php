<script src="https://kit.fontawesome.com/d11b59cd3d.js" crossorigin="anonymous"></script>

<div class="navbar navbar-inverse set-radius-zero" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php">
                    <img src="assets/img/Ecole-secondaire-Grande-Riviere.png" />
                </a>

            </div>
<?php if($_SESSION['login'])
{
?> 
            <div class="right-div">
                <a href="logout.php" class="btn btn-danger pull-right">Se Déconnecter</a>
            </div>
            <?php }?>
        </div>
    </div>
    <!-- LOGO HEADER END-->
<?php if($_SESSION['login'])
{
?>    
<section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="dashboard.php" class="menu-top-active">TABLEAU DE BORD</a></li>
                           
                          
   <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Mon Compte <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="my-profile.php">Mon profil</a></li>
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="change-password.php">Modifier le mot de passe</a></li>
                                </ul>
                            </li>
                            <li><a href="issued-books.php">Mes Emprunts</a></li>

                            <li role="presentation"><a class="php-symbol" role="menuitem" tabindex="-1" href="../search/search_form.html"><i class="fa-solid fa-magnifying-glass"></i> RECHERCHER UN LIVRE</a></li>
                          

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php } else { ?>
        <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">                        
                          
                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Administrateur <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="adminlogin.php">Connexion Compte Administrateur</a></li>
                                        <li role="presentation"><a class="php-symbol" role="menuitem" tabindex="-1" href="/phpmyadmin" target="_blank"><i id="php-symbol" class="fa-brands fa-php"></i></a></li>
                                        <style>
                                            .php-symbol #php-symbol{
                                                font-size: 50px;
                                                color: #1e3050;
                                            }
                                        </style>
                                    </ul>
                            </li>
                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Compte Étudiant <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="signup.php">Inscription Compte Étudiant</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php">Connexion Compte Étudiant</a></li>
                                    </ul>
                            </li>
                             
                             
                          

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php } ?>