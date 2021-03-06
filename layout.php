<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>M2L</title>

    <!-- Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="<?= baseUrl() ?>css/style.css" rel="stylesheet">
</head>
<body id="app-layout">
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top layout-nav">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="<?= baseUrl()?>home">
                        M2L
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav col-lg-9">
                    <?php if(isset($_SESSION['connecte'])){?>
                        <li><a href="<?= baseUrl()?>compte">Mon compte</a></li>
                        <?php if(auth('user')->isChef()) { ?>
                            <li><a href="<?= baseUrl()?>validerFormations">Gestion des employés</a></li>
                        <?php 
                        }
                        if(auth('user')->isAdmin()) { ?>
                            <li><a href="<?= baseUrl()?>admin">Administration</a></li>
                        <?php } ?>
                        <li><search-form></search-form></li>
                    </ul>
                    <?php }?>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                    <?php if(!isset($_SESSION['connecte']))
                            echo "<li><a href='".baseUrl()."login'></a></li>";
                        else
                            echo "<li><a href='".baseUrl()."logout'>Se déconnecter</a></li>";
                    ?>               
                    </ul>
                </div>
            </div>
        </nav>

        <?php 
            echo Core\Session::flash();
            echo $content;
        ?>
    </div>
    <div class="clear"></div>
    <footer class="footer">
        <div class="container">
            <div class="element">
                <a href="<?= baseUrl() ?>/compte#profil"><i class="fa fa-address-card-o fa-lg" aria-hidden="true"></i> Mon profil</a>
            </div>
            <div class="element">
                <a href="<?= baseUrl() ?>/compte">
                    <i class="fa fa-list-ul fa-lg" aria-hidden="true"></i>
                    Mes formations
                </a>
            </div>
            <div class="element">
                <a href="<?= baseUrl() ?>contact">
                    <i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i>
                    Contact
                </a>
            </div>
            <div class="element">
                <a href="#">
                    <i class="fa fa-question-circle-o fa-lg" aria-hidden="true"></i>
                A propos
                </a>
            </div>
        </div>
        <div class="copyright">
            <p>
                M2L ©
            </p>
        </div>
    </footer>
    <!-- JavaScripts -->
    <script src="<?= baseUrl() ?>js/bundle.js"></script>
    <?php 
        if (Core\Session::has('js')) { ?>
            <script src="<?= Core\Session::get('js') ?>" async defer></script>
        <?php } ?>
</body>
</html>