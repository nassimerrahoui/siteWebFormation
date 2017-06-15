<?php
function getFiche($id_f)
{
    global $bdd;
    $requete = $bdd->prepare('SELECT f.libelle as libelleForm,f.contenu as contenuForm,f.date_d as dateDeb,
    	f.date_f as dateFin,f.NbJour as NbJour,f.credits as Credits,a.numero as numForm,a.rue as rueForm,
    	a.code_postale as cpForm,a.commune as commForm,p.raison_s as raison_s,aa.numero as numPrest,aa.rue as ruePrest,
    	aa.code_postale as cpPrest,aa.commune as commPrest
	FROM formation f, adresse a, prestataire p,adresse aa
	WHERE f.id_f = :id_f and f.id_p = p.id_p and f.id_a = a.id_a and p.id_a = aa.id_a');
    $requete->bindParam(':id_f', $id_f);
    $requete->execute();
    while ($data = $requete->fetchAll())
    {
        return $data;
    }
}
?>