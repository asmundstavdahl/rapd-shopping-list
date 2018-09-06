<div class="menu">
	<?php if (User::isLoggedIn()): ?>
		<big>
			<a href="<?= route("home") ?>" class="covert">
				&lt; <?= User::current()->name ?> &gt;
			</a>
		</big>
	<?php endif ?>
	<div class="spacer"></div>
	<?php if (User::isLoggedIn()): ?>
		<a class="button" href="<?= route("logout") ?>">
			<?= tr("Log out") ?>
		</a>
	<?php endif ?>
</div>
