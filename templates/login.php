<?= render("header") ?>

<?php if ($gotInvalidCredentials): ?>
	<div class="error">Wrong password? Try again.</div>
<?php endif ?>

<form method="POST">
	<div>
		<label for="username">Username</label>
		<input type="text" name="username">
	</div>
	<div>
		<label for="password">Password</label>
		<input type="password" name="password">
	</div>
	<input type="submit" value="Log in">
</form>

<?= render("footer") ?>
