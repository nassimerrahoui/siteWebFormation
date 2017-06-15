<?php
    function get_user_cookie($id)
    {
        global $bdd;
        
        $user = $bdd->prepare("SELECT * FROM salarie WHERE id_s=:id");
        $user->bindValue(':id',$id,PDO::PARAM_INT);
        $user->execute();
        return $user->fetch();
    }

    function get_user($params)
    {
        global $bdd;
        
        $user = $bdd->prepare("SELECT * FROM salarie WHERE mail=:mail AND password=:mdp");
        $user->bindValue(':mail', $params['mail'],PDO::PARAM_STR);
        $user->bindValue(':mdp', sha1($params['mdp']),PDO::PARAM_STR); // mdp a cryter dans la bdd
        $user->execute();
        return $user->fetch();
    }

    function get_user_mail($params)
    {
        global $bdd;
        
        $user = $bdd->prepare("SELECT * FROM salarie WHERE mail=:mail");
        $user->bindValue(':mail', $params['mail'],PDO::PARAM_STR);
        $user->execute();
        return $user->fetch();
    }

    function setErreur($id_s, $erreur)
    {
        global $bdd;
        $erreur = $erreur + 1;
        $req = $bdd->prepare('UPDATE salarie SET erreur = :erreur WHERE id_s = :id_s');
        $req->bindParam(':id_s', $id_s);
        $req->bindParam(':erreur', $erreur);
        $req->execute();
    }




