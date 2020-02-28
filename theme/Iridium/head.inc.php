<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); }
/****************************************************
*
* @File: 		head.inc.php
* @Package:		GetSimple
* @Action:		Iridium theme for GetSimple CMS
*
*****************************************************/
?>

<!-- Site Title -->

<title><?php get_page_clean_title(); ?> &mdash; <?php get_site_name(); ?> - Buddhismus in Karlsruhe</title>

<!--meta name="robots" content="noindex"/-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="Wir sind eine buddhistische Meditationsgruppe in Karlsruhe, die buddhistische Lehre im Raum Karlsruhe praktiziert. Wir diskutieren über Buddhismus und Achtsamkeit im Alltag und offen für alle buddhistischen Richtungen.">
<meta name="keywords" content="Buddhismus Karlsruhe, Buddhismus, Meditation, buddhistische Meditation, Dharma, Vipassana Meditation, Metta Meditation, Achtsamkeit Karlsruhe, Einsichtmeditation Karlsruhe, samatha" />

<!--[if lte IE 8]><script src="<?php get_theme_url(); ?>js/html5shiv.js"></script><![endif]-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="<?php get_theme_url(); ?>/js/skel.min.js"></script>
<script src="<?php get_theme_url(); ?>/js/skel-panels.min.js"></script>
<script> var prefixUrl = '<?php get_theme_url(); ?>'; </script>
<script src="<?php get_theme_url(); ?>/js/init.js"></script>

<noscript>
	<link rel="stylesheet" href="<?php get_theme_url(); ?>/css/skel-noscript.css" />
	<link rel="stylesheet" href="<?php get_theme_url(); ?>/css/style.css" />
	<link rel="stylesheet" href="<?php get_theme_url(); ?>/css/style-desktop.css" />
	<link rel="icon" href="<?php get_theme_url(); ?>/images/buddha1.gif">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</noscript>

<!--[if lte IE 8]><link rel="stylesheet" href="<?php get_theme_url(); ?>css/ie/v8.css" /><![endif]-->
<!--[if lte IE 9]><link rel="stylesheet" href="<?php get_theme_url(); ?>css/ie/v9.css" /><![endif]-->

<?php if (return_page_slug()=='aktuelles') include('head-calendar.inc.php');?>

<?php get_header(); ?>