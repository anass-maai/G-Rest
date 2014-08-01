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
            <p>
                <div class='col-xs-6 col-md-3' style:''>
                     <a id='btUpdate' href='".DIR."order/step3/$menu->idMenu' role='button' class='thumbnail btn btn-default'>". $nomMenu ."</a>
                </div>
            </p>");

        }
    ?>
    </div>
</div>

