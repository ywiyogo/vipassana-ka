jQuery(document).ready(function($){

	var $timeline_block = $('.cd-timeline-block');
	//hide timeline blocks which are outside the viewport

	$timeline_block.each(function(){

		if($(this).offset().top > $(window).scrollTop()+$(window).height()*0.75) {

			$(this).find('.cd-timeline-img, .cd-timeline-content').addClass('is-hidden');

		}

	});

	//on scolling, show/animate timeline blocks when enter the viewport

	$(window).on('scroll', function(){

		$timeline_block.each(function(){

			if( $(this).offset().top <= $(window).scrollTop()+$(window).height()*0.75 && $(this).find('.cd-timeline-img').hasClass('is-hidden') ) {

				$(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');

			}

		});

	});

	var d = new Date();

	var n = d.getDate()-1; 

	var count= 0;

	var quotes = [
{"quote":"Ihr selbst müsst euch Mühe geben, die Erwachten weisen nur den Weg", "source":"Buddha"},
{"quote":"Blick in dein Inneres. Da ist die Quelle des Guten, die niemals aufhört zu sprudeln, wenn du nicht aufhörst zu graben.", "source":"Marc Aurel"},
{"quote":"Willst Du wissen, wer Du warst, so schau, wer Du bist. Willst Du wissen, wer Du sein wirst, so schau, was Du tust.", "source":"Buddha"},
{"quote":"Meditation heißt, den Geist zur Ruhe zu bringen, um Weisheit entstehen zu lassen.", "source":"Ajahn Chah"},
{"quote":"Es gibt keinen Weg zum Glück. Glücklich - sein ist der Weg.", "source":"Buddha"},
{"quote":"Sie sollten nur endlich aufhören, sich ausschließlich auf die negativen Aspekte zu konzentrieren.", "source":"Ajahn Brahm"},
{"quote":"Wenn du verlierst, verlier nicht, was du daraus lernst.", "source":"Dalai Lama"},
{"quote":"Du lächelst - und die Welt verändert sich.", "source":"Buddha"},
{"quote":"Es nützt nichts, ein guter Mensch zu sein, wenn man nichts tut.", "source":"Buddha"},
{"quote":"Fordere viel von dir selbst und erwarte wenig von anderen. So bleibt dir so mancher Ärger erspart.", "source":"Konfuzius"},
{"quote":"Die Bewegung des Lebens ist Lernen.", "source":"Buddha"},
{"quote":"Respektiere dich selbst. Respektiere die anderen und übernimm Verantwortung für alles was du tust.", "source":"Dalai Lama"},
{"quote":"Glück ist allein der innere Friede. Lern ihn finden. Du kannst es. Überwinde dich selbst und du wirst die Welt überwinden.", "source":"Buddha"},
{"quote":"Wenn du nicht bekommst, was du willst, erinnere dich daran, dass das manchmal dein Glück sein kann.", "source":"Dalai Lama"},
{"quote":"Indem man über andere schlecht redet, macht man sich selbst nicht besser.", "source":"Zen"},
{"quote":"Das Allerwichtigste ist, dass ihr euch des Lebens freuen könnt, ohne euch von den Dingen irreführen zu lassen.", "source":"Shunryu Suzuki"},
{"quote":"Das Geheimnis des Lebens ist kein Problem, das gelöst werden kann, sondern eine Realität, die erfahren werden muss.", "source":"Alan Watts"},
{"quote":"Wir betrachten die Dinge durch unsere gefärbte Brille. Die Welt, mit der wir zufrieden sind, und die Welt, mit der wir unzufrieden sind, haben wir selbst fabriziert.", "source":"Kodo Sawaki"},
{"quote":"Glück is gleich Realität minus Erwartungen.", "source":"Rakesh Sarin"},
{"quote":"Love is not liking somebody. Anyone can do that. Love is loving things that sometimes you don't like.", "source":"Ajahn Brahm"},
{"quote":"Es geht nicht darum, andere oder die Welt zu ändern, sondern darum, den eigenen Geist zu meistern.", "source":"Gendün Rinpoche"},
{"quote":"Lerne rechtzeitig, die Dinge loszulassen. Darin liegt der Schlüssel zur wahren Glückseligkeit.", "source":"Buddha"},
{"quote":"Wie lange füllen wir unsere Taschen wie Kinder mit Dreck und Steinen? Lasst diese Welt los. Sie festlhaltend werden wir nie uns selbst erkenne, nie flügge sein.", "source":"Rumi"},
{"quote":"Wer selbst keinen inneren Frieden kennt, wird auch in der Begegnung mit anderen Menschen keinen Frieden finden.", "source":"14. Dalai Lama"},
{"quote":"Am Ende des Lebens wird die wichtige  Frage nicht sein, \"Wie sehr sind wir geliebt werden?\", sondern \"Wie sehr haben wir geliebt?\".", "source":"Drugpa Rinpoche"},
{"quote":"Die einzige Weise, wie wir Frieden in unseren eigenen Herzen finden können, besteht darin, dass wir uns selbst, nicht die Welt ändern.", "source":"Ayya Khema"},
{"quote":"Warum unglücklich sein über etwas, das man ändern kann? Und was hilft es unglücklich zu sein, wenn es sich nicht ändern lässt?", "source":"Shantideva"},
{"quote":"Wenn Du die Natur der Angst nicht verstehst wirst Du Furchlosigkeit nie erleben.", "source":"Shambala Buddhismus"},
{"quote":"Es gibt keine Möglichkeit, deinen Geist zu beherrschen, wenn du deinen Mund nicht beherrschen kannst.", "source":"Ajahn Fuang Jotiko"},
{"quote":"Niemals in der Welt hört Hass durch Hass auf. Hass hört durch Liebe auf.", "source":"Buddha"},
{"quote":"Wonach suchst du? Nach Glück, Liebe, Seelenfrieden. Suche nicht am anderen Ende der Welt danach, sonst wirst du enttäuscht, verbittert und verzweifelt zurückkehren. Suche am anderen Ende deiner selbst danach, in der Tiefe des Herzens.", "source":"Drugpa Rinpoche"},
{"quote":"Wer sich zu groß fühlt, um kleine Aufgaben zu erfüllen, ist zu klein, um mit großen betraut zu werden.", "source":"Buddha"}		
];
    var changed = document.getElementById('quote');
	n = n % quotes.length;
	if(changed)
	{
    	changed.innerHTML = quotes[n].quote + "<br/>" + "<cite>- "+quotes[n].source+" -</cite>" ;
	}
});



(function() {

	// Create input element for testing

	var inputs = document.createElement('input');

	// Create the supports object

	var supports = {};

	supports.autofocus   = 'autofocus' in inputs;

	supports.required    = 'required' in inputs;

	supports.placeholder = 'placeholder' in inputs;

	// Fallback for autofocus attribute

	if(!supports.autofocus) {

}

	// Fallback for required attribute

	if(!supports.required) {

	}
	// Fallback for placeholder attribute

	if(!supports.placeholder) {
	}

	// Change text inside send button on submit

	var send = document.getElementById('contact-submit');

	if(send) {

		send.onclick = function () {

			this.innerHTML = '...Sending';

		}

		var senderemail = document.getElementById('contact-email').value;

		var sig = document.getElementById('contact-name').value;

		var msg= document.getElementById('contact-message').value;

		 //concatenate to string to build URL

		var url = "mailto:info@yupsilon.de?subject=Message from" + senderemail + '&body='+ msg;

		location.href = url;

	}



})();
