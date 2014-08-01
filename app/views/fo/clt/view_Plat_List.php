<?php
    $menu = $data['menu'];
    if( session::get("lang")=='fr')
        $menu_name=$menu[0]->nomMenu_fr;
    else
        $menu_name=$menu[0]->nomMenu_en;

    $default_col_size='col-xs-3';
?>
<?= $data["Error"] ?>
<p><?= MENU_NAME ?> : <strong><?= $menu_name ?></strong> </p>
<div>
    <form id="myForm" role="form" class="form-horizontal" action="<?= DIR ?>order/step4" method="POST">
        <fieldset>
            <div id="listPlatesHeader" class="row an-row-header">
                <div class='<?= $default_col_size ?>'><?= FORM_INPUT_PLAT_NAME_FR  ?></div>
                <div class='<?= $default_col_size ?>'><?= FORM_INPUT_PLAT_NAME_EN  ?></div>
                <div class='<?= $default_col_size ?>'><?= FORM_INPUT_PLAT_PRICE ?></div>
            </div>
            <div id="row listPlatesRows" >
                <input type='hidden' id='nbrPlat' name='nbrPlat' value='<?= count($data['plats']) ?>'>
                <?php
                $index=0;
                    if ($data['plats']!=null){
                        if( session::get("lang")=='fr'){
                            $i=true;
                            foreach($data['plats']  as $plat){
                                if ($i==true){
                                    $rowStyle='an-row-color-box-line0';
                                    $i=false;
                                }else{
                                    $rowStyle='an-row-color-box-line1';
                                    $i=true;
                                }

                                echo( " <div class='row $rowStyle'>
                                            <input type='hidden' id='idRow$index' name='idRow$index' value='$index'>
                                            <input type='hidden' id='plat$index' name='plat$index' value='$plat->idPlat'>
                                            <div class=' $default_col_size '>$plat->nomPlat_fr</div>
                                            <div class=' $default_col_size '>$plat->description_fr</div>
                                            <div class=' col-xs-2 '>$plat->prixPlat</div>
                                            <div class='input-group col-xs-2'><span class='input-group-addon'>Qt:</span>
                                              <input id='qt$index' name='qt$index' type='text' class='form-control col-xs-2' placeholder='Username' onblur='allnumeric(document.myForm.qt$index,qt$index)'>
                                            </div>
                                        </div>");
                                $index++;
                            }

                        }else{
                            foreach($data['plats']  as $plat){
                                if ($i==true){
                                    $rowStyle='an-row-color-box-line0';
                                    $i=false;
                                }else{
                                    $rowStyle='an-row-color-box-line1';
                                    $i=true;
                                }



                                echo( " <div class='row $rowStyle'>
                                            <input type='hidden' id='idRow$index' name='idRow$index' value='$index'>
                                            <input type='hidden' id='plat$index' name='plat$index' value='$plat->idPlat'>
                                            <div class=' $default_col_size '>$plat->nomPlat_en</div>
                                            <div class=' $default_col_size '>$plat->description_en</div>
                                            <div class=' col-xs-2 '>$plat->prixPlat</div>
                                            <div class='input-group col-xs-2'><span class='input-group-addon'>Qt:</span>
                                             <input id='qt$index' name='qt$index' type='text' class='form-control col-xs-2' placeholder='Username' onblur='allnumeric(document.myForm.qt$index,qt$index)'>
                                            </div>
                                        </div>");

                                $index++;
                            }
                            }

                    }else{
                        echo ("<div class='alert alert-warning' role='alert' style='text-aline-center' style='text-align: center ' >".NO_MENU_FOUND."</div>");
                    }
                ?>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <button id="submit" name="submit" class="btn thumbnail col-sm-12"><?= BT_VOID ?></button>
                </div>
                <div class="col-xs-8"></div>
                <div class=" col-sm-2">
                            <button id="submit" name="submit" class="btn thumbnail col-sm-12"><?= BT_ORDER ?></button>
                </div>
            </div>
        </fieldset>
    </form>
</div>