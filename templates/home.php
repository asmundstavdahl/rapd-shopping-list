<?= render("header") ?>

<h1><?= tr("Welcome", $user->name) ?></h1>

<h2><?= tr("Your lists", count($lists)) ?></h2>

<?= render("footer") ?>
