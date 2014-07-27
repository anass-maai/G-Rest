<?php
/**
 * Created by equipe : 11.
 * User: anass
 * Date: 25/07/14
 * Time: 10:59 AM
 */ ?>
<div style="max-width: 600px; padding: auto; margin: auto;">
    <form role="form" class="form-horizontal" action="<?= DIR ?>user/uploadfile" method="post" enctype="multipart/form-data">
        <!-- Text input-->
        <div class="form-group">
           <label class="col-sm-4 control-label" for="file"><?= FORM_INPUT_FILENAME ?></label>
        <div class="col-sm-8">
            <input name="file" id="file" placeholder="<?= FORM_INPUT_PH_FILENAME ?>"
                   class="input-xlarge form-control" required="" type="file" >
        </div>
        </div>
    </form>
</div>