<?php
    $restaurant = $data['restaurant'];
?>

<?= $data["Error"] ?>
<div style="max-width: 600px; padding: auto; margin: auto;">
    <form role="form" class="form-horizontal" action="<?= DIR ?>restaurateur/addMenu" method="POST">
        <fieldset>
            <!-- Form Name -->
            <legend><?= ADD_NEW_MENU_FOR_RESTORANT ?> : <?= $restaurant[0]->restau_name ?></legend>
            <input type="hidden" id="idRestaurant" name="idRestaurant" value="<?= $restaurant[0]->idrestaurant ?>">
            <!-- Text input-->
            <div class="form-group">
                <label class="col-sm-4 control-label" for="nomMenu_fr"><?= FORM_INPUT_MENU_NAME_FR ?></label>
                <div class="col-sm-8">
                    <textarea class="form-control" rows="3" id="nomMenu_fr" name="nomMenu_fr" placeholder="<?= FORM_INPUT_PH_MENU_NAME_FR ?>"
                              required="" type="text"></textarea>
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-sm-4 control-label" for="nomMenu_en"><?= FORM_INPUT_MENU_NAME_EN ?></label>
                <div class="col-sm-8">
                    <textarea class="form-control" rows="3" id="nomMenu_en" name="nomMenu_en" placeholder="<?= FORM_INPUT_PH_MENU_NAME_EN ?>"
                              required="" type="text"></textarea>
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
