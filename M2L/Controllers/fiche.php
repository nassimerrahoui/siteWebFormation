<?php
if(isset($_SESSION))
{
require 'Models/fiche.php';

$id_f = $_POST['idForm'];
$fiche = getFiche($id_f);


require 'Views/fiche.php';
}
else
{
   header("Location:".BASE_URL."/disconnect");
}