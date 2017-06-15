<?php

    if($_SESSION['auth']['level']== 1 ||$_SESSION['auth']['level']== 2 )
    {
        require "Models/gestionFormation.php";
        
        $presta = getPresta();
        
        if(isset($_POST['submit']))
        {
            $codePostal = $_POST['code_postale'];
            $libelle = $_POST['libelle'];
            $datedébut = $_POST['date_d'];
            $datefin = $_POST['date_f'];
            $credits = $_POST['credits'];
            $jours = $_POST['nbJour'];

            if (!preg_match("#^[a-zA-Z0-9_]{3,30}$#",$libelle))
            {
                echo '<div class="col-md-10 col-md-offset-2"><div class="alert alert-danger">Nom de formation invalide</div></div>';
            }
            if (!preg_match("#^(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))$#",$datedébut))
            {
                echo '<div class="col-md-10 col-md-offset-2"><div class="alert alert-danger">Date de début invalide</div></div>';
            }

            if (!preg_match("#^(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))$#",$datefin))
            {
                echo '<div class="col-md-10 col-md-offset-2"><div class="alert alert-danger">Date de fin invalide</div></div>';
            }
            /*if (!preg_match("#^([0-3][0-9])\-([0-9]{2,2})\-([0-9]{2,4})$#",$datefin))
            {
                echo '<div class="col-md-10 col-md-offset-2"><div class="alert alert-danger">Date de fin invalide</div></div>';
            }*/
            if (!preg_match("#^[0-9]{5}$#",$codePostal))
            {
                echo '<div class="col-md-10 col-md-offset-2"><div class="alert alert-danger">Code Postal invalide</div></div>';
            }
            if (!preg_match("#^0-9]{1,3}$#",$jours))
            {
                echo '<div class="col-md-10 col-md-offset-2"><div class="alert alert-danger">Nom de formation invalide</div></div>';
            }
            if (!preg_match("#^[0-9]{1,4}$#",$credits))
            {
                echo '<div class="col-md-10 col-md-offset-2"><div class="alert alert-danger">Nom de formation invalide</div></div>';
            }
            else
            {
                addFormation();
                echo '<div class="col-md-10 col-md-offset-2"><div class="alert alert-info">Ajout réussie!</div></div>';
            }
        }
        
        if($_SESSION['auth']['level']== 1)
        {
            $_GET['p'] = 'admin';
        }
        else
        {
            $_GET['p'] = 'chef';
        }
        
        require "Views/gestionFormation.php";
    }
    else
    {
        header("Location:".BASE_URL."/disconnect");
    }
