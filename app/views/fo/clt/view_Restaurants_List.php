
<p><h3> <?= GENERAL_List_RESTAURANTS ?></h3></p>

<div class="row an-row-header" >
    <div class="col-xs-3"><?= TAB_LIST_RESTO_NOM ?></div>
    <div class="col-xs-3"><?= TAB_LIST_RESTO_ADDRESS ?></div>
    <div class="col-xs-3"><?= TAB_LIST_RESTO_PHONE ?></div>
</div>
<?php
$i=true;
foreach($data["listResto"] as $restaurant) {
    if( session::get("lang")=='fr'){
        $description=$restaurant->fr_description;
    }else{
        $description=$restaurant->en_description;
    }

    if ($i==true){
        $rowColore = "an-row-color-box-line0";
        $i=false;
    }
    else{
        $rowColore = "an-row-color-box-line1";
        $i=true;
    }

    echo ("<div class='row $rowColore' style='padding: 5px;'>
             <div class='col-xs-3'>$restaurant->restau_name</div>
             <div class='col-xs-3'>$restaurant->adresse</div>
             <div class='col-xs-3'>$restaurant->telephone</div>
             <div class='col-xs-3'>
                    <a id='Bt_showMenu$restaurant->idrestaurant' href='#' class='btn btn-default col-xs-12' role='button'>". BT_SHOW_MENUS ."</a>"
        ."</div>
            <div id='menus_restaurant$restaurant->idrestaurant' class='row '></div>
        </div>");
}
?>

<div class="row">
    <?= $data['page_links'] ?>
</div>

<script>
    $(function() {
        $(document).ready(function(){
            <?php
                 foreach($data["listResto"] as $restaurant) {
       echo ('$("#Bt_showMenu'. $restaurant->idrestaurant .'").click(function(){ $("#menus_restaurant'. $restaurant->idrestaurant .'").load("'.DIR.'order/step2/'. $restaurant->idrestaurant .'#DivlistMenu");  });
                    ');
                 }
            ?>
        });
        $( "#opener" ).click(function() {
            $( "#dialog" ).dialog( "open" );
        });
    });
</script>
