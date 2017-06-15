<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="<?= BASE_URL; ?>/Views/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE_URL; ?>/Views/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= BASE_URL; ?>/Views/css/form-elements.css">
        <link rel="stylesheet" href="<?= BASE_URL; ?>/Views/css/loginStyle.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

       <body>

        <!-- Top content -->
        <div class="top-content">
            
            <div class="inner-bg">
                <div class="container">
                    
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>M2L</strong>Formation </h1>
                            <div class="description">
                                <p>
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            
                            <div class="form-box">
                                <div class="form-top">
                                    <div class="form-top-left">
                                        <h3>Se connecter</h3>
                                        <p>Entrer votre email et votre mot de passe pour vous connecter:</p>
                                    </div>
                                    <div class="form-top-right">
                                        <i class="fa fa-lock"></i>
                                    </div>
                                </div>
                                <div class="form-bottom">
                                    <form role="form" action="#" method="post" class="login-form">
                                        <div class="form-group">
                                            <label class="sr-only" for="form-username">Username</label>
                                            <input type="email" name="mail" placeholder="Email" class="form-username form-control" id="form-username">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="form-password">Password</label>
                                            <input type="password" name="mdp" placeholder="************" class="form-password form-control" id="form-password">
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" name="remember"> Se souvenir de moi
                                        </div>

                                        <button type="submit" name="submit" class="btn">Connexion</button>
                                        <br>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                        </div>
                </div>
            </div>
            
        </div>

       

        <!-- Javascript -->
        <script src="<?= BASE_URL; ?>/Views/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="<?= BASE_URL; ?>/Views/bootstrap/js/bootstrap.js"></script>
        <script src="<?= BASE_URL; ?>/Views/js/jquery.backstretch.min.js"></script>
        <script src="<?= BASE_URL; ?>/Views/js/loginScripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>