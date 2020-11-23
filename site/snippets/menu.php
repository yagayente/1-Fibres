<?php

?>

<div class="header">
    <nav>
      <ul>
  <?php
  foreach ($site->children()->listed() as $item): ?>

  <li<?php e($item->isActive(), ' class="active"') ?>>
    <a href="<?= $item->url() ?>">
      <?= html($item->title()) ?>
    </a>
  </li>
  <?php endforeach ?>
  </ul>
  </nav>
</div>
