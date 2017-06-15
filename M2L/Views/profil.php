<?php $title = 'Profil'?>
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="http://www.africabeauties.net/img/team/team-member.jpg" alt="User profile picture">

                    <h3 class="profile-username text-center"><?= $user['nom'],' ', $user['prenom'] ?></h3>

                    <p class="text-muted text-center"><?= $user['mail'] ?></p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Jours de Formations</b><p class="pull-right"><?= $user['NbJour'] ?></p>
                        </li>
                        <li class="list-group-item">
                            <b>Crédits</b><p class="pull-right"><?= $user['credits'] ?></p>
                        </li>
                        <?php if($user['level']== 3)
                        echo "<li class='list-group-item'>
                            <b>Chef d'équipe</b> <p class='pull-right'>$chefequipe</p>
                        </li>"
                        ?>
                    </ul>

                    <a href="#" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-comment"></i> <span>Message</span></a>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Modifier mes informations</h3>
                </div>
                <form role="form" action="<?= BASE_URL; ?>/profil" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom" value="<?= $user['nom'] ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prenom</label>
                            <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Prenom" value="<?= $user['prenom'] ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="mail">Adresse Mail</label>
                            <input type="email" id="mail" name="mail" class="form-control" placeholder="Email" value="<?= $user['mail'] ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="mdp">Mot de Passe</label>
                            <input type="password" id="mdp" name="mdp" class="form-control" placeholder="*******""/>
                        </div>
                        <div class="form-group">
                            <label for="mdpconfirm">Comfirmation Mot de Passe</label>
                            <input type="password" id="mdpconfirm" name="mdpconfirm" class="form-control" placeholder="*******""/>
                        </div>
                        <?php if($user['level']== 1)
                        echo '<div class="form-group">
                                <label for="NbJour">Jours de formation</label>
                                <input type="number" id="NbJour" name="NbJour" class="form-control" value="'.$user['NbJour'].'" min="0" max="15"/>
                              </div>
                              <div class="form-group">
                                <label for="credits">Crédits de formation</label>
                                <input type="number" id="credits" name="credits" class="form-control" value="'.$user['credits'].'" min="0" max="5000"/>
                              </div>';
                        ?>
                    </div>
                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>