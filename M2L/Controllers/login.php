<?php 

require "Models/login.php";

if(isset($_COOKIE['auth']) && !isset($_SESSION['auth']))
{

    $auth = $_COOKIE['auth'];
    $auth = explode('_____',$auth);
    $user = get_user_cookie($auth[0]);

    $key = sha1($user['mail'].$user['password'].$_SERVER['REMOTE_ADDR']);
    if($key == $auth[1])
    {
        $_SESSION['auth'] = $user; 
        setcookie('auth',$user['id_s'].'_____'.sha1($user['mail'].$user['password'].$_SERVER['REMOTE_ADDR']),time()+(3600*24*3),'/','localhost');
        
        if($user['level'] == 1)
        header("Location:".BASE_URL."/admin");
        elseif($user['level'] == 2)
        header("Location:".BASE_URL."/chef");
        else
        header("Location:".BASE_URL."/accueil");
    }
    else
    {
        setcookie('auth','',time()-3600);
    }
}


if(isset($_POST['submit']))
{
    $user = get_user($_POST);
    $user_mail = get_user_mail($_POST);
            
    if($user)
    {
        $_SESSION['i'] = 0;
        $_SESSION['auth'] = $user; //connection user
        if(isset($_POST['remember']))
        {
            setcookie('auth',$user['id_s'].'_____'.sha1($user['mail'].$user['password'].$_SERVER['REMOTE_ADDR']),time()+(3600*24*3),'/','localhost');
        }
        if($user['level'] == 1)
        header("Location:".BASE_URL."/admin");
    	elseif($user['level'] == 2)
        header("Location:".BASE_URL."/chef");
    	else
        header("Location:".BASE_URL."/accueil");
    	
                   
     }
     else
     {   
         if($user_mail)
         {
             $_SESSION['i'] = $_SESSION['i'] + 1;
             if($_SESSION['i'] < 3)
             {
                echo'<div class="alert alert-warning">Mauvais identifiants ! '.$_SESSION['i'].' tentative(s)</div>';
             }
             
             elseif($_SESSION['i'] >= 3)
             {
                setErreur($user_mail['id_s'],$user_mail['erreur']);
                 
                echo'<div class="alert alert-warning">3 tentatives de connexions erronées - Echec enregistré !</div>';
                 
                $_SESSION['i'] = 0;
             }
         }
         else
         {
             echo '<div class="alert alert-warning">Cette utilisateur n\'existe pas !</div>';
         }
     }
}

require "Views/login.php"
?>