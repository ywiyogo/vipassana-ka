<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); } 

/****************************************************

*

* @File: 			footer.inc.php

* @Package:		GetSimple

* @Action:		Iridium theme for GetSimple CMS

*

*****************************************************/

?>

<!-- Copyright -->

<div id="footer">

	<div id="copyright" class="container">
	    &copy; <?php echo date('Y'); ?> - Vipassana-Gruppe Karlsruhe e.V.
	</div> 
	<div id="copyright" class="container">
		<a style="color:rgba(0,0,0,0.1); font-size: 2pt; margin:0px; padding:0px"><a href="/impressum">Impressum</a> | <a href="/datenschutz">Datenschutzerklärung</a> |  <a href="/aktuelles/#contact">Kontakt</a> | <a href="/dana">Dana</a> |  <a href="/danksagung">Danksagung</a>
    </div>
</div>

<?php get_footer(); ?>

<script src="<?php get_theme_url(); ?>/js/modernizr.js"></script> <!-- Modernizr -->

<script src="<?php get_theme_url(); ?>/js/main.js"></script> <!-- Resource jQuery -->

