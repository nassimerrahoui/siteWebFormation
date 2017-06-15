<?php

require "Models/update.php";


$id_s = $_POST['idUser'];

$user = getInfoUser($id_s);

if(isset($_POST['submit']))
{
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $password = $_POST['mdp'];
    $confirmpassword = $_POST['mdpconfirm'];
    $id_p = $_POST['idPers'];
    if(isset($nom) AND !empty($nom) AND $nom != $user['nom'])
    {
        setNom($id_p,$nom);
        header("Location:".BASE_URL."/gestionUser");
    }

     if(isset($prenom) AND !empty($prenom) AND $prenom != $user['prenom'])
    {
        setPrenom($id_p,$prenom);
        echo "<div class='box-body'>
                <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                Votre prénom a bien été modifié.
                </div>
                </div>";
        header("Location:".BASE_URL."/gestionUser");
    }

    if(isset($mail) AND !empty($mail) AND $mail != $user['mail'])
    {
        setMail($id_p,$mail);
        header("Location:".BASE_URL."/gestionUser");
    }

    if(isset($password) AND !empty($password) AND isset($confirmpassword) AND !empty($confirmpassword))
    {
        if($password == $confirmpassword)
        {
            setPassword($id_p,$password);
            header("Location:".BASE_URL."/gestionUser");
        }
        else
        {
            echo "<div class='box-body'>
                <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                Les mot de passe ne correspondent pas.
                </div>
                </div>";
        }
    }


    if($_SESSION['auth']['level'] == 1)
    {
        $credits = $_POST['credits'];
        $nbjour = $_POST['NbJour'];

        if(isset($nbjour) AND !empty($nbjour))
        {
            setNbjour($id_s,$nbjour);
            header("Location:".BASE_URL."/gestionUser");
        }

        if(isset($credits) AND !empty($credits))
        {
            setCredits($id_s,$credits);
            header("Location:".BASE_URL."/gestionUser");
        }
    }

}

require "Views/userUpdate.php";

?>