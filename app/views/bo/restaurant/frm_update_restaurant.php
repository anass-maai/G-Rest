<?php
$restau=$data['restauToUpdate'];
echo $data["Error"];

?>
<div style="max-width: 600px; padding: auto; margin: auto;">
    <form role="form" class="form-horizontal" action="<?= DIR ?>restaurants/update"
          method="POST">
        <fieldset>
            <!-- Form Name -->
            <legend><?= FORM_ADD_RESTO ?></legend>

            <input type="hidden"  id="idrestaurant" name="idrestaurant" value="<?= $restau->idrestaurant ?>" >
            <!-- Text input-->
            <div class="form-group">
                <label class="col-sm-4 control-label" for="nom"><?= FORM_INPUT_RESTO_NAME ?></label>
                <div class="col-sm-8">
                    <input id="nom" name="nom" placeholder="<?= FORM_INPUT_PH_RESTO_NAME ?>"
                               class="input-xlarge form-control" required="" type="text" value="<?= $restau->restau_name ?>">
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-sm-4 control-label" for="description_fr"><?= FORM_INPUT_RESTO_DISCRIPTION_FR ?></label>
                <div class="col-sm-8">
                    <textarea class="form-control" rows="3" id="description_fr" name="description_fr" placeholder="<?= FORM_INPUT_PH_RESTO_DISCRIPTION_FR ?>"
                              required="" type="text" ><?= $restau->fr_description ?></textarea>
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-sm-4 control-label" for="description_en"><?= FORM_INPUT_RESTO_DISCRIPTION_EN ?></label>
                <div class="col-sm-8">
                    <textarea class="form-control" rows="3" id="description_en" name="description_en" placeholder="<?= FORM_INPUT_PH_RESTO_DISCRIPTION_EN ?>"
                              required="" type="text"><?= $restau->en_description ?></textarea>
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-sm-4 control-label" for="specialite"><?= FORM_INPUT_RESTO_SPECIALITE ?></label>
                <div class="col-sm-8">
                    <input id="specialite" name="specialite" placeholder="<?= FORM_INPUT_PH_RESTO_SPECIALITE ?>"
                           class="input-xlarge form-control" required="" type="text"  value="<?= $restau->specialite ?>">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-sm-4 control-label" for="adresse"><?= FORM_INPUT_ADDRESS ?></label>
                <div class="col-sm-8">
                    <input id="adresse" name="adresse" placeholder="<?= FORM_INPUT_PH_ADDRESS ?>"
                           class="input-xlarge form-control" required="" type="text"  value="<?= $restau->adresse ?>">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-sm-4 control-label" for="telephone"><?= FORM_INPUT_PHONE ?></label>
                <div class="col-sm-8">
                    <input id="telephone" name="telephone" placeholder="<?= FORM_INPUT_PH_PHONE ?>"
                           class="input-xlarge form-control" required="" type="text"  value="<?= $restau->telephone ?>">
                </div>
            </div>

            <!-- SELECT input-->
            <div class="form-group">
                <label class="col-sm-4 control-label" for="restorateur"><?= FORM_INPUT_RESTORATEUR ?></label>
                <div class="col-sm-8">
                    <select id="restaurateur" name="restaurateur" class="form-control">
                        <option value="<?= $restau->idrestaurateur ?>"'><?= $restau->prenom ?> <?= $restau->nom ?></option>
                        <?php $restaurateurList = $data['RestaurateurList'];
                            foreach($data['RestaurateurList'] as $Resto) {
                                echo "<option value='$Resto->id'>$Resto->prenom $Resto->nom</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <!-- Button -->
            <div class="form-group">
                <div class="btn-group btn-group-justified>
                    <div class="btn-group col-sm-3" >
                        <button id="submit" name="submit" class="btn btn-primary"><?= BT_VOID ?></button>
                    </div>
                    <div class="col-sm-3">
                        <button id="submit" name="submit" class="btn btn-primary"><?= BT_SUBMIT ?></button>
                    </div>
                </div>
            </div>

        </fieldset>
    </form>
</div>