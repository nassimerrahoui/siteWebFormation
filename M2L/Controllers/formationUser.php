<?php
if($_SESSION['auth']['level']== 2)
{
    require "Models/admin.php";
    require "Models/formationUser.php";

    if (isset($_POST['formUser']))
    {
    $_SESSION['test'] = $_POST['idUser'];
    }
    $listeFormation = getFormationsUser($_SESSION['test']);

    $_GET['p'] = 'chef';

    $joursSal =getnbjoursalarie($_SESSION['test']);
    $credSal = getcreditssalarie($_SESSION['test']);
    $nom = getNom($_SESSION['test']);
    $prenom = getPrenom($_SESSION['test']);
    if (isset($_POST['Valide']))
	{
		$id_f = $_POST['idForm'];
        $nbjourformation = getnbjourformation($id_f);
        $creditsformation = getcreditsformation($id_f);
        $nbjoursalarie = getnbjoursalarie($_SESSION['test']);
        $creditssalarie = getcreditssalarie($_SESSION['test']);

        if (($nbjoursalarie >= $nbjourformation) && ($creditssalarie >= $creditsformation))
        {
            valide($id_f,$_SESSION['test']);
            usenbjourcredits($nbjourformation,$creditsformation,$_SESSION['test']);
            header("Location:".BASE_URL."/formationUser");
        }
        else
        {
            echo "<div class='box-body'>
                <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-ban'></i> Erreur !</h4>
                L'utilisateur ne dispose pas d'assez de crédits ou de jours de formation pour s'inscrire a cette formation.
                </div>
                </div>";
        }
	}
	if (isset($_POST['Refuse']))
	{
		$id_f = $_POST['idForm'];

		refuse($id_f,$_SESSION['test']);

		header("Location:".BASE_URL."/formationUser");
	}

    require "Views/formationUser.php";
}
else
{
     header("Location:".BASE_URL."/disconnect");
}