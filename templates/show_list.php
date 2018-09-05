<?= render("header") ?>

<h1><?= e($list->title) ?></h1>

<div>
	<form action="<?= route("new_item", [$list->id]) ?>" method="POST">
		<fieldset>
			<legend><?= tr("Enter new item") ?></legend>
			<input type="text" name="title">
			<input type="submit" value="<?= tr("Submit") ?>">
		</fieldset>
	</form>
</div>

<div class="item-container">
	<?php foreach ($list->getItems() as $item): ?>
		<?= render("list_item", ["item" => $item]) ?>
	<?php endforeach ?>
</div>

<?= render("footer") ?>
