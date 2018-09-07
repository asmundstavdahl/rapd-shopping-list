<?= render("header") ?>

<h1><?= e($list->title) ?></h1>

<h2><?= tr("Grant access to another user") ?></h2>

<form action="<?= route("grant_list_access", [$list->id]) ?>" method="POST">
	<fieldset>
		<legend><?= tr("Allow user") ?></legend>
		<select name="user_id">
			<?php foreach (User::findAll() as $user): ?>
				<option value="<?= $user->id ?>">
					<?= e($user->name) ?>
				</option>
			<?php endforeach ?>
		</select>
		<input type="submit" value="<?= tr("Submit") ?>">
	</fieldset>
</form>

<h2><?= tr("Users with access") ?></h2>

<table>
	<tr>
		<th><?= tr("Name") ?></th>
		<th></th>
	</tr>
<?php foreach ($list->getUsers() as $user): ?>
	<tr>
		<td>
			<big><?= $user->name ?></big>
		</td>
		<td>
			<?php if ($user->id != User::current()->id): ?>
				<a class="button" href="<?= route("deny_list_access", [$list->id, $user->id]) ?>">
					<?= tr("Revoke access") ?>
				</a>
			<?php else: ?>
				<a class="button">
					<?= tr("Revoke access") ?>
				</a>
			<?php endif ?>
		</td>
	</tr>
<?php endforeach ?>
</table>

<?= render("footer") ?>
