<?php
?>


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
