<?php
$menu = $data['menu'];
$platToUpdate = $data['plat'];

if( session::get("lang")=='fr')
    $menu_name=$menu[0]->nomMenu_fr;
else
    $menu_name=$menu[0]->nomMenu_en;
?>

<?= $data["Error"] ?>
<div style="max-width: 600px; padding: auto; margin: auto;">
    <form role="form" class="form-horizontal" action="<?= DIR ?>restaurateur/plates/update" method="POST">
        <fieldset>
            <!-- Form Name -->
            <legend><?= ADD_NEW_PLAT_TO_MENU ?> : <?= $menu_name ?></legend>
            <input type="hidden" id="idPlat" name="idPlat" value="<?= $platToUpdate[0]->idPlat ?>">
            <!-- Text input-->
            <div class="form-group">
                <label class="col-sm-4 control-label" for="nomPlat_fr"><?= FORM_INPUT_MENU_NAME_FR ?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="nomPlat_fr" name="nomPlat_fr" placeholder="<?= FORM_INPUT_PH_MENU_NAME_FR ?>"
                           required="" type="text" value="<?= $platToUpdate[0]->nomPlat_fr ?>">
                </div>
            </div>
            <!-- Text input-->

            <div class="form-group">
                <label class="col-sm-4 control-label" for="nomPlat_en"><?= FORM_INPUT_MENU_NAME_EN ?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="nomPlat_en" name="nomPlat_en" placeholder="<?= FORM_INPUT_PH_MENU_NAME_EN ?>"
                           required="" type="text" value="<?= $platToUpdate[0]->nomPlat_en ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label" for="description_fr"><?= FORM_INPUT_PLAT_DESCRIPTION_FR ?></label>
                <div class="col-sm-8">
                    <textarea class="form-control" rows="3" id="description_fr" name="description_fr" placeholder="<?= FORM_INPUT_PH_PALT_DESCRIPTION_FR ?>"
                              required="" type="text"><?= $platToUpdate[0]->description_fr ?></textarea>
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-sm-4 control-label" for="description_en"><?= FORM_INPUT_PLAT_DESCRIPTION_EN ?></label>
                <div class="col-sm-8">
                    <textarea class="form-control" rows="3" id="description_en" name="description_en" placeholder="<?= FORM_INPUT_PH_PALT_DESCRIPTION_EN ?>"
                              required="" type="text"><?= $platToUpdate[0]->description_en ?></textarea>
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-sm-4 control-label" for="txtPrix"><?= FORM_INPUT_PLAT_PRICE ?></label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <input id="txtPrix" name="txtPrix" type="text" class="form-control" value="<?= $platToUpdate[0]->prixPlat ?>">
                        <span class="input-group-addon">CAD</span>
                    </div>
                </div>
            </div>
            <!-- Button -->
            <div class="form-group">
                <div class="col-sm-2">
                    <button id="submit" name="submit" class="btn btn-primary"><?= BT_VOID ?></button>
                </div>
                <div class=" col-sm-8">
                    <button id="submit" name="submit" class="btn btn-primary"><?= BT_SUBMIT ?></button>
                </div>
            </div>
        </fieldset>
    </form>
</div>
<?php
$default_col_size='col-xs-3';
?>
<div id="listPlatesHeader" class="row an-row-header">
    <div class='<?= $default_col_size ?>'><?= FORM_INPUT_PLAT_NAME_FR  ?></div>
    <div class='<?= $default_col_size ?>'><?= FORM_INPUT_PLAT_NAME_EN  ?></div>
    <div class='<?= $default_col_size ?>'><?= FORM_INPUT_PLAT_PRICE ?></div>
</div>
<div id="listPlatesRows">
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