<?php   ?>

<div id="DivlistMenu">
    <div class='col-xs-12' style="overflow:auto;">
    <?php
    $lang=SESSION::get('lang');
    $i=0;
    foreach($data["listMenu"] as $menu) {

        if ($lang=='fr'){
            $nomMenu=$menu->nomMenu_fr;
        }else{
            $nomMenu=$menu->nomMenu_en;
        }

        echo ("
                  <div class='col-xs-4'>
                        <div class='thumbnail'>
                            <div class='caption'>
                                <h4>$nomMenu</h4>
                                <p>". ITEMS_NUMBER ." : <span class='badge pull-right'>".$menu->nbrItems."</span></p>
                                <p><a id='btUpdate' href='".DIR."restaurateur/plates/list/$menu->idMenu' class='btn btn-primary' role='button'>". BT_SHOW_ITEMS ."</a></p>
                            </div>
                        </div>
                    </div>
                ");
                //
        }
    ?>
    </div>
</div>
