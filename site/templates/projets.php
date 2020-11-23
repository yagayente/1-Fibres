<?php
/**
 * Templates render the content of your pages.
 * They contain the markup together with some control structures like loops or if-statements.
 * The `$page` variable always refers to the currently active page.
 * To fetch the content from each field we call the field name as a method on the `$page` object, e.g. `$page->title()`.
 * This home template renders content from others pages, the children of the `photography` page to display a nice gallery grid.
 * Snippets like the header and footer contain markup used in multiple templates. They also help to keep templates clean.
 * More about templates: https://getkirby.com/docs/guide/templates/basics
 */
?>

<?php snippet('header') ?>

<div data-barba="wrapper">
  <main data-barba="container" data-barba-namespace="home">
    <?php snippet('menu') ?>



<div class="rendu">

<div class="presentation_page">
  <?= html::h1($page->titre_page()) ?><?= html::p($page->introduction()) ?>
</div>


<div class="projet">
  <?php
  // we always use an if-statement to check if a page exists to prevent errors
  // in case the page was deleted or renamed before we call a method like `children()` in this case
  if ($projetPage = page('projets')): ?>
  <?php foreach ($projetPage->children()->listed() as $projet): ?>


          <div class="article lazyload" >
              <a class="go_to_post" href="<?= $projet->url() ?>">
              <?php if($image = $projet->cover()->toFile()): ?>

                <svg version="1.1" width="0" height="0" class="filter-rot">
        						<filter id="traitement_couleur_1" x="-10%" y="-10%" width="120%" height="120%" filterUnits="objectBoundingBox" primitiveUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                      <feColorMatrix type="matrix" values="1 0 0 0 0
                      1 0 0 0 0
                      1 0 0 0 0
                      0 0 0 1 0" in="SourceGraphic" result="colormatrix"/>
                      <feComponentTransfer in="colormatrix" result="componentTransfer">
                      <feFuncR type="table" tableValues="0 0.88"/>
                  		<feFuncG type="table" tableValues="0.49 1"/>
                  		<feFuncB type="table" tableValues="0.9 0.88"/>
                  		<feFuncA type="table" tableValues="0 1"/>
                    	</feComponentTransfer>
        						<feBlend mode="normal" in="componentTransfer" in2="SourceGraphic" result="blend"/>
        						</filter>
        					</svg>


              <picture class="back"><img src="<?= $image->url() ?>" alt="" data-sizes="auto" srcset="<?= $image->srcset([300, 800, 1024]) ?>" class="lazyload"></picture>
              <?php endif ?>
              <div class="title">
              <h2><?= $projet->title() ?></h2>
              </div>
              </a>
          </div>
    <?php endforeach ?>
  </div>
  <?php endif ?>
</div>
</main>
</div>

<?php snippet('footer') ?>
