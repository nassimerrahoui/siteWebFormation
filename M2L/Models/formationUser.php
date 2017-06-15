<?php

function getnbjourformation($id_f)
{
    global $bdd;
    $requete = $bdd->prepare('SELECT NbJour FROM formation WHERE id_f = :id_f ');
    $requete->bindParam(':id_f', $id_f);
    $requete->execute();
    while ($data = $requete->fetch())
    {
        return $datanbjourformation = $data['NbJour'];
    }
}


function getcreditsformation($id_f)
{
    global $bdd;
    $requete = $bdd->prepare('SELECT credits FROM formation WHERE id_f = :id_f ');
    $requete->bindParam(':id_f', $id_f);
    $requete->execute();
    while ($data = $requete->fetch())
    {
        return $datacreditsformation = $data['credits'];
    }
}

function getnbjoursalarie($id_s)
{
    global $bdd;
    $requete = $bdd->prepare('SELECT NbJour FROM salarie WHERE id_s = :id_s ');
    $requete->bindParam(':id_s', $id_s);
    $requete->execute();
    while ($data = $requete->fetch())
    {
        return $datanbjoursalarie = $data['NbJour'];
    }
}

function getcreditssalarie($id_s)
{
    global $bdd;
    $requete = $bdd->prepare('SELECT credits FROM salarie WHERE id_s = :id_s ');
    $requete->bindParam(':id_s', $id_s);
    $requete->execute();
    while ($data = $requete->fetch())
    {
        return $datacreditssalarie = $data['credits'];
    }
}

function getNom($id_s)
{
    global $bdd;
    $requete = $bdd->prepare('SELECT nom FROM salarie WHERE id_s = :id_s ');
    $requete->bindParam(':id_s', $id_s);
    $requete->execute();
    while ($data = $requete->fetch())
    {
        return $datanbjoursalarie = $data['nom'];
    }
}

function getPrenom($id_s)
{
    global $bdd;
    $requete = $bdd->prepare('SELECT prenom FROM salarie WHERE id_s = :id_s ');
    $requete->bindParam(':id_s', $id_s);
    $requete->execute();
    while ($data = $requete->fetch())
    {
        return $datanbjoursalarie = $data['prenom'];
    }
}

function getFormationsUser($id)
{
		global $bdd;
       	$reponse = $bdd->prepare('SELECT formation.id_f, formation.date_d, formation.date_f, formation.NbJour, formation.credits ,salarie.id_s, salarie.nom, salarie.prenom, formation.libelle, suivre.etat, adresse.id_a, adresse.rue, adresse.commune, adresse.code_postale, adresse.numero
			from suivre, salarie, formation, adresse
			where salarie.id_s = suivre.id_s 
			and formation.id_f = suivre.id_f 
			and salarie.id_s =:id
            and suivre.etat = "En attente"
			AND formation.id_a = adresse.id_a');
        $reponse->bindValue(':id', $id,PDO::PARAM_STR);
        $reponse->execute();
        while($data = $reponse->fetchAll())
        {
            return $data;
        }
}

function valide($id_f,$id_s)
{
    global $bdd;

    $req = $bdd->prepare('UPDATE suivre SET etat="Validé" where id_f= :id_f and id_s= :id_s');
    $req->bindParam(':id_s', $id_s);
    $req->bindParam(':id_f', $id_f);
    $req->execute();
}

function refuse($id_f,$id_s)
{
    global $bdd;
    $req = $bdd->prepare('UPDATE suivre SET etat="Refusé" where id_f= :id_f and id_s= :id_s');
    $req->bindParam(':id_s', $id_s);
    $req->bindParam(':id_f', $id_f);
    $req->execute();
}

function usenbjourcredits($nbjourformation,$creditsformation,$id_s)
{
    global $bdd;

    $req1 = $bdd->prepare("UPDATE salarie SET NbJour = NbJour - '$nbjourformation', credits = credits - '$creditsformation' WHERE id_s = :id_s");
    $req1->bindParam(':id_s', $id_s);
    $req1->execute();
}
?>