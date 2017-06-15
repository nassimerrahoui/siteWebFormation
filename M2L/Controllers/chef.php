<?php
if($_SESSION['auth']['level']== 2)
{
    include 'Core/statsAdmin.class.php';
    include 'Core/tabsFormations.class.php';
    require "Models/chef.php";
    require "Models/accueil.php";

    $id_s= $_SESSION['auth']['id_s'];
	  $nbUser = getNbUser($id_s);
	  $user = getUser($id_s);
    $Form = getForm($id_s);
    $FormAtt = getFormAtt($id_s);
    $FormHisto = getHisto($id_s);
    $nbDmd = getNbDmd($id_s);
    $Dmd = getDmd($id_s);

        if(isset($_POST['Suivre']))
        {
            $id_f = $_POST['idForm'];
            suivreForm($id_s,$id_f);
            header("Location:".BASE_URL."/chef");
        }

      

    require "Views/chef.php";
}
else
{
     header("Location:".BASE_URL."/disconnect");
}
