<?= render("header") ?>

<?php if ($gotInvalidCredentials): ?>
	<div class="error"><?= tr("Wrong password") ?></div>
<?php endif ?>

<form method="POST">
	<div>
		<label for="username"><?= tr("Username") ?></label>
		<input type="text" name="username">
	</div>
	<div>
		<label for="password"><?= tr("Password") ?></label>
		<input type="password" name="password">
	</div>
	<input type="submit" value="<?= tr("Log in") ?>">
</form>

<?= render("footer") ?>
