<?php

if($_SESSION['auth']['level']== 1 ||$_SESSION['auth']['level']== 2 )
{
    require "Models/gestionPrestataire.php";
    if(isset($_POST['submit']))
    {
        $i = 0;
        $alerte = "";

        if (!preg_match("#^[0-9]$#", $_POST['numero']))
        {
            $i++;
            $alerte.= 'Le numéro de rue est incorrect</br>';
        }
        if(!preg_match("#^[a-zA-ZÀÉÈËÊÔÂÜÄÌïîáäéèëêôüìîï]{1,30}$#", $_POST['rue']))
        {
            $i++;
            $alerte.= 'La rue est incorrect</br>';
        }
        if(!preg_match("#^[a-zA-ZÀÉÈËÊÔÂÜÄÌïîáäéèëêôüìîï]{1,30}$#", $_POST['commune']))
        {
            $i++;
            $alerte.= 'La ville est incorrect</br>';
        }
        if(!preg_match("#^[0-9]{5}|2A|2B$#", $_POST['code_postale']))
        {
            $i++;
            $alerte.= 'Le code postale est incorrect</br>';
        }
       if(!preg_match("#^[a-zA-ZÀÉÈËÊÔÂÜÄÌïîáäéèëêôüìîï]{1,30}$#", $_POST['raison_s']))
        {
            $i++;
            $alerte.= 'La raison sociale est incorrect</br>';
        }
        if ($i > 0)
        {
            echo "<div class='box-body'>
                <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-ban'></i> Erreur !</h4>
                ".$alerte."
                </div>
                </div>" ;
        }
        else
        {
            addPresta();
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
    require "Views/gestionPrestataire.php";
}
else
{
    header("Location:".BASE_URL."/disconnect");
}
