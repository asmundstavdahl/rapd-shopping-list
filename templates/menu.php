<div class="menu">
	<?php if (User::isLoggedIn()): ?>
		<big>&lt; <?= User::current()->name ?> &gt;</big>
	<?php endif ?>
	<div class="spacer"></div>
	<?php if (User::isLoggedIn()): ?>
		<a class="button" href="<?= route("logout") ?>">
			<?= tr("Log out") ?>
		</a>
	<?php endif ?>
</div>
