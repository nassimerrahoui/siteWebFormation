<?php
    if($_SESSION['auth']['level']== 1 || $_SESSION['auth']['level']== 2)
    {
        require "Models/gestionUser.php";

        $id_s= $_SESSION['auth']['id_s'];

        if($_SESSION['auth']['level']== 2)
        $user = getUserChef($id_s);
        elseif ($_SESSION['auth']['level']== 1) {
          $user = getUserAdmin($id_s);
        }

        if(isset($_POST['Supprimer']))
        {
            $id_s = $_POST['idUser'];
            deleteSalarie($id_s);
            header("Location:".BASE_URL."/gestionUser");
        }


        if(isset($_POST['valider']))
        {

             extract($_POST);
              $i = 0;
              $alerte = "";

              if (!isset($nom) || !preg_match("#[A-Z-\s]+#", $nom)) {
                  $i++;
                  $alerte .= "Votre nom est vide ou non conforme<br/>";
              }
              if (!isset($prenom) || !preg_match("#[A-Za-z-\s]+#", $prenom)) {
                  $i++;
                  $alerte .= "Votre identifiant est vide ou non conforme<br/>";
              }
              if (!isset($mail) || !preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-z]{2,6}$#", $mail)) {
                  $i++;
                  $alerte .= "Votre mail est vide ou non conforme<br/>";
              }
              if (!isset($mdp)|| !preg_match("#[A-Za-z0-9-\s]+#", $mdp)) {
                  $i++;
                  $alerte .= "Votre mot de passe est vide ou non conforme<br/>";
              }
              if(!isset($code_postale) || !preg_match ( "#^[0-9]{5}|[2A]|[2B]$#", $code_postale))
              {
               $i++;
                  $alerte .= "Votre code postal est vide ou non conforme<br/>";
              }

               if(!isset($numero) || !preg_match ( "#^[0-9]{1,5}$#", $numero))
              {
               $i++;
                  $alerte .= "Votre numero d'adresse est vide ou non conforme<br/>";
              }

              if (!isset($rue) || !preg_match("#[A-Z-\s]+#", $rue)) {
                  $i++;
                  $alerte .= "La rue de votre adresse est vide ou non conforme<br/>";
              }
               if (!isset($commune) || !preg_match("#[A-Z-\s]+#", $commune)) {
                  $i++;
                  $alerte .= "La ville de votre adresse est vide ou non conforme<br/>";
              }
               if (!isset($NbJour) || $NbJour <0 || $NbJour > 15 || !preg_match("#^[0-9]{1,2}$#", $NbJour)) {
                  $i++;
                  $alerte .= "Le nombre de jour de formation ne doit pas être > 15 & < 0 <br/>";
              }

              if (!isset($credits) || $credits <0 || $credits > 5000 || !preg_match("#^[0-9]{1,4}$#", $credits)) {
                  $i++;
                  $alerte .= "Le nombre de crédit de formation ne doit pas être > 5000 & < 0 <br/>";
              }

              if ($i > 0)
              {
                  echo "<div class='box-body'>
                <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-ban'></i> Erreur !</h4>
                ".$alerte."
                </div>
                </div>" ;

              }
              else
              {

                if($_SESSION['auth']['level']== 1)
                {
                    addUser();
                    $referent = 'Administrateur';
                    $_GET['p'] = 'admin';
                    header("Location:".BASE_URL."/gestionUser");
                }
                elseif($_SESSION['auth']['level']== 2)
                {
                    addUserPourChef();
                    $referent = 'Chef d\'equipe';
                    $_GET['p'] = 'chef';
                    header("Location:".BASE_URL."/gestionUser");                    
                }

            $header="MIME-Version: 1.0\r\n";
            $header.='From:"M2L-Formation.com"<support@m2lformation.com>'."\n";
            $header.='Content-Type: text/plain; charset="iso-8859-1"'."\n";
            $header.='Content-Transfer-Encoding: 8bit';

            $message='
            <html>
                <body>
                    <div align="center">
                        <br />
                        Un '. $referent .' vous as inscrit a M2L formation<br />
                        Voici vos Identifants:<br />
                        Nom: <strong>'.$nom.'</strong><br />
                        Prenom: <strong>'.$prenom.'</strong><br />
                        Mail: <strong>'.$mail.'</strong><br />
                        Mot de Passe: <strong>'.$mdp.'</strong><br />
                        Vous disposez de : <strong>'.$NbJour.'</strong> jours de formation et de <strong>'.$credits.'</strong> credits<br />
                        <br />
                    </div>
                </body>
            </html>
            ';

            //mail($mail, "Inscription M2L formation", $message, $header);

        }
    }
    require "Views/gestionUser.php";
}
else
{
     header("Location:".BASE_URL."/disconnect");
}
