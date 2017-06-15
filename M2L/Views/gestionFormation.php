<?php $title = 'Ajouter un Formation'?>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Ajouter une formation</h3>
                </div>
                <form action="<?= BASE_URL; ?>/gestionFormation" method="post">
                    <div class="box-body">
                        <per> <?php //if(isset($_POST)) { var_dump($_POST); }?> </per>
                        <div class="form-group">
                            <label for="libelle">Prestataire *: </label>
                            <select class="form-control" name="presta" required>
                                <?php
                                if (sizeof($presta) > 0) {
                                    foreach ($presta as $key => $value) {
                                        echo '<option value="' . $value['id_p'] . '">' . $value['raison_s'] . '</option>';
                                    }
                                } else {
                                    echo '<option>Pas de prestataire</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">

                            <div class="form-group">
                                <label for="libelle">Nom de la formation *: </label>
                                <input type="text" id="libelle" name="libelle" class="form-control" placeholder="Libelle" required/>
                            </div>

                            <div class="form-group">
                                <label for="type">Type de la formation : </label>
                                <select class="form-control" name="type">
                                    <option>Initiale</option>
                                    <option>Alternance</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="contenu">Contenu de la formation *: </label>
                                <textarea id="contenu" name="contenu" class="form-control" rows="5" placeholder="Contenu" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="date_d">Date de début *: </label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="date" id="date_d" name="date_d" class="form-control" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date_f">Date de fin *: </label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="date" id="date_f" name="date_f" class="form-control" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nbJour">Durée de la formation *: </label>
                                <input type="number" id="nbJour" name="nbJour" class="form-control" value="0" min="0" max="15" required/>
                            </div>
                            <div class="form-group">
                                <label for="credits">Coût de la formation *: </label>
                                <input type="number" id="credits" name="credits" class="form-control" value="0" min="0" max="5000" required/>
                            </div>
                            <label>Adresse *:</label>
                            <div class="form-group">
                                <input type="number" id="numero" name="numero" class="form-control" placeholder="N°" required/>
                            </div>
                            <div class="form-group">
                                <input type="text" id="rue" name="rue" class="form-control" placeholder="Rue" required/>
                            </div>
                            <div class="form-group">
                                <input type="text" id="commune" name="commune" class="form-control" placeholder="Ville" required/>
                            </div>
                            <div class="form-group">
                                <input type="text" id="code postale" name="code postale" class="form-control" placeholder="Code Postale" required/>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!--http://formvalidation.io/validators/date/-->
