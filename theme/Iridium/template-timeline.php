<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); }

/****************************************************

*

* @File: 			template.php

* @Package:		GetSimple

* @Action:		Iridium theme for GetSimple CMS

*

*****************************************************/

?>

<!DOCTYPE html>

<html>

<head>

	<?php include('head.inc.php'); ?>

</head>



<body id="<?php get_page_slug(); ?>" <?php if (return_page_slug()=='index') echo 'class="homepage"'; ?>>

	<!-- Header -->

	<div id="header">

			<div class="container"> 

				<div id="logo">

					<h1><a href="<?php get_site_url(); ?>">Vipassana-Gruppe Karlsruhe e.V.</a></h1>

					<span><?php if (return_page_slug()=='index') get_component('tagline');	?></span>

				</div>		

				

				<nav id="nav">	

					<ul><?php get_navigation(return_page_slug()); ?></ul>			

				</nav>

			</div><!-- end container -->

	</div><!-- end header -->

	

	<!-- Main -->

	<div id="main">

		<div class="container">	

			<div class="row"> 	

				<!-- Content -->

				<div id="content" class="10u -1u skel-cell-important">

						<header>

							<h2><?php get_page_title(); ?></h2>

						</header>
						<?php if (return_page_slug()=='meditation-dienstag') include('timeline.inc.php');?>
						<?php if (return_page_slug()=='lehrreden-donnerstag') include('timelinethursday.inc.php');?>
						<?php if (return_page_slug()=='meditation-freitag') include('timelinefriday.inc.php');?>

					    <!-- ?php include('timeline.inc.php'); ? -->

						<!--iframe frameborder="0" height="200px" marginheight="0" marginwidth="10" scrolling="no" src="http://www.openstreetmap.org/export/embed.html?bbox=8.38904857635498%2C49.00910710911502%2C8.396515846252441%2C49.013491255310086&amp;layer=mapnik&amp;marker=49.01129571189382%2C8.392782211303711" style="border: 1px solid grey" width="99%"></iframe><br />

		<small><a href="http://www.openstreetmap.org/?mlat=49.01130&amp;mlon=8.39278#map=17/49.01130/8.39278">Anfahrtsbeschreibung</a></small-->



				</div><!-- end content -->

			</div><!-- end row -->

		</div><!-- end container -->

	</div><!-- end main -->

	

	<?php include('footer.inc.php'); ?>

</body>

</html>

