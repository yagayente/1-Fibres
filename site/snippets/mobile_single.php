<?php
/**
 * Snippets are a great way to store code snippets for reuse or to keep your templates clean.
 * in loops or simply to keep your templates clean.
 * This intro snippet is reused in multiple templates. While it does not contain much code,
 * it helps to keep your code DRY and thus facilitate maintenance when you have to make changes.
 * More about snippets: https://getkirby.com/docs/guide/templates/snippets
 */
?>

<?php foreach($page->images() as $image): ?>
    <?php if ($image->caption()->isNotEmpty()): ?>
      <div class="mobile only_mobile">

        <ol class="liste">
    <?php endif ?>
<?php endforeach ?>

                          <?php foreach($page->images() as $image): ?>


                              <?php if ($image->caption()->isNotEmpty()): ?>
                                <li><?php echo $image->caption()->html() ?></li>
                              <?php endif ?>





                          <?php endforeach ?>





                          <?php foreach($page->images() as $image): ?>
                              <?php if ($image->caption()->isNotEmpty()): ?>
                              </ol>
                                </div>

                              <?php endif ?>
                          <?php endforeach ?>


      <p class="description only_mobile"><?= $page->description() ?></p>

      <?php if ($page->ontheshop()->toBool() === true):  ?>
      <a href="<?= $pages->find('shop')->url() ?>" class="the_shop only_mobile">Disponible dans le shop</a>
    <?php endif ?>


      <div class="mobile_at_bottom only_mobile">
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
