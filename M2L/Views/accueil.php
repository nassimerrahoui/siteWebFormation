<?php $title = 'Accueil'?>
        <div class="row">
            <div class="col-md-12">

            <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <li><a href="#tab_1-1" data-toggle="tab">Historiques</a></li>
              <li><a href="#tab_2-2" data-toggle="tab">Formations en attentes</a></li>
              <li class="active"><a href="#tab_3-2" data-toggle="tab">Formations proposées</a></li>

              <li class="pull-left header"><i class="fa fa-university"></i>Formations</li>
            </ul>
            <div class="tab-content">
                <?= tabsFormations::Historic($FormHisto,"1-1","histo")?>
                <?= tabsFormations::Waiting($FormAtt,"2-2","attente")?>
                <?= tabsFormations::Offer($Form,"3-2","propose")?>
            </div>
            <!-- /.tab-content -->
          </div>

          </div>
          </div>



         
       
     <div class="clearfix"></div>
