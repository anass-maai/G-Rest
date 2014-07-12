<div  class="panel panel-primary container login-box">
	<form role="form" class="form-horizontal" action="<?= DIR?>login"
		method="POST">
		<fieldset>

			<!-- Form Name -->
			<legend>Login</legend>

			<!-- Text input-->
			<div class="control-group">
				<label class="control-label" for="email"><?= FO_INDEX_INPUT_LOGIN ?></label>
				<div class="controls">
					<input id="email" name="email" placeholder="xxx@xxx.xxx"
						class="input-xlarge form-control" required="" type="text">

				</div>
			</div>

			<!-- Password input-->
			<div class="control-group">
				<label class="control-label" for="password"><?= FO_INDEX_INPUT_PASSWORD ?> </label>
				<div class="controls">
					<input id="password" name="password" placeholder="password"
						class="input-xlarge form-control" required="" type="password">

				</div>
			</div>

			<!-- Button -->
			<div class="control-group">
				<label class="control-label" for="valider"></label>
				<div class="controls">
					<button id="submit" name="submit" class="btn btn-primary"><?= FO_INDEX_BT_CONNECT ?></button>
				</div>
			</div>

		</fieldset>
	</form>
    <p><div class="alert alert-info" role="alert" style="text-align: center;">
        <!-- MSG to display inviting new user to creates an account  -->
        <p><?= CREAT_ACCOUNT_MSG ?></p>
        <p><a class="btn btn-primary" href="<?= DIR?>user/newUser"><?= NEWACCOUNT ?></a></p>
    </div></p>
</div>