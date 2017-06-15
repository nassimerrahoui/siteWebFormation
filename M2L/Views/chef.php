<?php $title = 'Accueil' ?>
<div class="row">
    <?= statsAdmin::stats("blue", "$nbUser", "Utilisateur(s) affecté(s)", "person-add", "user") ?>
    <?= statsAdmin::stats("orange", "$nbDmd", "Demande(s)en attente(s)", "android-time", "dmd") ?>
    <div class="col-md-12">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
                <li><a href="#tab_1-1" data-toggle="tab">Historiques</a></li>
                <li><a href="#tab_2-2" data-toggle="tab">Formations en attentes</a></li>
                <li class="active"><a href="#tab_3-2" data-toggle="tab">Formations proposées</a></li>

                <li class="pull-left header"><i class="fa fa-university"></i>Formations</li>
            </ul>
            <div class="tab-content">
                <?= tabsFormations::Historic($FormHisto, "1-1", "histo") ?>
                <?= tabsFormations::Waiting($FormAtt, "2-2", "attente") ?>
                <?= tabsFormations::Offer($Form, "3-2", "propose") ?>
            </div>
            <!-- /.tab-content -->
        </div>
    </div>
</div>


<div class="modal" id="user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4>Liste des utilisateurs</h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Mail</th>
                            <th>Formations</th>
                        </tr>
                        <?php
                        if ($nbUser > 0) {
                            foreach ($user as $key => $value) {

                            echo
                                    '<tbody>
                            <tr>
                            <td>' . $value['nom'] . '</td>
                            <td>' . $value['prenom'] . '</td>
                            <td>' . $value['mail'] . '</td>
                            <td>
                            <form method="post" action="' . BASE_URL . '/formationUser">
                                    <button type="submit" class="btn btn-xs" name="formUser" >
                                        <span><i class="glyphicon glyphicon-list"></i></span>
                                    <input name="idUser" type="hidden" value="' . $value['id_s'] . '" ></button>
                                    
                            </form>
                            </td>
                            </tr>
                            </tbody>';
                            }
                        }
                        ?>

                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <div class="modal-footer">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal" id="dmd">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4>Liste des demandes qui nécessite votre attention</h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive no-padding">
                    <table id="histo" class="table table-hover">
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Formation</th>
                            <th>Date</th>
                            <th>Durée</th>
                            <th>Jour restant</th>
                        </tr>
                        <?php
                        if ($nbDmd > 0) {
                            foreach ($Dmd as $key => $value) {
                                echo
                                    '
                            <tr>
                            <td>' . $value['nom'] . '</td>
                            <td>' . $value['prenom'] . '</td>
                            <td>' . $value['libelle'] . '</td>
                            <td>' . $value['date_f'] . '</td>
                            <td>' . $value['durée'] . '</td>
                            <td>' . $value['NbJour'] . '</td>
                            </tr>
                            ';
                            }
                        }
                        ?>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <div class="modal-footer">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
