<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>M2L</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css">

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
                    <li><a href="welcome">Accueil</a></li>
                    <li><a href="compte">Mon compte</a></li>
                    <form action="search" method="Post" class="form-inline searchbar">
                        <div class="form-group">
                            <input type="text" name="search" size="15" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="rechercher" class="form-control btn btn-primary">
                        </div>
                    </form>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                <?php if(!isset($_SESSION['connecte']))
                        echo "<li><a href='login'>Se connecter</a></li>";
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
    <?php 
        if(isset($_SESSION['scripts']))
        {
            foreach($_SESSION['scripts'] as $script)
            {
                echo $script;
            }
            unset($_SESSION['scripts']);
        }
     ?>
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.13/i18n/French.json"
            }
                
            });
        } );
        // $(window).resize(function() {
        //     if(window.innerWidth < 800)
        //     {
        //         console.log($('.hide-small-screen').remove());
        //     }
        // });
    </script>
    
</body>
</html>