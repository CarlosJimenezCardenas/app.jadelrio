<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="../images/logoBlanco.png">		

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/login.css" rel="stylesheet">

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="../js/login.js"></script>
    </head>
    <body> 
        <div class="fondoHeader row">
            <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
            </div>
            
            <div class="col-lg-1 col-md-12 col-sm-12 col-xs-12">
                </br><img src='./images/logoBlanco.png' width="70px">
            </div>
        </div>
        <div class='videos'>
            <video autoplay muted controls id="video1" class="video1">
                <source src="./images/5-login.mp4" type="video/mp4">
            </video>
            <video autoplay muted controls id="video2" class="video2">
                <source src="./images/3-login.mp4" type="video/mp4">
            </video>
            <video autoplay muted controls id="video3" class="video3">
                <source src="./images/4-login.mp4" type="video/mp4">
            </video>
            <video autoplay muted controls id="video4" class="video4">
                <source src="./images/2-login.mp4" type="video/mp4">
            </video>
            <video autoplay muted controls id="video5" class="video5">
                <source src="./images/1-login.mp4" type="video/mp4">
            </video>
        </div>
        <header>
            <form name="forma" id="forma" class="form" action="" method="POST">
                @csrf
                <div class="jumbotron-content col-lg-3 col-md-6 col-sm-8 col-xs-12">   
                    </br>
                    
                    <div id='mensaje' class="alert alert-warning">
                        <strong>Error!</strong> Los datos son incorrectos.
                    </div>
                    <center>
                        <img src='./images/logoBlanco.png' width="80px" style="z-index:9999">
                    </center>
                    <h1>JADELRIO</h1>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="email">Correo:</label>
                            </div>
                            <div class="col-lg-12">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        </br>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="password">Password:</label>
                            </div>
                            <div class="col-lg-12">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        </br>                    
                        <center><button class='btn btn-md botonEnviar'>Enviar</button></center>
                    </div>
                </div>
                <input type='hidden' name='token_' id='token_' value='{{ csrf_token() }}'>
            </form>
        
        </header>
    </body>
</html>