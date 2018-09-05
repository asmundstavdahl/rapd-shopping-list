<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title><?= $TITLE ?></title>
  <meta name="description" content="<?= $DESCRIPTION ?>">
  <meta name="author" content="<?= $AUTHOR ?>">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="<?= $ASSET_BASE ?>/Skeleton-2.0.4/css/normalize.css">
  <link rel="stylesheet" href="<?= $ASSET_BASE ?>/Skeleton-2.0.4/css/skeleton.css">
  <!-- Thank you, Dave Gamache, author of Skeleton. http://getskeleton.com/ -->

  <link rel="stylesheet" href="<?= $ASSET_BASE ?>/app.css">

  <!-- JS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script src="<?= $ASSET_BASE ?>/app.js"></script>
  <script>
    //setTimeout("location.reload()", 5000)
  </script>

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="<?= $ASSET_BASE ?>/images/favicon.png">

</head>
<body>
  <div class="container">
    <?= render("menu") ?>
