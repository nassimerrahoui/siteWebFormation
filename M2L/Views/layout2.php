<?php include 'Core/helper.class.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>M2L | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>/Views/bootstrap/css/bootstrap.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>/Views/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="<?= BASE_URL; ?>/Views/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/Views/plugins/fullcalendar/fullcalendar.print.css" media="print">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>/Views/dist/css/AdminLTE.css">
<!--    <link rel="stylesheet" href="--><?//= BASE_URL; ?><!--/Views/css/style.css">-->
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>/Views/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/Views/css/dataTables.bootstrap.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    <header class="main-header">

        <!-- Logo -->
        <a href="" class="logo">
            <!-- logo for regular state and mobile devices -->
            <?php
            if($_SESSION['auth']['level']== 1)
            {
                echo('<span class="logo-lg"><b>ADMIN</b>M2L</span>');
            }
            elseif ($_SESSION['auth']['level'] == 2)
            {
                echo('<span class="logo-lg"><b>CHEF</b>M2L</span>');
            }
            else
            {
                echo('<span class="logo-lg"><b>UTILISATEUR</b>M2L</span>');
            }
            echo('<span class="logo-mini">M2L</span>');
            ?>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <?php
                    echo helper::dropdown('fa fa-btc','success',$_SESSION['auth']['credits'],'Crédits');
                    echo helper::dropdown('fa fa-calendar','danger',$_SESSION['auth']['NbJour'],'Jours de formation');
                    ?>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="user user-menu">
                        <a href="<?= BASE_URL; ?>/profil">
                            <img src="http://www.africabeauties.net/img/team/team-member.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs">Profil</span>
                        </a>
                    </li>
                </ul>
            </div>

        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MENU PRINCIPAL</li>
                <li>
                    <?php
                    if($_SESSION['auth']['level']== 1 || $_SESSION['auth']['level']== 2)
                    {
                        if ($_SESSION['auth']['level'] == 1)
                        {
                            echo helper::menu('admin','fa fa-home','Accueil');
                        }
                        elseif ($_SESSION['auth']['level'] == 2)
                        {
                            echo helper::menu('chef','fa fa-home','Accueil');
                        }
                        echo helper::menu('gestionUser','fa fa-user-plus','Gestion utilisateurs');
                        echo helper::menu('gestionPrestataire', 'fa fa-user-plus','Ajouter un Prestataire');
                        echo helper::menu('gestionFormation','glyphicon glyphicon-plus','Ajouter une Formation');
                    }
                    else
                    {
                        echo helper::menu('accueil','fa fa-home','Accueil');
                    }
                    echo helper::menu('calendar','fa fa-calendar','Calendrier');
                    echo '<li class="header">GESTION DU COMPTE</li>';
                    echo helper::menu('disconnect','glyphicon glyphicon-log-out','Déconnexion');
                    ?>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?= $title ?>
                <hr>
            </h1>
        </section>
        <section class="content">
        <?= $content; ?>
        </section>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2016-2017 M2L.</strong> Tous droits réservés.
    </footer>

<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>

<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?= BASE_URL; ?>/Views/plugins/jQuery/jquery-3.2.0.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= BASE_URL; ?>/Views/plugins/jQueryUI/jquery-ui.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?= BASE_URL; ?>/Views/bootstrap/js/bootstrap.js"></script>
<!-- Momentjs -->
<script src="<?= BASE_URL; ?>/Views/plugins/moment/moment.min.js"></script>
<!-- FastClick -->
<script src="<?= BASE_URL; ?>/Views/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= BASE_URL; ?>/Views/dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="<?= BASE_URL; ?>/Views/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?= BASE_URL; ?>/Views/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= BASE_URL; ?>/Views/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?= BASE_URL; ?>/Views/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?= BASE_URL; ?>/Views/plugins/chartjs/Chart.min.js"></script>
<script src="<?= BASE_URL; ?>/Views/plugins/fullcalendar/fullcalendar.js"></script>
<!-- DataTables -->
<script src="<?= BASE_URL; ?>/Views/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= BASE_URL; ?>/Views/plugins/datatables/dataTables.bootstrap.js"></script>
<script>
    $('a[href="' + this.location.pathname + '"]').parents('li,ul').addClass('active');

    $(document).ready(function() {
        $('#propose').DataTable({
            "columnDefs": [
            {
                "targets": [4,5,6],
                "orderable": false,
                "searchable": false
            }],

            "language": {
                search: "_INPUT_",
                searchPlaceholder: "Recherche...",
                "sLengthMenu": "Afficher _MENU_ lignes",
                "paginate": {
                    "previous": "Précédent",
                    "next": "Suivant"
                },
                sInfo: "_TOTAL_ lignes",
                sInfoFiltered: " affichée(s) sur _MAX_ ligne(s)",
                sZeroRecords: "Aucuns résultats",
                sInfoEmpty: "Aucunes lignes"
            }
        });
        $('#attente').DataTable({
            "columnDefs": [
            {
                "targets": [4,5],
                "orderable": false,
                "searchable": false
            }],

            "language": {
                search: "_INPUT_",
                searchPlaceholder: "Recherche...",
                "sLengthMenu": "Afficher _MENU_ lignes",
                "paginate": {
                    "previous": "Précédent",
                    "next": "Suivant"
                },
                sInfo: "_TOTAL_ lignes",
                sInfoFiltered: " affichée(s) sur _MAX_ ligne(s)",
                sZeroRecords: "Aucuns résultats",
                sInfoEmpty: "Aucunes lignes"
            }
        });
        $('#histo').DataTable({
            "columnDefs": [
            {
                "targets": [4],
                "orderable": false,
                "searchable": false
            }],

            "language": {
                search: "_INPUT_",
                searchPlaceholder: "Recherche...",
                "sLengthMenu": "Afficher _MENU_ lignes",
                "paginate": {
                    "previous": "Précédent",
                    "next": "Suivant"
                },
                sInfo: "_TOTAL_ lignes",
                sInfoFiltered: " affichée(s) sur _MAX_ ligne(s)",
                sZeroRecords: "Aucuns résultats",
                sInfoEmpty: "Aucunes lignes"
            }
        });
    });
</script>
</body>
</html>
