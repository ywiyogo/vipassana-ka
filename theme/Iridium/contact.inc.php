<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); } 

/****************************************************

*

* @File: 		contact.inc.php

* @Package:		GetSimple

* @Action:		Iridium theme for GetSimple CMS

*

*****************************************************/

?>

<!-- Contact field -->

<div id="contact">

	<div class="container">

		<div class="row">

			<section class="8u -2u">

				<header>

				<h2>Kontakt</h2>

				</header>

				<div class="row half collapse-at-2">

				<div class="7u">

				<form method="post" accept-charset="UTF-8" action="<?php get_theme_url(); ?>/process.php" onsubmit="var text = document.getElementById('contact-message').value; if(text.length < 10) { alert('Die Nachricht ist zu kurz'); return false; } return true;">

					<div class="row half collapse-at-2">

					<div class="6u">

					<input name="name" id="contact-name" pattern="[A-Za-z,\s]{2,50}" placeholder="Name" type="text" value="<?php echo $name;?>" required>

					<span class="error"> <?php echo $nameErr;?></span>

					</div>

					<div class="6u">

					<input name="email" id="contact-email" pattern="^[\w-\.]+@[a-zA-Z_]+?\.[a-zA-Z]{2,4}$" title="Emailadresse is nicht richtig angegeben" placeholder="Email" type="email" value="<?php echo $email;?>" required>

					<span class="error"> <?php echo $emailErr;?></span>

					</div>

					</div>

					<div class="row half">

					<div class="12u">

					<textarea name="message" id="contact-message" id="comment" placeholder="Nachrichten" rows="5" value="<?php echo $message;?>" required></textarea>
					
					<p> Mit der Nutzung des Kontaktformulars erkläre ich mich mit der <a href="/datenschutz">Datenschutzerklärung des Vipassana-Gruppe Karlsruhe e.V. </a> einverstanden. </p>
					</div>

					</div>

					<div class="row half">

					<div class="12u">

					<div class="actions">

					<input id="sendbutton" name="submitform" value="Senden" type="submit">

					</div>
						<p></p>

					</div>

					</div>

				</form>

				</div>	

				<div class="5u">

					<p>Vipassana-Gruppe Karlsruhe e.V. <br>
						<br>
						<i class="fas fa-phone"></i> &nbsp; 0721-827224 <br>
						<i class="fas fa-envelope"></i> &nbsp; <a href="mailto:info@vipassana-karlsruhe.info">info@vipassana-karlsruhe.info</a>
					</p>
					

				</div>
				</div>
				<h1>Treffpunkt des Meditationsabends</h1>
				<i class="fa fa-users fa-lg"></i> <a href="https://osm.org/go/0DPvpaY0O?m=&way=108832347">Lachnerstr. 7, 76131 Karlsruhe </a>
				<br/>
				<iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=8.41831684112549%2C49.00691665068619%2C8.421857357025148%2C49.00843150811774&amp;layer=mapnik&amp;marker=49.007673800050505%2C8.420086300000094" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/?mlat=49.00767&amp;mlon=8.42009#map=19/49.00767/8.42009">Größere Karte anzeigen</a></small>
				
			</section>

		</div>

	</div>

</div>