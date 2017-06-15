<?php
    session_start();
    unset($_SESSION);
    session_destroy();
    setcookie('auth','',time()-3600,'/','localhost');
    unset($_COOKIE['auth']);
    header('Location:'.BASE_URL);
?>