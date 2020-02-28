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
<html lang="de">
<head>
	<?php include('head.inc.php'); ?>
</head>

<body id="<?php get_page_slug(); ?>" <?php if (return_page_slug()=='index') echo 'class="homepage"'; ?>>

	<!-- Header -->

	<div id="header">

			<div  class="container">

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

	<div id="main" class="<?php if (return_page_slug()=='index') echo 'hide';?>">

		<div class="container">

			<div class="row">

				<!-- Content -->

				<div id="content" class="8u -2u skel-cell-important">

					<section>

						<header>

							<h2><?php get_page_title(); ?></h2>

						</header>

						<?php if (return_page_slug()=='faqs') include('toggle_faq.inc.php'); else get_page_content();?>
						<?php if (return_page_slug()=='aktuelles') include('fullcalendar.inc.php');?>

					</section>
				</div><!-- end content -->

			</div><!-- end row -->

		</div><!-- end container -->

	</div><!-- end main -->
<?php if (return_page_slug()=='aktuelles') include('fullcalendar-modal.inc.php');?>
	<?php if (return_page_slug()=='aktuelles') include('quotes.inc.php');?>
	<?php if (return_page_slug()=='aktuelles') include('contact.inc.php'); ?>
	<?php if (return_page_slug()=='ueber-uns') include('contact.inc.php'); ?>
	<?php if (return_page_slug()=='lehre-und-praxis') include('booklist.inc.php'); ?>
	<?php include('footer.inc.php'); ?>

</body>

</html>

