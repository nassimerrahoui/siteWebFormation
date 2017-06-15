<?php

if($_SESSION['auth'])
{

    $id_s = $_SESSION['auth'];

    if($_SESSION['auth']['level']== 1 || $_SESSION['auth']['level']== 2)
    {
        require "Views/calendaradmin.php";
    }
    else
    {
        require "Views/calendar.php";
    }

}

else
{
    header("Location:".BASE_URL."/disconnect");
}