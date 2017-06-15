<?php

require "Models/profil.php";

$id_s_1 = $_SESSION['auth']['id_s_1'];
$chefequipe = getChefEquipe($id_s_1);
$id_s = $_SESSION['auth']['id_s'];

$user = getInfoUser($id_s);

if(isset($_POST['submit']))
{
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $password = $_POST['mdp'];
    $confirmpassword = $_POST['mdpconfirm'];

    if(isset($nom) AND !empty($nom) AND $nom != $user['nom'])
    {
        updateProfilNom($id_s,$nom);
        header("Location:".BASE_URL."/profil");
    }

    if(isset($prenom) AND !empty($prenom) AND $prenom != $user['prenom'])
    {
        updateProfilPrenom($id_s,$prenom);
        echo "<div class='box-body'>
                <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                Votre prénom a bien été modifié.
                </div>
                </div>";
        header("Location:".BASE_URL."/profil");
    }

    if(isset($mail) AND !empty($mail) AND $mail != $user['mail'])
    {
        updateProfilMail($id_s,$mail);
        header("Location:".BASE_URL."/profil");
    }

    if(isset($password) AND !empty($password) AND isset($confirmpassword) AND !empty($confirmpassword))
    {
        if($password == $confirmpassword)
        {
            updateProfilPassword($id_s,$password);
            header("Location:".BASE_URL."/profil");
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

    if($user['level']== 1)
    {
        $credits = $_POST['credits'];
        $nbjour = $_POST['NbJour'];

        if(isset($nbjour) AND !empty($nbjour))
        {
            updateProfilNbjour($id_s,$nbjour);
            header("Location:".BASE_URL."/profil");
        }

        if(isset($credits) AND !empty($credits))
        {
            updateProfilCredits($id_s,$credits);
            header("Location:".BASE_URL."/profil");
        }
    }

}

require "Views/profil.php";

?>