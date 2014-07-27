<?php $user = $data['displayedUser']; ?>
<div class="panel panel-primary cxinfo-box" style="margin: auto;">
    <div class="form-panel-heading"> <strong><?= $user[0]->prenom ?> <?= $user[0]->nom ?></strong></div>
    <div class="form-group">
        <label class="col-md-4 col-md-4 control-label" for="prenom"><?= FORM_INPUT_BIRTHDAY ?></label>      <div ><?= $user[0]->datenaissance ?></div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 col-md-4 control-label" for="email"><?= FORM_INPUT_EMAIL ?></label>          <div ><?= $user[0]->email ?></div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 col-md-4 control-label" for="adresse"><?= FORM_INPUT_ADDRESS ?></label>      <div ><?= $user[0]->adresse ?></div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 col-md-4 control-label" for="telephone"><?= FORM_INPUT_PHONE ?></label>      <div ><?= $user[0]->telephone ?></div>
    </div>      
    <div>
        <a class="btn dropdown-toggle btn-info" href="<?= DIR ?>user/update/<?= $user[0]->id ?>"><?= BT_UPDATE ?></a>
    </div>
</div>

