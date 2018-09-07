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

<hr>

<div class="flex row">
	<a class="icon button" href="<?= route("clean_list", [$list->id]) ?>">
		&#x1f5d1;
	</a>
</div>

<?= render("footer") ?>
