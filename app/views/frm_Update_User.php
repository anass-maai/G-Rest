<?php

/* 
 * form to update a selected user, will be used in desrigard of the rang
 */

//if logged ingo to admin front page
    $user=$data['userToUpdate'];
?>

<div style="max-width: 600px; padding: auto; margin: auto;">

    <form  role="form" class="form-horizontal" action="<?= DIR ?>user/update"  method="POST">
        <fieldset>

            <!-- Form Name -->

            <legend><?= $data['Title'] ?></legend>

            <input type="hidden"  id="idrestaurant" name="idrestaurant" value="<?= $user[0]->id ?>" >

            <!-- Text input-->
            <div class="form-group">
                <label class="col-sm-4 control-label" for="nom"><?=FORM_INPUT_LASTNAME  ?></label>
                <div class="col-sm-8">
                    <input id="nom" name="nom" placeholder="<?= $user[0]->prenom ?>"
                           class="input-xlarge form-control" required="" type="text" value="<?=  $user[0]->prenom  ?>">
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-sm-4 control-label" for="prenom"><?= FORM_INPUT_FIRSTNAME ?></label>
                <div class="col-sm-8">
                    <input id="prenom" name="prenom" placeholder="<?= $user[0]->nom ?>"
                           class="input-xlarge form-control" required="" type="text" value="<?= $user[0]->nom ?>">
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-sm-4 control-label" for="datenaissance"><?= FORM_INPUT_BIRTHDAY ?></label>
                <div class="col-sm-8">
                   <input id="datepicker" name="datenaissance" placeholder="<?= $user[0]->datenaissance ?>"
                           class="input-xlarge form-control" required="" type="text" value="<?= $user[0]->datenaissance ?>">
                </div>
            </div>  
            <!-- Text input-->
            <div class="form-group">
                <label class="col-sm-4 control-label" for="email"><?= FORM_INPUT_EMAIL ?></label>
                <div class="col-sm-8">
                    <input id="email" name="email" placeholder="xxx@xxx.xxx<?= $user[0]->email ?>"
                           class="input-xlarge form-control" required="" type="text" value="<?= $user[0]->email ?>">
                </div>
            </div>  

            <!-- Text input-->
            <div class="form-group">
                <label class="col-sm-4 control-label" for="password" ><?= FORM_INPUT_PASSWORD ?></label>
                <div class="col-sm-8">
                    <input id="password" name="password" placeholder="*******"
                           class="input-xlarge form-control" required="" type="text">
                </div>
            </div>

            <!-- Text input-->  
            <div class="form-group">
                <label class="col-sm-4 control-label" for="confirm_pass" ><?= FORM_INPUT_PASSWORD_CONFIRM ?></label>
                <div class="col-sm-8">
                    <input id="confirm_pass" name="confirm_pass" placeholder="*******"
                           class="input-xlarge form-control" required="" type="text">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-sm-4 control-label" for="adresse"><?= FORM_INPUT_ADDRESS ?></label>
                <div class="col-sm-8">
                    <input id="adresse" name="adresse" placeholder="<?= $user[0]->adresse ?>"
                           class="input-xlarge form-control" required="" type="text" value="<?= $user[0]->adresse ?>">
                </div>
            </div>                                                 

            <!-- Text input-->
            <div class="form-group">
                <label class="col-sm-4 control-label" for="telephone"><?= FORM_INPUT_PHONE ?></label>
                <div class="col-sm-8">
                    <input id="telephone" name="telephone" placeholder="<?= $user[0]->telephone ?>"
                           class="input-xlarge form-control" required="" type="text" value="<?= $user[0]->telephone ?>">
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <div class="col-sm-2">
                    <button id="bt_reset" name="bt_reset" class="btn btn-primary" type="reset"><?= BT_VOID ?></button>
                </div>
                <div class=" col-sm-8">
                    <button id="submit" name="submit" class="btn btn-primary" type="submit"><?= BT_SUBMIT ?></button>
                </div>
            </div>

        </fieldset>
    </form>
</div>