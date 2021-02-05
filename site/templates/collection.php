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





<div data-barba="wrapper" id="hello">
  <main  class="site" data-barba="container" data-barba-namespace="collection" class="to_shop">

    <div class="fond ">
    </div>


    <div class="renduold ">



    <div class="presentation_page back_from_shop">
      <div class="titrage_page ">
        <div class="heading">
          <h1 class="first"><?= $page->titre_page() ?></h1>
          <p class="second"><?= $page->introduction() ?></p>

        </div>
      </div>
      <div class="contenu_secondaire ">
        <div class="fade">
          <?= $page->texte_collection()->kirbytext() ?>
        </div>
      </div>
    </div>




<div class="projet back_from_shop">

<div class="menu_fixed ">

  <div class="left">
      <div class="bottom">
      <h1><a href="<?= $site->homePage()->url() ?>/">Fibres</a></H1>
      </div>
    </div>
    <div class="right">
      <div class="bottom">
        <a class="second" href="<?= $pages->find('about')->url() ?>"><?= $pages->find('about')->title() ?></a>
        <a class="go_to_shop second" href="<?= $pages->find('shop')->url() ?>"><?= $pages->find('shop')->title() ?></a>
      </div>
      <a class="icon" href="<?= $site->homePage()->url() ?>/">F</a>
    </div>

</div>





<?php $projects = page()->index()->listed(); ?>
<?php if ($projects->isEmpty() ): ?>
    <div class="article lazyload out_content to_shop" >
      <div class="title">&nbsp</div>
    </div>
    <div class="article lazyload out_content to_shop" >
      <div class="title">&nbsp</div>
    </div>
<?php else: ?>
<?php endif;?>












  <?php
  // we always use an if-statement to check if a page exists to prevent errors
  // in case the page was deleted or renamed before we call a method like `children()` in this case
  //ICIIIII
  if ($projetPage = page()): ?>
  <?php foreach ($projetPage->children()->listed() as $projet): ?>



          <div class="article lazyload out_content " >
              <a class="go_to_post" href="<?= $projet->url() ?>">
              <?php if($image = $projet->cover()->toFile()): ?>

                <?php snippet('filtrecouleur') ?>



              <picture class="backhome collection"><img src="<?= $image->url() ?>" data-sizes="auto" srcset="<?= $image->srcset([300, 800, 1024]) ?>" class="lazyload"></picture>
              <?php endif ?>
              <div class="title">
              <div class="counter third"><h3>&nbsp</h3></div>
              <div class="titrage third"><h2><?= $projet->title() ?></h2></div>
              </div>
              </a>

          </div>

    <?php endforeach ?>


    <div class="previousnextcollection out_content ">
        <div class="precedent">  <?php if ($page->hasPrevListed()): ?><a href="<?= $page->prevListed()->url() ?>">Précédent</a><?php endif ?></div>
        <div class="suivant"><?php if ($page->hasNextListed()): ?><a href="<?= $page->nextListed()->url() ?>">Suivant</a><?php endif ?></div>
    </div>



  </div>

  </div>

  <?php endif ?>



  </main>
</div>
</div>


<?php snippet('footer') ?>
