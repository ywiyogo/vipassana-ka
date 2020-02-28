<section id="mainCalendar">

<header>

	<h2><?php if (return_page_slug()=='index')echo 'Event Kalender';?></h2>

</header>



<?php if (return_page_slug()=='index') { c_calendarEvents(5); } ?>

<link type="text/css" href="<?php get_site_url(); ?>/plugins/calendar/css/calendar.css" rel="stylesheet" />

<table id="calendar">

	<tr>        

	<th><?php i18n('calendar/Mo'); ?></th>

	<th><?php i18n('calendar/Tu'); ?></th>

	<th><?php i18n('calendar/We'); ?></th>

	<th><?php i18n('calendar/Th'); ?></th>

	<th><?php i18n('calendar/Fr'); ?></th>

	<th><?php i18n('calendar/Sa'); ?></th>

	<th class="sunday"><?php i18n('calendar/Su'); ?></th>

	</tr>

	<?php

	$xml = simplexml_load_file(GSDATAOTHERPATH.'/calendar.xml');

	$page = $xml->page;

	c_monthChange('index.php?id='.return_page_slug());

	c_calendar($_GET['month'], $_GET['year'], 'index.php?id='.return_page_slug().'&event=');

	?>

</table>

	<br>

	<p><strong> Ein Thema für den wöchenlichen Meditationsabend beitragen </strong>

	</p>

	<form>

	<div class="row half collapse-at-2">

		<div class="4u">

			<!-- Pikaday script in footer.inc.php -->

			<input name="Datum" id="datepicker-2months" class="validate[required,custom[text]] feedback-input" placeholder="<?php $mydate=getdate(date("U")); echo "$mydate[mday].$mydate[mon].$mydate[year]"; ?>" type="date" required>

		</div>

		<div class="8u">

			<input name="Themen" id="themen" class="validate[required,custom[text]] feedback-input" placeholder="Name: Themen" type="text" required>

		</div>

	</div>

		<div class="3u">

		<input id="beitragen" name="beitragen" type="submit">

		</div>

	</form>

</section>