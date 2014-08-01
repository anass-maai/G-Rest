<div style="max-width: 600px; padding: auto; margin: auto;">
    <form role="form" class="form-horizontal" action="<?= DIR ?>order/save"
          method="POST">
        <fieldset>
            <!-- Form Name -->
            <legend><?= NEW_DELEIVER_INFORMATION ?></legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-sm-4 control-label" for="dateLivraison"><?= FORM_DELIVERY_TIME ?></label>
                <div class="col-sm-8">
                    <input id="dateLivraison" name="dateLivraison" type="date" max="2014-08-08" min="2014-07-31">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-sm-4 control-label" for="heurLivraison"><?= FORM_DELIVERY_TIME ?></label>
                <div class="col-sm-8">
                    <input id="heurLivraison" name="heurLivraison" type="time">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-sm-4 control-label" for="address"><?= FORM_DELIVERY_ADDRESS ?></label>
                <div class="col-sm-8">
                    <textarea class="form-control" rows="3" id="address" name="address" placeholder="<?= FORM_INPUT_PH_PALT_DESCRIPTION_EN ?>"
                               required="" type="text">
                    <?php  $user=SESSION::get('user');
                           echo($user[0]->adresse);
                        ?>
                    </textarea>
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
