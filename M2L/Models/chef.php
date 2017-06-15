<?php
function getNbUser($id)
{
	global $bdd;
	$req = $bdd->prepare("SELECT count(*) as nb FROM salarie WHERE salarie.id_s_1=:id");
	$req->bindValue(':id',$id,PDO::PARAM_INT);
	$req->execute();
	while($data = $req ->fetch())
	{
		return $data['nb'];
	}

}

function getUser($id)
{

	global $bdd;
	$req = $bdd->prepare("SELECT id_s,nom,prenom,mail,NbJour,credits FROM salarie WHERE salarie.id_s_1=:id");
	$req->bindValue(':id',$id,PDO::PARAM_INT);
	$req->execute();
	while($data = $req->fetchAll())
	{
		return $data;
	}
}

function getNbDmd($id)
{
	global $bdd;
	$req = $bdd->prepare("select count(*) as nb from suivre s, formation f,salarie sal where s.etat = 'En attente' and s.id_f = f.id_f and sal.id_s = s.id_s and sal.id_s_1 = :id");
	$req->bindValue(':id',$id,PDO::PARAM_INT);
	$req->execute();
	while($data = $req ->fetch())
	{
		return $data['nb'];
	}
}

function getDmd($id)
{
	global $bdd;
	$req = $bdd->prepare("select s.etat,s.id_s,s.id_f,f.libelle,f.contenu,f.date_f,f.NbJour as durée,f.id_p, sal.nom, sal.prenom,sal.NbJour
from suivre s, formation f,salarie sal where s.etat = 'En attente' and s.id_f = f.id_f and sal.id_s = s.id_s and sal.id_s_1 =:id");
	$req->bindValue(':id',$id,PDO::PARAM_INT);
	$req->execute();
	while($data = $req->fetchAll())
	{
		return $data;
	}
}



?>
