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

    <!-- Styles -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> -->
    <!-- <link href="<?= baseUrl() ?>css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css"> -->
    <link href="<?= baseUrl() ?>css/style.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
        .navbar-menuright{

        }
    </style>
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
                    <a class="navbar-brand" href="welcome">
                        M2L
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav col-lg-9">
                    <?php if(isset($_SESSION['connecte'])){?>
                        <li><a href="welcome">Accueil</a></li>
                        <li><a href="compte">Mon compte</a></li>
                        <form action="search" method="Post" class="form-inline searchbar col-md-4 col-offset-4">
                            <div class="form-group">
                                <input type="text" name="search" size="15" class="form-control" placeholder="Rechercher..." required>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="rechercher" class="form-control btn btn-primary">
                            </div>
                        </form>
                    </ul>
                    <?php }?>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                    <?php if(!isset($_SESSION['connecte']))
                            echo "<li><a href='login'></a></li>";
                        else
                            echo "<li><a href='logout'>Se déconnecter</a></li>";
                    ?>               
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <?php 
                        echo Core\Session::flash();
                        echo $content;
                    ?>
                </div>
            </div>
        </div>
    </div>
        <!-- JavaScripts -->
        <script src="<?= baseUrl() ?>js/bundle.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> -->
        <!-- <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.js"></script> -->
        <!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script> -->
        <?php 
            if (Core\Session::has('js')) 
            {
                ?>
                <script src="js/<?= Core\Session::get('js') ?>"></script>
                <?php
            } 
        ?>
</body>
</html>