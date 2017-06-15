<?php $title = 'Validation des formations'?>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"> Demandes de formation</h3><hr>
                    <?php
                    echo '
                    <h4><b>'.$nom.' '.$prenom.'</b></h4>
                         <p><b>Nombre de jour :</b> '.$joursSal.'</p>
                         <i class="fa fa-btc"></i>'.$credSal.'</p>';
                    ?>

                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>Formation(s)</th>
                            <th>Date</th>
                            <th>Etat</th>
                            <th>Durée</th>
                            <th>Coût</th>
                            <th>Adresse</th>
                            <th><i class="glyphicon glyphicon-cog"></th>
                        </tr>
                        <?php
                        if (sizeof($listeFormation) > 0) {
                            foreach ($listeFormation as $key => $value) {
                                $form = "";
                                
                                if($value['etat'] == "Validé")
                                 {
                                     $etat = '<span class="label label-success">'.$value['etat'].' <i class="glyphicon glyphicon-ok"></i></span>';
                                 }
                                 elseif($value['etat'] == "Refusé")
                                 {
                                    $etat = '<span class="label label-danger">'.$value['etat'].' <i class="glyphicon glyphicon-remove"></i></span>';
                                 }
                                 else
                                 {
                                    $etat = '<span class="label label-warning">'.$value['etat'].' <i class="glyphicon glyphicon-time"></i></span>';
                                    
                                    $form = '<form method="post">
                                            <button type="submit" class="btn btn-success btn-xs" name="Valide" ><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>  
                                            <button type="submit" class="btn btn-danger btn-xs" name="Refuse" ><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button> 
                                            <input name="idForm" type="hidden" value="'.$value['id_f'].'" >
                                                </form>';
                                 }
                                echo '
                                        <tbody>
                                            <tr>
                                                <td>'.$value["libelle"].'</td>
                                                <td>'.$value['date_d'].' - '.$value['date_f'].'</td>
                                                <td>'.$etat.'</td>
                                                <td>'.$value['NbJour'].' Jour(s)</td>
                                                <td>'.$value['credits'].' Credit(s)</td>
                                                <td>'.$value['numero'].' '.$value['rue'].' '.$value['commune'].' '.$value['code_postale'].'</td>
                                                <td>'.$form.'</td>
                                            </tr>
                                        </tbody>';            
                            }
                      }
                      else{
                        echo '
                                        <tbody>
                                            <tr>
                                                <td>Aucune formation</td></tr></tbody>';
                        }
                        ?>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
