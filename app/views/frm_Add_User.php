<div style="max-width: 600px; padding: auto; margin: auto;">
    <form role="form" class="form-horizontal" action="<?= DIR ?>user/addUser"
          method="POST">
        <fieldset>

            <!-- Form Name -->
            <legend><?= $data['Title'] ?></legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-sm-4 control-label" for="nom"><?= FORM_INPUT_LASTNAME ?></label>
                <div class="col-sm-8">
                    <input id="nom" name="nom" placeholder="<?= FORM_INPUT_PH_LASTNAME  ?>"
                           class="input-xlarge form-control" required="" type="text">
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-sm-4 control-label" for="prenom"><?=FORM_INPUT_FIRSTNAME  ?></label>
                <div class="col-sm-8">
                    <input id="prenom" name="prenom" placeholder="<?=FORM_INPUT_PH_FIRSTNAME  ?>"
                           class="input-xlarge form-control" required="" type="text">
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-sm-4 control-label" for="datenaissance"><?= FORM_INPUT_BIRTHDAY ?></label>
                <div class="col-sm-8">

                    <input id="datepicker" name="datenaissance" placeholder="<?= FORM_INPUT_PH_BIRTHDAY ?>"
                           class="input-xlarge form-control" required="" type="text">
                </div>
            </div>  
            <!-- Text input-->
            <div class="form-group">
                <label class="col-sm-4 control-label" for="email"><?= FORM_INPUT_EMAIL ?></label>
                <div class="col-sm-8">
                    <input id="email" name="email" placeholder="<?= FORM_INPUT_PH_EMAIL ?>"
                           class="input-xlarge form-control" required="" type="text">
                </div>
            </div>  

            <!-- Text input-->
            <div class="form-group">
                <label class="col-sm-4 control-label" for="password"><?= FORM_INPUT_PASSWORD ?></label>
                <div class="col-sm-8">
                    <input id="password" name="password" placeholder="<?= FORM_INPUT_PH_PASSWORD ?>"
                           class="input-xlarge form-control" required="" type="text">
                </div>
            </div>

            <!-- Text input-->  
            <div class="form-group">
                <label class="col-sm-4 control-label" for="confirm_pass"><?= FORM_INPUT_PASSWORD_CONFIRM ?></label>
                <div class="col-sm-8">
                    <input id="confirm_pass" name="confirm_pass" placeholder="<?= FORM_INPUT_PH_PASSWORD_CONFIRM ?>"
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