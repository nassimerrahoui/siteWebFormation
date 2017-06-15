<?php

class tabsFormations
{
    public static function Historic ($formtype,$idtab, $idtype)
    {
       $tab = '<div class="tab-pane" id="tab_'.$idtab.'">
                    <div class="table-responsive no-padding">
                        <table id="'.$idtype.'" class="table table-hover">
                            <thead>
                            <tr>
                                <th>Formations</th>
                                <th>Date</th>
                                <th>Durée</th>
                                <th>Coût</th>
                                <th>Plus d\'info</th>
                                <th>Etat</th>
                            </tr>
                            </thead><i></i>';
                            if (isset($formtype))
                            {
                                foreach ($formtype as $key => $value)
                                {
                                    if ($value['etat'] == "Validé")
                                    {
                                        $etat = '<span class="label label-success">' . $value['etat'] . ' <i class="glyphicon glyphicon-ok"></i></span>';
                                    }
                                    elseif ($value['etat'] == "Refusé")
                                    {
                                        $etat = '<span class="label label-danger">' . $value['etat'] . ' <i class="glyphicon glyphicon-remove"></i></span>';
                                    }
                                    $tab .= '<tr>
                                    <td>' . $value["libelle"] . '</td>
                                    <td>' . $value['date_d'] . ' - ' . $value['date_f'] . '</td>
                                    <td>' . $value['NbJour'] . ' Jour(s)</td>
                                    <td>' . $value['credits'] . ' credit(s)</td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#' . $value['id_f'] . '"><i class="fa fa-plus"></i></button>
                                        <div class="modal fade" id=' . $value['id_f'] . ' role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">' . $value['libelle'] . '</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4 class="modalContent">Le : ' . $value['date_d'] . ' - ' . $value['date_f'] . '</h4>
                                                        <h4 class="modalContent">Durée : ' . $value['NbJour'] . ' Jour(s)</h4>
                                                        <h4 class="modalContent">Coût : ' . $value['credits'] . ' Crédit(s)</h4>
                                                        <h4 class="modalContent">Adresse : ' . $value['numero'] . ' ' . $value['rue'] . ' ' . $value['commune'] . ' ' . $value['code_postale'] . '</h4>
                                                        <h4 class="modalContent">Description:' . $value['contenu'] . '</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>' . $etat . '</td>
                                                </tr>';
                                }
                            }
                        $tab .='</table>
                    </div>
               </div>';
        return $tab;
    }

    public static function Offer ($formtype, $idtab, $idtype)
    {
        $tab = '<div class="tab-pane active" id="tab_'.$idtab.'">
                    <div class="table-responsive no-padding">
                        <table id="'.$idtype.'" class="table table-hover">
                            <thead>
                              <tr>
                                <th id="Formations">Formations</th>
                                <th>Date</th>
                                <th>Durée</th>
                                <th>Coût</th>
                                <th>Plus d\'info</th>
                                <th>Suivre</th>
                                <th>Fiche</th>
                              </tr>
                            </thead>';
                        if (isset($formtype))
                        {
                            foreach ($formtype as $key => $value)
                            {

                                $form = '<form method="post">
                                <input name="idForm" type="hidden" value="' . $value['id_f'] . '" >
                                <td>
                                    <button type="submit" class="btn btn-xs" name="Suivre" >
                                        <span><i class="fa fa-mail-forward"></i></span>
                                    </button>
                                </td>
                                </form>
                                <form method="post" action="' . BASE_URL . '/fiche">
                                <input name="idForm" type="hidden" value="' . $value['id_f'] . '" >
                                <td>
                                    <button type="submit" class="btn btn-xs" name="Export" >
                                        <span><i class="fa fa-file-o"></i></span>
                                    </button>
                                </td>
                            </form>';
                            $tab.='
                        
                            <tr>
                               <td>' . $value["libelle"] . '</td>
                               <td>' . $value['date_d'] . ' - ' . $value['date_f'] . '</td>
                               <td>' . $value['NbJour'] . ' Jour(s)</td>
                               <td>' . $value['credits'] . ' credit(s)</td>
                               <td>
                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#' . $value['id_f'] . '"><i class="fa fa-plus"></i></button>
                                <div class="modal fade" id=' . $value['id_f'] . ' role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">' . $value['libelle'] . '</h4>
                                            </div>
                                            <div class="modal-body">
                                                <h4 class="modalContent">Le : ' . $value['date_d'] . ' - ' . $value['date_f'] . '</h4>
                                                <h4 class="modalContent">Durée : ' . $value['NbJour'] . ' Jour(s)</h4>
                                                <h4 class="modalContent">Coût : ' . $value['credits'] . ' Crédit(s)</h4>
                                                <h4 class="modalContent">Adresse : ' . $value['numero'] . ' ' . $value['rue'] . ' ' . $value['commune'] . ' ' . $value['code_postale'] . '</h4>
                                                <h4 class="modalContent">Description:' . $value['contenu'] . '</h4>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                               </td>
                               ' . $form . '
                            </tr>';
                            }
                        }
                        $tab .= '</table>
                    </div>
              </div>';
        return $tab;
    }

    public static function Waiting ($formtype, $idtab, $idtype)
    {
        $tab = '<div class="tab-pane" id="tab_'.$idtab.'">
                    <div class="table-responsive no-padding">
                        <table id="'.$idtype.'" class="table table-hover">
                            <thead>
                              <tr>
                                <th>Formations</th>
                                <th>Date</th>
                                <th>Durée</th>
                                <th>Coût</th>
                                <th>Plus d\'info</th>
                                <th>Etat</th>
                              </tr>
                            </thead><i></i>';
                        if (isset($formtype))
                        {
                            foreach ($formtype as $key => $value)
                            {
                                $tab .= '<tr>
                                           <td>'.$value["libelle"].'</td>
                                           <td>'.$value['date_d'].' - '.$value['date_f'].'</td>
                                           <td>'.$value['NbJour'].' Jour(s)</td>
                                           <td>'.$value['credits'].' Crédit(s)</td>
                                           <td>
                                            <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#'.$value['id_f'].'"><i class="fa fa-plus"></i></button>
                                            <div class="modal fade" id='.$value['id_f'].' role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">'.$value['libelle'].'</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4 class="modalContent">Le : '.$value['date_d'].' - '.$value['date_f'].'</h4>
                                                            <h4 class="modalContent">Durée : '.$value['NbJour'].' Jour(s)</h4>
                                                            <h4 class="modalContent">Coût : '.$value['credits'].' Crédit(s)</h4>
                                                            <h4 class="modalContent">Adresse : '.$value['numero'].' '.$value['rue'].' '.$value['commune'].' '.$value['code_postale'].'</h4>
                                                            <h4 class="modalContent">Description:'.$value['contenu'].'</h4>  
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                           </td>
                                           <td><span class="label label-warning label-xs">'.$value['etat'].' <i class="glyphicon glyphicon-time"></i></span></td>
                                        </tr>';
                            }
                        }
                        $tab .= '</table>
                    </div> 
                </div>';
        return $tab;
    }

}