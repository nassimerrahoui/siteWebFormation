<?php
if($_SESSION['auth']['level']== 1)
{
    require "Models/admin.php";
    require 'Core/statsAdmin.class.php';
    $nbAdmin = getNombre(1);
    $nbChef = getNombre(2);
    $nbUser = getNombre(3);
    $nbForm = get_nbForm();
    $nbPresta = get_nbPresta();
    $listAdmin = listAdmin();
    $listChef = listChef();
    $listUser = listUSer();
    $listForm = listForm();
    $listPresta = listPresta();
    require "Views/admin.php";
}
else
{
     header("Location:".BASE_URL."/disconnect");
}
