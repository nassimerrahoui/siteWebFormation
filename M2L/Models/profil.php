<?php

function getChefEquipe($id_s_1)
{
    global $bdd;
    $requete = $bdd->prepare("SELECT nom,prenom,mail FROM salarie WHERE id_s = :id_s_1");
	$requete->bindValue(':id_s_1',$id_s_1,PDO::PARAM_INT);
    $requete->execute();
    while($data = $requete ->fetch())
    {
        $getchefequipe = $data['nom'].' '.$data['prenom'].' '.$data['mail'];
        return $getchefequipe;
    }
}

function getInfoUser($id_s)
{
    global $bdd;
    $requeteuser = $bdd->prepare("SELECT * FROM salarie WHERE id_s = :id_s");
    $requeteuser->bindValue(':id_s',$id_s);
    $requeteuser->execute();
    while ($data = $requeteuser->fetch())
    {
        return $data;
    }
}

function updateProfilNom($id_s,$nom)
{
    global $bdd;
    $req = $bdd->prepare('UPDATE salarie SET nom = :nom WHERE id_s = :id_s');
    $req->bindParam(':id_s', $id_s);
    $req->bindParam(':nom', $nom);
    $req->execute();
}

function updateProfilPrenom($id_s,$prenom)
{
    global $bdd;
    $req = $bdd->prepare('UPDATE salarie SET prenom = :prenom WHERE id_s = :id_s');
    $req->bindParam(':id_s', $id_s);
    $req->bindParam(':prenom', $prenom);
    $req->execute();
}

function updateProfilMail($id_s,$mail)
{
    global $bdd;
    $req = $bdd->prepare('UPDATE salarie SET mail = :mail WHERE id_s = :id_s');
    $req->bindParam(':id_s', $id_s);
    $req->bindParam(':mail', $mail);
    $req->execute();
}

function updateProfilPassword($id_s,$password)
{
    global $bdd;
    $req = $bdd->prepare('UPDATE salarie SET password = :password WHERE id_s = :id_s');
    $req->bindParam(':id_s', $id_s);
    $req->bindParam(':password', sha1($password));
    $req->execute();
}

function updateProfilNbjour($id_s,$nbjour)
{
    global $bdd;
    $req = $bdd->prepare('UPDATE salarie SET NbJour = :nbjour WHERE id_s = :id_s');
    $req->bindParam(':id_s', $id_s);
    $req->bindParam(':nbjour', $nbjour);
    $req->execute();
}

function updateProfilCredits($id_s,$credits)
{
    global $bdd;
    $req = $bdd->prepare('UPDATE salarie SET credits = :credits WHERE id_s = :id_s');
    $req->bindParam(':id_s', $id_s);
    $req->bindParam(':credits', $credits);
    $req->execute();
}