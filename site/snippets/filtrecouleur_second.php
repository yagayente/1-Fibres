<?php
?>


<svg version="1.1" width="0" height="0" class="filter-rot">


	<filter id="traitement_couleur_2" x="-10%" y="-10%" width="120%" height="120%" filterUnits="objectBoundingBox" primitiveUnits="userSpaceOnUse" color-interpolation-filters="linearRGB">
		<feColorMatrix type="matrix" values="0 0 1 0 0
	            0 0 1 0 0
	            0 0 1 0 0
	            0 0 0 1 0" in="SourceGraphic" result="colormatrix"/>
		<feComponentTransfer in="colormatrix" result="componentTransfer">
	    		<feFuncR type="table" tableValues="0.1 1"/>
			<feFuncG type="table" tableValues="0.37 1"/>
			<feFuncB type="table" tableValues="0.25 1"/>
			<feFuncA type="table" tableValues="0 1"/>
	  	</feComponentTransfer>
		<feBlend mode="normal" in="componentTransfer" in2="SourceGraphic" result="blend"/>
	</filter>
