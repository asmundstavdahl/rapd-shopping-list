<?= render("header") ?>

<h1><?= $status ?></h1>
<h2><?= $reason ?></h2>

<a class="button" href="<?= $_SERVER["HTTP_REFERER"] ?>">
	<?= tr("Back") ?>
</a>

<?= render("footer") ?>
