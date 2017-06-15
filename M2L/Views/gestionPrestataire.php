<?php $title = 'Ajouter un Prestataire'?>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Ajouter un prestataire</h3>
                </div>
                <form action="<?= BASE_URL; ?>/gestionPrestataire" method="post">
                    <div class="box-body">
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
                            <input type="text" id="code_postale" name="code_postale" class="form-control" placeholder="Code Postale"/>
                        </div>

                        <div class="form-group">
                            <label for="raison_s">Raison sociale</label>
                            <input type="text" id="raison_s" name="raison_s" class="form-control" placeholder="Raison sociale"/>
                        </div>
                        <div class="box-footer">
                            <button type="submit" name="submit" class="btn btn-primary">Valider</button>
                        </div>
                    </div>
                </form>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>