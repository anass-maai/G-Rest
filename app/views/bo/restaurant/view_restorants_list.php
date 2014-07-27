<h3> <?= GENERAL_List_RESTAURANTS ?></h3>





<table class="table table-striped table-condensed col-sm-12">
    <thead><tr><td></td></tr></thead>
    <tbody>
    <?php
    echo('  <thead> <tr>
                    <td class="col-sm-2">'.TAB_LIST_RESTO_NAME.'</td>
                    <td class="col-sm-2">'.TAB_LIST_RESTO_SPECIALITY.'</td>
                    <td class="col-sm-2">'.TAB_LIST_RESTO_ADDRESS.'</td>
                    <td class="col-sm-2">'.TAB_LIST_RESTO_PHONE.'</td>
                    <td class="col-sm-2">'.TAB_LIST_RESTO_RESTORATEUR.'</td>
                    </tr>
            </thead>');

    foreach($data["listResto"] as $Resto) {
        if( session::get("lang")=='fr'){
            $description=$Resto->fr_description;
        }else{
            $description=$Resto->en_description;
        }
        $img = TEMPLATES_REP.'default/img/restau/'.$Resto->nom.".jpg";
        echo ("
            <tr>
                <td>$Resto->restau_name</td>
                <td>$Resto->specialite</td>
                <td>$Resto->adresse</td>
                <td>$Resto->telephone</td>
                <td>$Resto->prenom $Resto->nom</td>
                <td class='col-sm-3'>
                    <a href='".DIR."resrtorant/update/$Resto->idrestaurant' class='btn btn-primary' role='button'>". BT_UPDATE ."</a>
                    <a href='#' class='btn btn-default' role='button'>". BT_DELETE ."</a>
                </td>
            </tr>
        ");
    }
    ?>
    </tbody>
    <tfoot>
    <tr>
        <td colspan="6"><?=$data['page_links']?></td>
    </tr>
    </tfoot>
</table>
<?php
/*

        echo("<div class='bs-example'>
                <div class='row'>");
        foreach($data["listResto"] as $Resto) {
            if( session::get("lang")=='fr'){
                $description=$Resto->fr_description;
            }else{
                $description=$Resto->en_description;
            }
            $img = TEMPLATES_REP.'default/img/restau/'.$Resto->nom.".jpg";
            echo ("
            <div class='col-sm-6 col-md-4'>
                <div class='thumbnail'>
                    <h3>$Resto->nom</h3>
                    <div class='caption'>
                        <h3>$Resto->nom</h3>
                        <p>$description</p>
                        <p>$Resto->adresse</p>
                        <p>$Resto->telephone</p>
                </div>
                    <p>
                        <a href='#' class='btn btn-primary' role='button'>". BT_UPDATE ."</a>
                        <a href='#' class='btn btn-default' role='button'>". BT_DELETE ."</a>
                    </p>
                </div>
            </div>
        ");
        }
            echo("</div> </div>");
  */
  ?>
