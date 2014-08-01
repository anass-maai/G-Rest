<?php
    $menu = $data['menu'];
    if( session::get("lang")=='fr')
        $menu_name=$menu[0]->nomMenu_fr;
    else
        $menu_name=$menu[0]->nomMenu_en;

    $default_col_size='col-xs-3';
?>
<?= $data["Error"] ?>
<p><?= MENU_NAME ?> : <?= $menu_name ?></p>

<div id="listPlatesHeader" class="row an-row-header">
    <div class='<?= $default_col_size ?>'><?= FORM_INPUT_PLAT_NAME_FR  ?></div>
    <div class='<?= $default_col_size ?>'><?= FORM_INPUT_PLAT_NAME_EN  ?></div>
    <div class='<?= $default_col_size ?>'><?= FORM_INPUT_PLAT_PRICE ?></div>
</div>
<div id="row listPlatesRows">
    <?php
        if( session::get("lang")=='fr'){
            $i=true;
            foreach($data['plats']  as $plat){
                if ($i==true){
                    $rowStyle='an-row-color-box-line0';
                    $i=false;
                }else{
                    $rowStyle='an-row-color-box-line0';
                    $i=true;
                }

                echo( " <div class='row $rowStyle'>
                            <div class=' $default_col_size '>$plat->nomPlat_fr</div>
                            <div class=' $default_col_size '>$plat->nomPlat_en</div>
                            <div class=' col-xs-2 '>$plat->prixPlat</div>
                            <div class=' col-xs-4 '>
                                <div class='btn-group btn-group-justified'>");
                echo( "    <a href='".DIR."restaurateur/plates/update/$plat->idPlat' class='btn btn-default'>". BT_UPDATE ."</a>
                                    <a href='".DIR."restaurateur/plates/delete/$plat->idPlat' class='btn btn-default'>". BT_DELETE ."</a>
                                </div>
                            </div>
                         </div>");
            }
        }else{
            foreach($data['plats']  as $plat){
                echo( " <div class='row $rowStyle'>
                            <div class=' $default_col_size '>$plat->nomPlat_fr</div>
                            <div class=' $default_col_size '>$plat->nomPlat_en</div>
                            <div class=' col-xs-2 '>$plat->prixPlat</div>
                            <div class=' col-xs-4 '>
                                <div class='btn-group btn-group-justified'>");
                echo( "    <a href='".DIR."restaurateur/plates/update/$plat->idPlat' class='btn btn-default'>". BT_UPDATE ."</a>
                                    <a href='".DIR."restaurateur/plates/delete/$plat->idPlat' class='btn btn-default'>". BT_DELETE ."</a>
                                </div>
                            </div>
                         </div>");
            }
        }
    ?>
</div>