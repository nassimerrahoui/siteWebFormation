<?php

function getPresta()
{
    global $bdd;       
    $requete = $bdd->query("SELECT id_p, raison_s, id_a FROM prestataire");
    while ($data = $reponse->fetchAll())
    {
        return $data;
    }
}

function addPresta()
{
    global $bdd;
        
    $sql = "INSERT INTO adresse (numero, rue, commune, code_postale) VALUES (:numero,:rue,:commune,:code_postale)";
        $requete = $bdd->prepare($sql);
        $requete->bindParam(':numero', $_POST['numero']);
        $requete->bindParam(':rue', $_POST['rue']);
        $requete->bindParam(':commune', $_POST['commune']);
        $requete->bindParam(':code_postale', $_POST['code_postale']);
        $requete->execute();
        $id_a = $bdd->lastInsertId();
    
    $sql = "INSERT INTO prestataire (raison_s, id_a) VALUES (:raison_s, :id_a)";
    $requete = $bdd->prepare($sql);
    $requete->bindParam(':raison_s', $_POST['raison_s']);
    $requete->bindParam(':id_a', $id_a);
    $requete->execute();

}


