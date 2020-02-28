<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); } 

/****************************************************

*

* @File: 		timeline.inc.php

* @Package:		GetSimple

* @Action:		Iridium theme for GetSimple CMS

*

*****************************************************/

?>

	<!-- Timeline -->

	<section id="cd-timeline" class="cd-container">

		<div class="cd-timeline-block">

			<div class="cd-timeline-img cd-picture">

				<img src="<?php get_theme_url(); ?>/images/buddha-sm.gif" alt="Meditationsanfang">

			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">

				<h2>Ankommen</h2>

				<p><?php get_component('timeline'); ?></p>

				<span class="cd-date">19:00 - 19:30 Uhr</span>

			</div> <!-- cd-timeline-content -->

		</div> <!-- cd-timeline-block -->



		<div class="cd-timeline-block">

			<div class="cd-timeline-img cd-movie">

				<img src="<?php get_theme_url(); ?>/images/buddha-sm.gif" alt="Meditationsanfang">

			</div> <!-- cd-timeline-img -->



			<div class="cd-timeline-content">

				<h2>Meditation</h2>

				<p><?php get_component('timeline2'); ?></p>

				<span class="cd-date">19:30 - 20:15 Uhr</span>

			</div> <!-- cd-timeline-content -->

		</div> <!-- cd-timeline-block -->



		<div class="cd-timeline-block">

			<div class="cd-timeline-img cd-picture">

				<img src="<?php get_theme_url(); ?>/images/buddha-sm.gif" alt="Meditationsende">

			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">

				<h2>Diskussion / Vortrag</h2>

				<p><?php get_component('timeline3'); ?></p>

				<span class="cd-date">20:15 - 21:00 Uhr</span>

			</div> <!-- cd-timeline-content -->

		</div> <!-- cd-timeline-block -->



		<div class="cd-timeline-block">

			<div class="cd-timeline-img cd-movie">

				<img src="<?php get_theme_url(); ?>/images/buddha-sm.gif" alt="Abschluss">

			</div> <!-- cd-timeline-img -->



			<div class="cd-timeline-content">

				<h2>Abschluss</h2>

				<p><?php get_component('timeline4'); ?></p>

				<span class="cd-date">21.00 - 21:45 Uhr</span>

			</div> <!-- cd-timeline-content -->

		</div> <!-- cd-timeline-block -->

	</section>