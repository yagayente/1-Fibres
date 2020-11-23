<?php
/**
 * Templates render the content of your pages.
 * They contain the markup together with some control structures like loops or if-statements.
 * The `$page` variable always refers to the currently active page.
 * To fetch the content from each field we call the field name as a method on the `$page` object, e.g. `$page->title()`.
 * This example templates only echos the field values from the content file and doesn't need any special logic from a controller.
 * Snippets like the header, footer and intro contain markup used in multiple templates. They also help to keep templates clean.
 * More about templates: https://getkirby.com/docs/guide/templates/basics
 */
?>

<?php snippet('header') ?>

<div data-barba="wrapper">
  <main data-barba="container" data-barba-namespace="about">
    <?php snippet('menu') ?>


    <div class="rendu">

      <div class="presentation_page">
        <?= html::h1($page->titre_page()) ?><?= html::p($page->introduction()) ?>
      </div>


  <div class="layout">
    <div class="col_left">
          <?= html::h3($page->titrage1()) ?>
          <p class="col"><?= $page->explication1() ?></p>

          <?= html::h3($page->titrage2()) ?>
          <p class="col"><?= $page->explication2() ?></p>


    <div class="img_block">
      <?php snippet('filtrecouleur') ?>

      <div class="img_presentation" >
          <?php if($image = $page->photo1()->toFile()): ?>
          <picture class="back"><img src="<?= $image->url() ?>" alt="" data-sizes="auto" srcset="<?= $image->srcset([300, 800, 1024]) ?>" class="lazyload"></picture>
          <?php endif ?>
      </div>
      <div class="img_presentation_sec" >
          <?php if($image = $page->photo2()->toFile()): ?>
          <picture class="back"><img src="<?= $image->url() ?>" alt="" data-sizes="auto" srcset="<?= $image->srcset([300, 800, 1024]) ?>" class="lazyload"></picture>
          <?php endif ?>
      </div>
    </div>

    <?= html::h3($page->titrage3()) ?>
    <p class="center">
    <?= $page->address()?><br>
    <?= $page->email() ?><br>
    <?= $page->phone() ?><br>
    </p>

    <div class="identitedeux">
      <a class="logo" href="<?= $site->url() ?>">Fibres</a>
    </div>
  </div>




  <div class="col_droite">
    <div class="content_right_bottom">
    <ul>
      <?php foreach ($page->social()->toStructure() as $social): ?>
      <li><?= html::a($social->url(), $social->platform()) ?></li>
      <?php endforeach ?>
    </ul>
  </div>
  </div>


</div>




</div>
</main>
</div>


<?php snippet('footer') ?>
