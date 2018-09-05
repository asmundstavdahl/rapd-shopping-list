<?= render("header") ?>

<h1><?= tr("Welcome", $user->name) ?></h1>

<h2><?= tr("Your lists", count($lists)) ?></h2>

<?php if (count($lists)): ?>
	<?php foreach ($lists as $list): ?>
		<div class="list card">
			<h3><?= $list->title ?></h3>
			<h4><?= tr("List has n items", count($list->getItems())) ?></h4>
		</div>
	<?php endforeach ?>
<?php endif ?>

<?= render("footer") ?>
