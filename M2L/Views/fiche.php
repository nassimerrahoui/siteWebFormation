<?php $title = 'Fiche descriptive formation'?>
<div class="row">
                <div class="col-md-11">
            <?php
                if (isset($fiche)) {
                    foreach ($fiche as $key => $value) 
                {
                    echo '    
    <section class="invoice">
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-university"></i>'.$value['libelleForm'].'
            <small class="pull-right"><strong>Du:</strong> '.$value['dateDeb'].' <strong>au</strong> '.$value['dateFin'].'</small>
          </h2>
        </div>
      </div>
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <address>
            <strong>Lieu formation</strong><br>
            '.$value['numForm'].' '.$value['rueForm'].'<br>
            '.$value['commForm'].' '.$value['cpForm'].'<br>
            <strong>Animateur:</strong><br>
            '.$value['raison_s'].'
          </address>
        </div>
        <div class="col-sm-4 invoice-col">
          <address>
           <b>Coût:</b> '.$value['Credits'].' <i class="fa fa-btc"></i><br>
           <b>Durée:</b> '.$value['NbJour'].' jour(s)<br>
          </address>
        </div>
        <div class="col-sm-4  invoice-col">
           <address>
            <strong>Adresse '.$value['raison_s'].'</strong><br>
            '.$value['numPrest'].' '.$value['ruePrest'].'<br>
            '.$value['commPrest'].' '.$value['cpPrest'].'<br>
          </address>
        </div>
      </div>
     <hr>
     <div class="col-sm-11 invoice-col">
           <p><strong>Description:</strong><br>
           '.$value['contenuForm'].'</p>
      </div>

      <div class="row no-print">
        <div class="col-xs-12">
          <button type="button" class="btn btn-primary pull-right"  >
            <i class="fa fa-file-pdf-o"></i> Export PDF
          </button>
        </div>
      </div>

    </section>
    <div class="clearfix"></div>';
                }
                                    }
                ?>
        </div>
        </div>



