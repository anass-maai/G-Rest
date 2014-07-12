
<?php

?>

<div style="max-width: 600px; padding: auto; margin: auto;">
    <form role="form" class="form-horizontal" action="<?= DIR ?>user/addUser"
          method="POST">
        <fieldset>

            <!-- Form Name -->
            <legend><?= FORM_NAME ?></legend>

            <!-- Text input-->
            <div class="form-group">
            <label class="col-sm-4 control-label" for="nom"><?= FORM_INPUT_RESTO_NAME ?></label>
                <div class="col-sm-8">
                    <input id="nom" name="nom" placeholder="<?= FORM_INPUT_PH_RESTO_NAME ?>"
                           class="input-xlarge form-control" required="" type="text">
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-sm-4 control-label" for="description"><?= FORM_INPUT_RESTO_DISCRIPTION ?></label>
                <div class="col-sm-8">
                    <input id="description" name="description" placeholder="<?= FORM_INPUT_PH_RESTO_DISCRIPTION ?>"
                           class="input-xlarge form-control" required="" type="text">
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-sm-4 control-label" for="specialite"><?= FORM_INPUT_RESTO_SPECIALITE ?></label>
                <div class="col-sm-8">
                    <input id="specialite" name="specialite" placeholder="<?= FORM_INPUT_PH_RESTO_SPECIALITE ?>"
                           class="input-xlarge form-control" required="" type="text">
                </div>
            </div>  

            <!-- Text input-->
            <div class="form-group">
                <label class="col-sm-4 control-label" for="adresse"><?= FORM_INPUT_ADDRESS ?></label>
                <div class="col-sm-8">
                    <input id="adresse" name="adresse" placeholder="<?= FORM_INPUT_PH_ADDRESS ?>"
                           class="input-xlarge form-control" required="" type="text">
                </div>
            </div>                                                 

            <!-- Text input-->
            <div class="form-group">
                <label class="col-sm-4 control-label" for="telephone"><?= FORM_INPUT_PHONE ?></label>
                <div class="col-sm-8">
                    <input id="telephone" name="telephone" placeholder="<?= FORM_INPUT_PH_PHONE ?>"
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