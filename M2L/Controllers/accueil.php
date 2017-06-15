<?php 

if($_SESSION['auth']['level'] == 3)
{
    require "Models/accueil.php";
    include 'Core/tabsFormations.class.php';

    $_GET['p'] = 'accueil';
    $id_s = $_SESSION['auth']['id_s'];

    $Form = getForm($id_s);
    $FormAtt = getFormAtt($id_s);
    $FormHisto = getHisto($id_s);

    if(isset($_POST['Suivre']))
    {
        $id_f = $_POST['idForm'];

        suivreForm($id_s,$id_f);

        header("Location:".BASE_URL."/accueil");
    }
    /*if(isset($_POST['Export']))
    {
        
        var_dump($id_f);
    }
    */
    require "Views/accueil.php";
}
else
{
   header("Location:".BASE_URL."/disconnect");
}

?>