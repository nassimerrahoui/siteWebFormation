<?php

function getPresta()
{
    global $bdd;
    $reponse = $bdd->query('SELECT id_p, raison_s FROM prestataire');
    while ($data = $reponse->fetchAll())
    {
        return $data;
    }
}

function addFormation()
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

    $sql = "INSERT INTO formation (libelle, contenu, date_d, date_f, NbJour, credits, id_p, id_a) VALUES (:libelle,:contenu, :date_d, :date_f,:NbJour,:credits,:id_p,:id_a)";
    $requete = $bdd->prepare($sql);
    $requete->bindParam(':libelle', $_POST['libelle']);
    $requete->bindParam(':contenu', $_POST['contenu']);
    $requete->bindParam(':date_d', $_POST['date_d']);
    $requete->bindParam(':date_f', $_POST['date_f']);
    $requete->bindParam(':NbJour', $_POST['nbJour']);
    $requete->bindParam(':credits', $_POST['credits']);
    $requete->bindParam(':id_p', $_POST['presta']);
    $requete->bindParam(':id_a', $id_a);
    $requete->execute();
    
    $id_f = $bdd->lastInsertId();
    
    $sql = "INSERT INTO situer (id_f, id_a) VALUES (:id_f,:id_a)";
    $requete = $bdd->prepare($sql);
    $requete->bindParam(':id_f', $id_f);
    $requete->bindParam(':id_a', $id_a);
    $requete->execute();
    
    $sql = "INSERT INTO type_formation (nom_type,id_f) VALUES (:nom_type,:id_f)";
    $requete = $bdd->prepare($sql);
    $requete->bindParam(':nom_type', $_POST['type']);
    $requete->bindParam(':id_f', $id_f);
    $requete->execute();
}