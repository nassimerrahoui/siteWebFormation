<?php

class statsAdmin
{
    public static function stats ($color, $nb, $title, $icon,$type)
    {
        $stats = '<div class="col-lg-3 col-md-4 col-sm-4">
                      <div class="small-box bg-'.$color.'">
                        <div class="inner">
                          <h3>'.$nb.'</h3>
                          <p>'.$title.'</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-'.$icon.'"></i>
                        </div>
                        <a href="#" class="small-box-footer" data-toggle="modal" data-target="#'.$type.'">Voir tous <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                  </div>';
        return $stats;
    }

    public static function modalList ($idtype, $listype)
    {
        $modal = '<div class="example-modal">
                    <div class="modal" id="'.$idtype.'">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title">Liste des administrateurs</h4>
                          </div>
                          <div class="modal-body">
                             <table class="table table-hover">
                             <thead>
                             <tr>
                             <th>Nom</th>
                             <th>Prénom</th>
                             <th>Mail</th>
                             <th>Nb Jour</th>
                             <th>Crédits</th>
                             </tr>
                             </thead>';
                             foreach ($listype as $key => $value)
                             {
                                 $modal .= '<tbody>
                                                <tr>
                                                     <td>'.$value['nom'].'</td>
                                                     <td>'.$value['prenom'].'</td>
                                                     <td>'.$value['mail'].'</td>
                                                     <td>'.$value['NbJour'].'</td>
                                                     <td>'.$value['credits'].'</td>
                                                </tr>
                                           </tbody>';
                             }
                            $modal .= '</table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>';

        return $modal;
    }
}
