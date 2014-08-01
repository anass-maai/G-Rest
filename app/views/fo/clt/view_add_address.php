<?php

?>

<div style="max-width: 600px; padding: auto; margin: auto;">
    <form role="form" class="form-horizontal" action="<?= DIR ?>user/addUser"
          method="POST">
        <fieldset>

            <!-- Form Name -->
            <legend><?= NEW_DILEVER_ADDRESS ?></legend>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-sm-4 control-label" for="adresse"><?= FORM_INPUT_ADDRESS ?></label>
                <div class="col-sm-8">
                    <input id="adresse" name="adresse" placeholder="<?= FORM_INPUT_PH_ADDRESS ?>"
                           class="input-xlarge form-control" required="" type="text">
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
    $menu = $data['menu'];
    if( session::get("lang")=='fr')
        $menu_name=$menu[0]->nomMenu_fr;
    else
        $menu_name=$menu[0]->nomMenu_en;

    $default_col_size='col-xs-3';
    ?>
    <?= $data["Error"] ?>
    <div id="Addresslist" class="row">
        <strong><?= DILEVERY_ADDRESS_LIST ?></strong> </p>
        <div id="AddresslistHeader" class="row an-row-header">
            <div class='<?= $default_col_size ?>'><?= TAB_ADDRESS  ?></div>
        </div>
        <?php
        $index=0;
        if ($data['addressList']!=null){
            $i=true;
            foreach($data['selected_Plates']  as $row){
                if ($i==true){
                    $rowStyle='an-row-color-box-line0';
                    $i=false;
                }else{
                    $rowStyle='an-row-color-box-line1';
                    $i=true;
                }

                echo( " <div class='row $rowStyle'>
                <div class=' col-xs-2 '>".$row->libaddress."</div>
                </div>
            </div>");
            }
        }
        ?>

    </div>
