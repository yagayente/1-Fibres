<?php
/**
 * Templates render the content of your pages.
 * They contain the markup together with some control structures like loops or if-statements.
 * The `$page` variable always refers to the currently active page.
 * To fetch the content from each field we call the field name as a method on the `$page` object, e.g. `$page->title()`.
 * This example template makes use of the `$gallery` variable defined in the `album.php` controller
 * and the `cover()` method defined in the `album.php` page model.
 * Snippets like the header and footer contain markup used in multiple templates. They also help to keep templates clean.
 * More about templates: https://getkirby.com/docs/guide/templates/basics
 */
?>
<?php snippet('header') ?>




<div data-barba="wrapper">
  <main data-barba="container" class="projet" data-barba-namespace="single_projet">


    <div class="fond">
      <div class="left">
        &nbsp
      </div>
      <div class="right">
        &nbsp
      </div>
    </div>


    <div class="projet_single renduold">



    <div class="presentation_page">
      <div class="titrage_page">
        <div class="heading">
          <p class="first">
            <h2 class="fade"><?= $page->titre_page() ?></h2>
            <h3 class="fade"><?= $page->introduction() ?></h3>
          </p>
        </div>
      </div>
      <div class="contenu_secondaire">


        <ul class="liste_appellation_description second">
          <?php if ($page->collaborators()->toStructure()->isNotEmpty()): ?>
            <li>  <div class="appellation">Collaborateurs</div>
           <?php endif ?>
           <div class="description">



             <?php foreach ($page->collaborators()->toStructure() as $collaborators): ?>
               <?php if ($collaborators->url()->isNotEmpty()): ?>
                 <a href="<?= $collaborators->url()?>"
                ><?= $collaborators->naming()?></a>
                 <?php else :?><span><?= $collaborators->naming()?><?php if ( $collaborators->naming()->isEmpty()): ?>&nbsp;<?php endif ?></span>
              <?php endif ?>
               <?php endforeach ?>

               </div>
             </li>
          <?php foreach ($page->liste()->toStructure() as $liste): ?>
          <li>
            <div class="appellation"><?= $liste->appellation() ?><?php if ($liste->appellation()->isEmpty()): ?>&nbsp;<?php endif ?></div>
            <div class="description lowercase"><?= $liste->description() ?><?php if ($liste->description()->isEmpty()): ?>&nbsp;<?php endif ?></div>
          </li>
          <?php endforeach ?>
           </ul>


      </div>
    </div>




            <div class="content">





              <div class="menu_fixed to_shop" >

                    <div class="left">
                      <div class="bottom">
                        <a class="typologo" href="<?= $site->homePage()->url() ?>"><H1>Fibres</h1></a>
                          <a class="fade typosimple" href="<?= $page->parent()->url() ?>"><?= $page->parent()->title() ?></a>
                      </div>
                    </div>

                    <div class="right">
                      <div class="bottom">
                          <h2 class="fade"><?= $page->titre_page() ?></h2>
                      </div>
                        <a class="icon" href="<?= $site->homePage()->url() ?>/">F</a>
                        <a class="icon_deux fade" href="<?= $site->homePage()->url() ?>/">←</a>

                    </div>

                </div>


                <div class="arrow_mobile">→</div>

                      <div class="gallery out_content">
                          <?php

                        $images = $page->images()->filterBy('template', 'image')->sortBy('sort');
                        foreach($images as $image): ?>

                          <div class="image_article">
                          <picture class="back">
                              <img data-optimumx="1.5"
                                src="<?= $image->url() ?>"
                                alt="<?php echo $image->alt()->html() ?>"
                                data-sizes="auto"
                                class="lazy lazyload"
                                srcset="<?= $image->srcset([300, 800, 1024]) ?>">

                            <?php if ($image->caption()->isNotEmpty()): ?>
                                <div class="note">&nbsp</div>
                            <?php endif ?>

                          </div>
                          </picture>

                            <?php endforeach ?>
                      </div>
              </div>

              <div class="description_article">





                        <div class="info_left" >


                        <ol class="liste third">
                        <?php foreach($page->images() as $image): ?>

                            <?php if ($image->caption()->isNotEmpty()): ?>
                                <li><?php echo $image->caption()->html() ?></li>
                                <?php else :?>
                            <?php endif ?>

                        <?php endforeach ?>
                        </ol>
                        </div>

                        <div class="info_right">

                          <p class="desktop_only description">
                              <?php if ($page->ontheshop()->toBool() === true):  ?>
                              <a href="<?= $pages->find('shop')->url() ?>" class="the_shop">Disponible dans le shop</a><br><br>
                            <?php endif ?>

                            <?= $page->description() ?>
                          </p>
                          <?php snippet('mobile_single') ?>

                        </div>


                        <div class="previousnext">
                            <div class="prev">
                              <?php if ($page->hasPrevListed()): ?>
                              <a href="<?= $page->prevListed()->url() ?>">Précédent</a>
                              <?php endif ?>
                            </div>
                            <div class="next">
                              <?php if ($page->hasNextListed()): ?>
                              <a href="<?= $page->nextListed()->url() ?>">Suivant</a>
                              <?php endif ?>
                            </div>
                        </div>

              </div>


  </div>
</main>
</div>

<?php snippet('footer') ?>
