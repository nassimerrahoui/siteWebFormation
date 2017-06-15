<?php
function getNombre($type)
    {
        global $bdd;
        $sql = ('SELECT count(*) as nb FROM salarie WHERE level= :type');
        $rep = $bdd->prepare('SELECT count(*) as nb FROM salarie WHERE level= :type');
        $rep->bindParam(':type', $type, PDO::PARAM_INT);
        $rep->execute();
        while ($data = $rep->fetch()){
            return $data['nb'];
        }
    }

function getList($type)
{
        //Pas réussi à faire fonctionné --'
        global $bdd;
        $sql = ('SELECT * FROM salarie WHERE level= :type');
        $rep = $bdd->prepare('SELECT count(*) as nb FROM salarie WHERE level= :type');
        $rep->bindParam(':type', $type, PDO::PARAM_INT);
        $rep->execute();
        while ($data = $rep->fetchAll()){
            return $data;
        }
}

function listAdmin()
{
    global $bdd;
    $reponse = $bdd->query('select * from salarie where level =1');
            while ($data = $reponse->fetchAll()){
                
                return $data;
        }
}

function listChef()
{
    global $bdd;
    $reponse = $bdd->query('select * from salarie where level =2');
            while ($data = $reponse->fetchAll()){
                
                return $data;
        }
}

function listUser()
{
    global $bdd;
    $reponse = $bdd->query('select * from salarie where level =3');
            while ($data = $reponse->fetchAll()){
                
                return $data;
        }
}

function listPresta()
{
    global $bdd;
    $reponse = $bdd->query('select  distinct p.raison_s,a.numero,a.rue,a.commune,a.code_postale
from prestataire p , adresse a
where p.id_a =a.id_a');
            while ($data = $reponse->fetchAll()){
                
                return $data;
        }
}

 function listForm()
    {
        global $bdd;
        $reponse = $bdd->query('select * from formation, adresse where DATE_FORMAT(CURRENT_DATE(),"%Y-%m-%d") < date_f AND formation.id_a = adresse.id_a');
            while ($data = $reponse->fetchAll()){
                
                return $data;
        }
    }
 function get_nbForm()
    {
        global $bdd;
       	$reponse = $bdd->query('SELECT count(*) as nbForm FROM formation');
		while ($data = $reponse->fetch()){
			return $data['nbForm'];
		}
    }

function get_nbPresta()
{
    global $bdd;
    $reponse = $bdd->query('SELECT count(*) as nbPresta FROM prestataire');
    while ($data = $reponse->fetch()){
        return $data['nbPresta'];
    }
}

?>