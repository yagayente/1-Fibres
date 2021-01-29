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
  <main data-barba="container" data-barba-namespace="home" class="to_shop">

    <div class="fond">
    </div>


    <div class="renduold ">



    <div class="presentation_page back_from_shop">
      <div class="titrage_page">
        <div class="heading">
          <h2 class="out_content "><?= $page->titre_page() ?></h2>
          <div class="out_content "><?= $page->introduction()->kirbytext() ?></div>

        </div>
      </div>
      <div class="contenu_secondaire">
        <div class="second">
        <?= page('about')->address()->kirbytext()?>
        <?= page('about')->email() ?><br>
        <?= page('about')->phone() ?><br>
        </div>
      </div>
    </div>




<div class="projet back_from_shop">

<div class="menu_fixed">

  <div class="left">
      <div class="bottom">
      <h1><a class="active">Fibres</a></H1>
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


<?php $projects = page('projets')->index()->listed(); ?>
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
  if ($projetPage = page('projets')): ?>
  <?php foreach ($projetPage->children()->listed() as $projet): ?>


          <div class="article lazyload out_content to_shop" >
              <a class="go_to_post" href="<?= $projet->url() ?>">
              <?php if($image = $projet->cover()->toFile()): ?>

                <?php snippet('filtrecouleur') ?>



              <picture class="backhome home"><img src="<?= $image->url() ?>" alt="<?= $image->alt() ?>" data-sizes="auto" srcset="<?= $image->srcset([300, 800, 1024]) ?>" class="lazyload"></picture>
              <?php endif ?>
              <div class="title">
              <div class="date third"><h3><?= $projet->date() ?></h3></div>
              <div class="titrage third"><h2><?= $projet->title() ?></h2></div>
              </div>
              </a>

          </div>

    <?php endforeach ?>

  </div>
  </div>

  <?php endif ?>
</div>
</main>
</div>

<?php snippet('footer') ?>
