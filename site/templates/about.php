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

    <div class="fond to_shop">

    </div>



    <div class="presentation_page to_shop back_from_shop">
      <div class="titrage_page ">
        <div class="heading">
          <h1 class="first"><?= page('about')->titrage_intro() ?></h2>
          <h2 class="first"><?= page('about')->explication_intro() ?></h2>
        </div>
      </div>
      <div class="contenu_secondaire">


          <ul class="liste_appellation_description second">
            <li>
              <div class="appellation"><?= page('about')->titragecontact() ?></div>
              <div class="description"><?= (page('about')->infocontact()->kirbytext()) ?></div>
            </li>
            <li>
              <div class="appellation ok">addresse</div>
              <div class="description ok"><?= page('about')->address()->kirbytext()?></div>
            </li>
            <li>
              <div class="appellation">email</div>
              <div class="description"><?= page('about')->email() ?></div>
            </li>
            <li>
              <div class="appellation">téléphone</div>
              <div class="description"><?= page('about')->phone() ?></div>
            </li>

            <li>
              <div class="appellation">&nbsp</div>

              <div class="description">
                <?php foreach ($page->social()->toStructure() as $liste): ?>

                <a href="<?= $liste->url() ?>"><?= $liste->platform() ?></a>
            <?php endforeach ?>
            </div>
            </li>
            <?php snippet('filtrecouleur') ?>
          </ul>


      </div>
    </div>



    <div class="projet to_shop back_from_shop">

    <div class="menu_fixed">

      <div class="left">
        <div class="bottom">
          <a href="<?= $site->homePage()->url() ?>/"><H1>Fibres</h1></a>
          </div>
        </div>
        <div class="right">
          <div class="bottom">
            <a class="active fade"><?= $pages->find('about')->title() ?></a>
            <a class="go_to_shop fade" href="<?= $pages->find('shop')->url() ?>"><?= $pages->find('shop')->title() ?></a>
          </div>
          <a class="icon" href="<?= $site->homePage()->url() ?>/">F</a>

        </div>

    </div>


    <div class="rendu to_shop back_from_shop" id="about_back">



          <div id="informations_one_about">
              <div class="info_gauche out_content">

                <div class="block">
                <h3 ><?= page('about')->titrage_entreprise() ?></h3>
                <p ><?= page('about')->explication_entreprise()->kirbytext() ?></p>
                </div>

              </div>

              <div class="info_droite">

                        <div class="img_block out_content">

                          <div class="img_presentation_sec" >

                            <?php if($image = page('about')->photo2()->toFile()): ?>
                            <div class="back"><img src="<?= $image->url() ?>" alt="" data-sizes="auto" srcset="<?= $image->srcset([300, 800, 1024]) ?>" class="lazyload"></div>
                            <?php endif ?>


                          </div>

                          <div class="description_image">
                             <div class="bloc">
                               <div class="vertical_text">
                                 <?= page('about')->description_photo() ?>
                              </div>
                             </div>
                          </div>
                        </div>


                        </p>
            </div>
          </div>


          <div id="informations_two_about" class="rendu">
            <div class="info_gauche out_content ">

              <div class="block">
              <h3><?= page('about')->titrage1() ?></h3>
              <p><?= page('about')->explication1() ?></p>
              </div>

              <div class="block">
              <h3><?= page('about')->titrage2() ?></h3>
              <p><?= page('about')->explication2() ?></p>
              </div>
            </div>


            <div class="info_droite out_content">


              <div class="img_presentation" >

                  <div class="img_presentation_atelier" >
                  <?php if($image = page('about')->photo1()->toFile()): ?>
                  <div class="back"><img src="<?= $image->url() ?>" alt="" data-sizes="auto" srcset="<?= $image->srcset([300, 800, 1024]) ?>" class="lazyload"></div>
                  <?php endif ?>
                  </div>


                  <div class="description_image">
                     <div class="bloc">
                       <div class="vertical_text">
                       <?= page('about')->description_photo_2() ?>
                     </div>
                     </div>
                  </div>


              </div>

          </div>
        </div>





        <div class="derniere_ligne_mobile ">
          <ul class="liste_appellation_description">
            <li>
              <div class="appellation"><?= page('about')->titragecontact() ?></div>
              <div class="description"><?= (page('about')->infocontact()) ?></div>
            </li>
            <li>
              <div class="appellation">addresse</div>
              <div class="description"><?= page('about')->address()->kirbytext()?></div>
            </li>
            <li>
              <div class="appellation">email</div>
              <div class="description"><?= page('about')->email() ?></div>
            </li>
            <li>
              <div class="appellation">téléphone</div>
              <div class="description"><?= page('about')->phone() ?></div>
            </li>

            <li>
              <div class="appellation">&nbsp</div>

              <div class="description">
                <?php foreach ($page->social()->toStructure() as $liste): ?>

                <a href="<?= $liste->url() ?>"><?= $liste->platform() ?></a>
            <?php endforeach ?>
            </div>
            </li>
            <?php snippet('filtrecouleur') ?>
          </ul>
        </div>

</div>
</div>
</main>
</div>



<?php snippet('footer') ?>
