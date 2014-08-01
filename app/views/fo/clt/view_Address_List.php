
<?php
$menu = $data['menu'];
if( session::get("lang")=='fr')
    $menu_name=$menu[0]->nomMenu_fr;
else
    $menu_name=$menu[0]->nomMenu_en;

$default_col_size='col-xs-3';
?>
<?= $data["Error"] ?>
<div id="Addresslist" class="row an-row-header">
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
                <div class=' col-xs-2 '>".$row['address']."</div>
                </div>
            </div>");
        }
    }
?>

</div>