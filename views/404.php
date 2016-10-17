<!DOCTYPE html>
<html>
    <head>
        <title>Be right back.</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">4<span id="compteur"></span> not Found</div>
            </div>
        </div>
    </body>
    <script type="text/javascript"> 
        function r()
        {
            window.location='http://127.0.0.1/PPEFINALMVC';
        }

        duree=5;
        function t()
                {
            var compteur=document.getElementById('compteur');
            s=duree+4;
            
            
            
            duree=duree-1;
            window.setTimeout("t();",999);

            if(s<10)
            {
                s="0"+s
            }    


            if(s == 4)
            {
                r();
            }
            compteur.innerHTML=s;

        }

        t();
        
    </script>
</html>