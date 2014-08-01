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
            <div id="listPlatesHeader" class="row an-row-header">
                <div class='<?= $default_col_size ?>'><?= FORM_INPUT_PLAT_NAME  ?></div>
                <div class='<?= $default_col_size ?>'><?= FORM_INPUT_PLAT_DESCRIPTION  ?></div>
                <div class='<?= $default_col_size ?>'><?= FORM_INPUT_PLAT_PRICE ?></div>
            </div>
            <div id="row listPlatesRows" >
                <input type='hidden' id='nbrPlat' name='nbrPlat' value='<?= count($data['plats']) ?>'>
                <?php
                $index=0;
                if ($data['selected_Plates']!=null){

                     if( session::get("lang")=='fr'){
                        $i=true;
                        foreach($data['selected_Plates']  as $row){
                            if($row['qt'] !== null && $row['qt'] > 0 ){
                                if ($i==true){
                                    $rowStyle='an-row-color-box-line0';
                                    $i=false;
                                }else{
                                    $rowStyle='an-row-color-box-line1';
                                    $i=true;
                                }
                                echo( " <div class='row $rowStyle'>
                                                <input type='hidden' id='idRow$index' name='idRow$index' value='$index'>
                                                <input type='hidden' id='plat$index' name='plat$index' value='".$row['plat'][0]->idPlat."'>
                                                <div class=' $default_col_size '>".$row['plat'][0]->nomPlat_fr."</div>
                                                <div class=' $default_col_size '>".$row['plat'][0]->description_fr ."</div>
                                                <div class=' col-xs-2 '>".$row['plat'][0]->prixPlat."</div>
                                                <div class='input-group col-xs-2'><span class='input-group-addon'>Qt:</span>");
                                if( $row['qt'] !== null && !is_numeric( $row['qt'] ) ) {
                                    echo("<div id='qt$index' name='qt$index' type='text' class='form-control col-xs-2'>0</div>");
                                }else{
                                    echo("<div id='qt$index' name='qt$index' type='text' class='form-control col-xs-2'>". $row['qt'] . "</div>");
                                }

                                echo("
                                                </div>
                                            </div>");
                                $index++;
                            }
                        }

                    }else{
                        foreach($data['selected_Plates']  as $row){
                            if($row['qt'] !== null && $row['qt'] > 0 ){
                                if ($i==true){
                                    $rowStyle='an-row-color-box-line0';
                                    $i=false;
                                }else{
                                    $rowStyle='an-row-color-box-line1';
                                    $i=true;
                                }
                                echo( "<div class='row $rowStyle'>
                                                <input type='hidden' id='idRow$index' name='idRow$index' value='$index'>
                                                <input type='hidden' id='plat$index' name='plat$index' value='".$row['plat'][0]->idPlat."'>
                                                <div class=' $default_col_size '>".$row['plat'][0]->nomPlat_en."</div>
                                                <div class=' $default_col_size '>".$row['plat'][0]->description_en ."</div>
                                                <div class=' col-xs-2 '>".$row['plat'][0]->prixPlat."</div>
                                                <div class='input-group col-xs-2'><span class='input-group-addon'>Qt:</span>");
                                if( $row['qt'] !== null && !is_numeric( $row['qt'] ) ) {
                                    echo("<div id='qt$index' name='qt$index' type='text' class='form-control col-xs-2'>0</div>");
                                }else{
                                    echo("<div id='qt$index' name='qt$index' type='text' class='form-control col-xs-2'>". $row['qt'] . "</div>");
                                }

                                echo("               </div>
                                            </div>");

                                $index++;
                            }
                        }
                    }

                }else{
                    echo ("<div class='alert alert-warning' role='alert' style='text-aline-center' style='text-align: center ' >" . NO_MENU_FOUND . "</div>");
                }
                ?>
            </div>
            <div class="row thumbnail">
                <div  class="col-xs-9"></div><div  class="col-xs-3"><?= TOTAL_ORDER ?> :<span id="Total"><?= $data['Total'] ?></span> </div>
                <div  class="col-xs-9"></div><div  class="col-xs-3"><?= TAX_ORDER ?> :<span id="tax"><?= $data['Total']*$data['tax'] ?></span> </div>
            </div>
            <div class="row">
                <div class="col-xs-8"></div>
                <div class=" col-sm-4"><a href="<?= DIR ?>order/step6" class="btn thumbnail "><?= NEXT ?></a></button>
                </div>
            </div>
</div>
