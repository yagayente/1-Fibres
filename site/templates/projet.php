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
    <?php snippet('menu') ?>


    <div class="rendu">

      <div class="presentation_page">
          <?= html::h1($page->titre_page()) ?><?= html::p($page->introduction()) ?>
      </div>

  <article>
    <div class="col_left">
              <ul class="gallery">
                <?php foreach($page->images() as $image): ?>
               <li>
                    <img
                    data-optimumx="1.5"
                    src="<?= $image->url() ?>"
                    alt=""
                    data-sizes="auto"
                    class="lazy lazyload"
                    srcset="<?= $image->srcset([300, 800, 1024]) ?>">
                </li>
                <?php endforeach ?>
              </ul>
      </div>
      <div class="col_right">
        <div class="content_right_top">
          <p class="description"><?= $page->description() ?></p>
        </div>

        <div class="content_right_bottom">





                  <ul class="liste_appellation_description">


                    <?php if ($page->collaborators()->toStructure()->isNotEmpty()): ?>
                      <li>  <div class="appellation">Collaborateurs</div>
                     <?php endif ?>
                     <div class="description">


                           <?php foreach ($page->collaborators()->toStructure() as $collaborators): ?>

                           <?php if ($collaborators->url()->isNotEmpty()): ?>
                             <a href="<?= $collaborators->url()?>"
                            ><?= $collaborators->naming()?></a>


                             <?php else :?><span><?= $collaborators->naming()?></span>

                          <?php endif ?>
                           <?php endforeach ?>

                         </div>
                       </li>








                    <?php foreach ($page->liste()->toStructure() as $liste): ?>
                    <li>
                      <div class="appellation"><?= $liste->appellation() ?></div>
                      <div class="description"><?= $liste->description() ?></div>
                    </li>
                    <?php endforeach ?>

                     </ul>

       </div>
  </div>
  </article>

</div>
</main>
</div>

<?php snippet('footer') ?>
