<?= render("header") ?>

<h1><?= e($list->title) ?></h1>

<?php foreach ($list->getItems() as $item): ?>
	<div class="item"><?= $item->title ?></div>
<?php endforeach ?>

<?= render("footer") ?>
