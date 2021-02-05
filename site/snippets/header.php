<?php

?>

<!doctype html>
<html lang="fr">
<head>
<?php if($page->isHomepage()): ?><meta name="description" content="<?= $page->google() ?>">
<?php elseif( $page->description()->isEmpty() ) : ?><meta name="description" content="<?= page('Projets')->google() ?>">
<?php else: ?><meta name="description" content="<?php echo str::excerpt($page->description()->kirbytext(), 150, true)?>">
<?php endif ?>
<meta name="author" content="Simon Bouchard">
<meta name="keywords" content="<?= $page->title() ?>, Fibres, Ébénistes, Jura, France">
<meta charset="utf-8">
<link rel="canonical" href="<?= $page->url() ?>" />
<link rel="shortcut icon" href="<?= page('Projets')->favicon() ?>" type="image/x-icon">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title><?= $site->title() ?> | <?php if($page->isHomepage()): ?><?php else: ?><?= $page->title() ?> | <?php endif ?><?= $page->introduction() ?></title>
<?= css(['assets/index.css', '@auto']) ?>
</head>
<body>



  <div class="page">
