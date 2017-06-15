<?php $title = ' '?>
<div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
                <li><a href="#tab_1-1" data-toggle="tab"><i class="fa fa-plus"></i> Ajout</a></li>
                <li class="active"><a href="#tab_2-2" data-toggle="tab">Modification/Suppression</a></li>

                <li class="pull-left header"><i class="fa fa-users"></i>Gestion utilisateurs</li>
            </ul>
            <div class="tab-content">

                <div class="tab-pane " id="tab_1-1">
                <div class="box-body">
                <div class="col-md-8 col-md-offset-2">
                <form role="form" action="<?= BASE_URL; ?>/gestionUser" method="post">
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom"/>
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prenom</label>
                            <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Prenom"/>
                        </div>
                        <div class="form-group">
                            <label for="mail">Adresse Mail</label>
                            <input type="email" id="mail" name="mail" class="form-control" placeholder="Email"/>
                        </div>
                        <div class="form-group">
                            <label for="mdp">Mot de Passe</label>
                            <input type="password" id="mdp" name="mdp" class="form-control" placeholder="*******"/>
                        </div>

                        <label>Adresse</label>
                        <div class="form-group">
                            <input type="number" id="numero" name="numero" class="form-control" placeholder="N°"/>
                        </div>
                        <div class="form-group">
                            <input type="text" id="rue" name="rue" class="form-control" placeholder="Rue"/>
                        </div>
                        <div class="form-group">
                            <input type="text" id="commune" name="commune" class="form-control" placeholder="Ville"/>
                        </div>
                        <div class="form-group">
                            <input type="text" id="code postale" name="code postale" class="form-control" placeholder="Code Postale"/>
                        </div>

                        <div class="form-group">
                            <label for="NbJour">Jours de formation</label>
                            <input type="number" id="NbJour" name="NbJour" class="form-control" value="0" min="0" max="15"/>
                        </div>
                        <div class="form-group">
                            <label for="credits">Crédits de formation</label>
                            <input type="number" id="credits" name="credits" class="form-control" value="0" min="0" max="5000"/>
                        </div>
                        <div class="form-group">
                            <?php
                            if ($_SESSION["auth"]["level"] == 1) {
                                echo '<label for="level">Niveau</label>
                    <input type="number" id="level" name="level" class="form-control" value="3" min="1" max="3"/>
                    <p>(1 = administrateur, 2 = chef, 3 = utilisateur)</p>
                    ';
                            }
                            ?>
                            
                        </div>
                        <div class="box-footer">
                        <button type="submit" name="valider" class="btn btn-primary pull-right">Valider</button>
                        </div>
                  </form>
                    </div>
                </div>
                </div>
              

               <div class="tab-pane active" id="tab_2-2">
                <div class="table-responsive no-padding">
                 <table class="table table-hover" id="listUser">
                  <?php
                if($_SESSION['auth']['level']== 2)
                    {
                      echo'                  
                      <thead>
                  <tr>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Mail</th>
                  <th>Nb Jour</th>
                  <th>Crédits</th>
                  <th>Supprimer</th>
                  <th>Modifier</th>
                  </tr>
                  </thead>';
                    }
                    elseif ($_SESSION['auth']['level']== 1) {
                      echo'                  <thead>
                  <tr>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Mail</th>
                  <th>Nb Jour</th>
                  <th>Crédits</th>
                  <th>Niveau</th>
                  <th>Supprimer</th>
                  <th>Modifier</th>
                  </tr>
                  </thead>';
                    }
                ?>

                  <?php
                  foreach ($user as $key => $value)
                  {
                    if($_SESSION['auth']['level']== 2)
                    {
                      echo '<tbody>
                                     <tr>
                                          <td>'.$value['nom'].'</td>
                                          <td>'.$value['prenom'].'</td>
                                          <td>'.$value['mail'].'</td>
                                            <td>'.$value['NbJour'].'</td>
                                            <td>'.$value['credits'].'</td>
                                            <td>
                                            <form method="post" action="' . BASE_URL . '/gestionUser">
                                                    <button type="submit" class="btn btn-xs" name="Supprimer" >
                                                        <span><i class="glyphicon glyphicon-trash"></i></span>
                                                    </button>
                                                    <input name="idUser" type="hidden" value="' . $value['id_s'] . '" >
                                            </form>
                                            </td>
                                            <td>
                                            <form method="post" action="' . BASE_URL . '/userUpdate">
                                                    <button type="submit" class="btn btn-xs" name="Modifier" >
                                                        <span><i class="glyphicon glyphicon-pencil"></i></span>
                                                    </button>
                                                    <input name="idUser" type="hidden" value="' . $value['id_s'] . '" >
                                            </form>
                                            </td>
                                     </tr>
                                </tbody>';
                    }
                    elseif ($_SESSION['auth']['level']== 1) {
                      echo '<tbody>
                                     <tr>
                                          <td>'.$value['nom'].'</td>
                                          <td>'.$value['prenom'].'</td>
                                          <td>'.$value['mail'].'</td>
                                            <td>'.$value['NbJour'].'</td>
                                            <td>'.$value['credits'].'</td>
                                            <td>'.$value['level'].'</td>
                                            <td>
                                            <form method="post" action="' . BASE_URL . '/gestionUser">
                                                    <button type="submit" class="btn btn-xs" name="Supprimer" >
                                                        <span><i class="glyphicon glyphicon-trash"></i></span>
                                                    </button>
                                                    <input name="idUser" type="hidden" value="' . $value['id_s'] . '" >
                                            </form>
                                            </td>
                                            <td>
                                            <form method="post" action="' . BASE_URL . '/userUpdate">
                                                    <button type="submit" class="btn btn-xs" name="Modifier" >
                                                        <span><i class="glyphicon glyphicon-pencil"></i></span>
                                                    </button>
                                                    <input name="idUser" type="hidden" value="' . $value['id_s'] . '" >
                                            </form>
                                            </td>
                                     </tr>
                                </tbody>';
                    }
                    }
                ?>
                </table>
                 </div>
                </div>
 </div>
   