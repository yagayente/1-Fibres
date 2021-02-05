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






<div data-barba="wrapper" >
  <main data-barba="container" data-barba-namespace="shop" id="shop">


    <div class="fond to_shop leave_shop">


    </div>


    <div class="shop_page_header leave_shop">
      <div class="titrage_page to_shop">
        <div class="heading">
          <h2 class="to_shop leave_shop"><?= page('shop')->titre_page()?></h2>
        </div>
      </div>
      <div class="contenu_secondaire to_shop">
        <div class="to_shop leave_shop"><?= page('shop')->introduction()->kirbytext() ?></div>
      </div>
    </div>




<div class="shop">

<div class="menu_fixed to_shop leave_shop" >

  <div class="left">
      <div class="bottom">
        <a class="leave_shop leave_the_shop" href="<?= $site->homePage()->url() ?>"><H1>Fibres</h1></a>
      </div>
      </div>
    <div class="right">
      <div class="bottom">
        <a class="leave_the_shop leave_shop" href="<?= $pages->find('about')->url() ?>"><?= $pages->find('about')->title() ?></a>
        <a class="active"><?= $pages->find('shop')->title() ?></a>
      </div>
      <a class="icon leave_shop leave_the_shop" href="<?= $site->homePage()->url() ?>/">F</a>

    </div>

</div>


<?php $projects = page('projets')->index()->listed(); ?>


        <?php $products = $projects->filterBy('onTheShop', true); ?>
        <?php if ($products->isEmpty() ): ?>
          <div class="empty leave_shop">
            <div class="left to_shop" >
              <p class="leave_shop"><?= $page->shop_ferme()->kirbytext() ?></p>
            </div>
            <div class="right to_shop">

              <?php if($image = page('shop')->photographie()->toFile()): ?>
                <div class="back leave_shop"><img src="<?= $image->url() ?>" alt="" data-sizes="auto" srcset="<?= $image->srcset([300, 800, 1024]) ?>" class="lazyload"></div>
              <?php endif ?>
            </div>
          </div>
          <?php snippet('filtrecouleur') ?>
          <?php else: ?>

          <?php endif;?>




<?php $projects = page('projets')->index()->listed(); ?>
<?php foreach ( $projects as $projet) : ?>

          <?php
            if ($projet->ontheshop()->toBool() === true) {  ?>

              <div class="article leave_shop" >
              <div class="shop_left to_shop">

                  <div class="content_top">
                  <h2 class="leave_shop"><?= $projet->title() ?></h2>
                  <a class="button leave_the_shop leave_shop" href="<?= $projet->url() ?>"><?= page('shop')->Appellation_consulter() ?></a>
                  <?php if ($projet->toggle()->toBool() === true): ?><a class="button leave_the_shop leave_shop"  target="_blank" href="https://www.paypal.com/webapps/shoppingcart?mfid=<?= $projet->paypal() ?>_9223a38318568&flowlogging_id=9223a38318568#/checkout/shoppingCart"><?= page('shop')->Appellation_acheter() ?></a>
                <?php else: ?><p class="button_commande"><?= page('shop')->Appellation_commande() ?></p>
                  <?php endif ?>
                  </div>

                  <div class="description_post">



                    <ul class="liste_appellation_description texte_shop_fade">



                      <li class="leave_shop">
                        <div class="appellation">
                          <?php if ($projet->showprice()->toBool() === true): ?>
                          <p class="prix"><?= $projet->Prix() ?></p><?php if ($projet->Prix()->isEmpty()): ?><p><?= page('shop')->Appellation_prix() ?>&#8239;:<br><?= page('shop')->Champs_vide() ?></p><?php endif ?>
                        <?php else: ?><p><?= page('shop')->Appellation_prix() ?>&#8239;:</p><p><?= page('shop')->Champs_vide() ?></p>
                        <?php endif ?>

                        </div>
                        <div class="description lowercase">
                          <?php if ($projet->showlivraison()->toBool() === true): ?>
                          <p class="livraison"><?= page('shop')->Appellation_livraison() ?>&#8239;:<br><?= $projet->delais_livraison() ?><?php if ($projet->delais_livraison()->isEmpty()): ?><?= page('shop')->Champs_vide() ?><?php endif ?></p>
                        <?php else: ?><p class="livraison_sec"><?= page('shop')->Appellation_livraison() ?>&#8239;:</p><p class="livraison_sec"><?= page('shop')->Champs_vide() ?></p>
                        <?php endif ?>

                        </div>
                      </li>




                      <?php if ($projet->collaborators()->toStructure()->isNotEmpty()): ?>
                        <li class="leave_shop"> <div class="appellation">Collaborateurs</div>
                       <?php endif ?>
                       <div class="description ">
                           <?php foreach ($projet->collaborators()->toStructure() as $collaborators): ?>
                             <?php if ($collaborators->url()->isNotEmpty()): ?>
                               <a href="<?= $collaborators->url()?>"
                              ><?= $collaborators->naming()?></a>
                               <?php else :?><span><?= $collaborators->naming()?><?php if ( $collaborators->naming()->isEmpty()): ?>&nbsp;<?php endif ?></span>
                            <?php endif ?>
                             <?php endforeach ?>
                           </div>
                         </li>
                      <?php foreach ($projet->liste()->toStructure() as $liste): ?>
                      <li class="leave_shop">
                        <div class="appellation"><?= $liste->appellation() ?><?php if ($liste->appellation()->isEmpty()): ?>&nbsp;<?php endif ?></div>
                        <div class="description lowercase"><?= $liste->description() ?><?php if ($liste->description()->isEmpty()): ?>&nbsp;<?php endif ?></div>
                      </li>
                      <?php endforeach ?>
                       </ul>


                  </div>








              </div>


              <div class="shop_right to_shop">
                <div class="shop_inside">
                <?php if($image = $projet->cover()->toFile()): ?>
                <div class="back leave_shop"><img src="<?= $image->url() ?>" alt="" data-sizes="auto" srcset="<?= $image->srcset([300, 800, 1024]) ?>" class="lazyload"></div>
                <?php endif ?>
                </div>
              </div>

              </div>

              <?php  } else {?>



              <?php  }  ?>



    <?php endforeach ?>

    <div class="mobileshop to_shop">
      <div class="to_shop leave_shop"><?= page('shop')->introduction()->kirbytext() ?></div>
    </div>


  </div>




</main>
</div>
  <?php snippet('filtrecouleur') ?>
<?php snippet('footer') ?>
