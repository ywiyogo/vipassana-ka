<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); }

/****************************************************

*

* @File:       fullcalendar.inc.php

* @Package:    GetSimple

* @Action:     Iridium theme for GetSimple CMS

* @Note:        Add/Edit a calendar in main.js

*

*****************************************************/

?>

<link href='<?php get_theme_url(); ?>/fullcalendar3.0.1/fullcalendar.css' rel='stylesheet' />
<link href='<?php get_theme_url(); ?>/fullcalendar3.0.1/fullcalendar.print.css' rel='stylesheet' media='print' />
<link rel="stylesheet" href="theme/Iridium/css/bootstrap-iso.css" />
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.16.0/moment.min.js'></script>
<script src='<?php get_theme_url(); ?>/js/jquery311.min.js'></script>
<script src='<?php get_theme_url(); ?>/fullcalendar3.0.1/fullcalendar.min.js'></script>
<script src='<?php get_theme_url(); ?>/fullcalendar3.0.1/locale/de.js'></script>
<script src='<?php get_theme_url(); ?>/fullcalendar3.0.1/gcal.js'></script>
<script src='<?php get_theme_url(); ?>/js/bootstrap.min.js'></script>
<script>
   var jQuery_311 = $.noConflict(true);
   jQuery_311(document).ready(function() {
      var newEvents = [];
      jQuery_311('#calendar').fullCalendar({
         header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listMonth'
         },
         locale: 'de',
         selectable: true,
         longPressDelay: 600,
         selectLongPressDelay: 600,
         googleCalendarApiKey: 'AIzaSyDNR626LF_3ydUGSndUw8Q52xP9F8iKyo8',
         events: 'de.german#holiday@group.v.calendar.google.com',
         selectHelper: true,
          eventClick: function(calEvent, jsEvent, view) {

                console.log(calEvent);

                  var id = calEvent.id;
                  var title = calEvent.title;
                  var location = calEvent.location;
                  var speaker = calEvent.speaker;
                  var dateStart = moment.utc(calEvent.start._d).format('DD-MM-YYYY HH:mm:ss');
                  var dateEnd = moment.utc(calEvent.end._d).format('DD-MM-YYYY HH:mm:ss');
                  //var dateStart =  moment.utc(calEvent.start._d).format('DD-MM-YYYY HH:mm:ss');
                  //var dateEnd = moment(dateStart, "DD-MM-YYYY HH:mm:ss").add(1, 'days');

                  jQuery_311('#single-event-modal .modal-title, #delete-event-modal .modal-title').text(id),
                  jQuery_311('#single-event-modal, #delete-event-modal').find('input[name=title]').val(title),
                  jQuery_311('#single-event-modal, #delete-event-modal').find('input[name=location]').val(location),
                  jQuery_311('#single-event-modal, #delete-event-modal').find('input[name=speaker]').val(speaker),
                  jQuery_311('#single-event-modal, #delete-event-modal').find('input[name=evtStart]').val(dateStart);
                 // jQuery_311('#single-event-modal, #delete-event-modal').find('input[name=evtEnd]').val(dateEnd);
                  jQuery_311('#single-event-modal, #delete-event-modal').find('input[name=evtEnd]').val(moment(dateEnd, 'DD-MM-YYYY HH:mm:ss').format('DD-MM-YYYY HH:mm:ss' ));



              jQuery_311('#single-event-modal').modal('show');

              jQuery_311("#delete-event").on('click', function(ev) {
                  jQuery_311('#delete-event-modal').modal('show');
              });

              jQuery_311("#delete-event-modal").find('form').on('submit', function(ev) {
                  var form = $(this);
                  ev.preventDefault();

                  if (form.data('requestRunning')) {
                      return;
                  }
                  form.data('requestRunning', true);

                  var eventPass = jQuery_311('#delete-event-modal').find('input[name=passwd]').val();
                  jQuery_311.ajax({
                      url: '<?php get_theme_url(); ?>/delete-event.php',
                      data: { pass: eventPass, event_id: id, delete: true },
                      type: 'POST',
                      traditional: true,
                      success: function(response) {
                          jQuery_311("#delete-event-modal").modal('hide');

                          //disable event handler of the form to avoid double add-event post !!
                          jQuery_311("#delete-event-modal").find('form').off();
                          alert(response );
                          // refetch event source, so event will be showen in calendar
                          jQuery_311("#calendar").fullCalendar( 'refetchEvents' );
                      },
                      complete: function() {
                          form.data('requestRunning', false);
                      },
                      error: function (textStatus, errorThrown) {
                          //debugger;
                          jQuery_311('#delete-event-modal').find('input[name=title]').val('');
                          jQuery_311('#delete-event-modal').find('input[name=location]').val('');
                          jQuery_311('#delete-event-modal').find('input[name=speaker]').val('');
                          jQuery_311('#delete-event-modal').find('input[name=passwd]').val('');
                          alert(textStatus+ errorThrown );} });

              });

              jQuery_311("#single-event-modal").find('form').on('submit', function(ev) {
                  var form = $(this);
                  ev.preventDefault();

                  if ( form.data('requestRunning') ) {
                      return;
                  }
                  form.data('requestRunning', true);

                  eventData = {
                      id: id,
                      title: jQuery_311('#single-event-modal').find('input[name=title]').val(),
                      location: jQuery_311('#single-event-modal').find('input[name=location]').val(),
                      speaker: jQuery_311('#single-event-modal').find('input[name=speaker]').val(),
                      start: jQuery_311('#single-event-modal').find('input[name=evtStart]').val(),
                      end: jQuery_311('#single-event-modal').find('input[name=evtEnd]').val(),
                  };
                  var eventPass = jQuery_311('#single-event-modal').find('input[name=passwd]').val();

                  newEvents.push(eventData);
                  jQuery_311.ajax({

                      url: '<?php get_theme_url(); ?>/update-event.php',
                      data:{pass: eventPass, update: true, json: JSON.stringify(newEvents)},
                      type: 'POST',
                      traditional: true,
                      success: function(response) {
                          window.location.reload(); // reload window
                          // if saved, close modal
                          jQuery_311('#single-event-modal').find('input[name=title]').val('');
                          jQuery_311('#single-event-modal').find('input[name=location]').val('');
                          jQuery_311('#single-event-modal').find('input[name=speaker]').val('');
                          jQuery_311('#single-event-modal').find('input[name=passwd]').val('');
                          jQuery_311("#single-event-modal").modal('hide');
                          //clean newEvents
                          newEvents = [];
                          //disable event handler of the form to avoid double add-event post !!
                          jQuery_311("#event-modal").find('form').off();
                          alert(response );
                          // refetch event source, so event will be showen in calendar
                          jQuery_311("#calendar").fullCalendar( 'refetchEvents' );
                      },
                      complete: function() {
                          form.data('requestRunning', false);
                      },

                      error: function (textStatus, errorThrown) {
                          //debugger;
                          jQuery_311('#event-modal').find('input[name=title]').val('');
                          jQuery_311('#event-modal').find('input[name=location]').val('');
                          jQuery_311('#event-modal').find('input[name=speaker]').val('');
                          jQuery_311('#event-modal').find('input[name=passwd]').val('');
                          alert(textStatus+ errorThrown );} });

                  jQuery_311('#calendar').fullCalendar('unselect');
              });

          },
          dayClick: function(date, jsEvent, view) {

              var eventData;
              var startDate =  date.format('DD-MM-YYYY HH:mm:ss');
              var endDate = moment(startDate, "DD-MM-YYYY HH:mm:ss").add(1, 'days');
              jQuery_311('#event-modal').find('input[name=evtStart]').val(
                  startDate
              );
              jQuery_311('#event-modal').find('input[name=evtEnd]').val(
                  endDate.format("DD-MM-YYYY HH:mm:ss")
              );
              jQuery_311('#event-modal').modal('show');

              jQuery_311("#event-modal").find('form').on('submit', function(ev) {
                  var form = $(this);
                  ev.preventDefault();

                  if ( form.data('requestRunning') ) {
                      return;
                  }

                  form.data('requestRunning', true);

                  var evStart, evEnd;
                  var dateStart = moment(jQuery_311('#event-modal').find('input[name=evtStart]').val(), 'DD-MM-YYYY HH:mm:ss').format('YYYY-MM-DD HH:mm:ss');
                  var dateEnd = moment(jQuery_311('#event-modal').find('input[name=evtEnd]').val(), 'DD-MM-YYYY HH:mm:ss').format('YYYY-MM-DD HH:mm:ss');
                  if (dateStart.includes('00:00:00') && dateEnd.includes('00:00:00'))
                  {
                      evStart = moment(dateStart, 'YYYY-MM-DD HH:mm:ss').format('YYYY-MM-DD');
                      evEnd = moment(dateEnd, 'YYYY-MM-DD HH:mm:ss').format('YYYY-MM-DD');
                  }
                  eventData = {
                      id: Math.round(new Date().getTime() + (Math.random() * 100)), // unique ID
                      title: jQuery_311('#event-modal').find('input[name=title]').val(),
                      location: jQuery_311('#event-modal').find('input[name=location]').val(),
                      speaker: jQuery_311('#event-modal').find('input[name=speaker]').val(),
                      start: dateStart,
                      end: dateEnd
                  };
                  //console.log(moment(jQuery_311('#event-modal').find('input[name=evtStart]').val()).format('YYYY-MM-DD HH:mm:ss'));
                  var eventPass = jQuery_311('#event-modal').find('input[name=passwd]').val();

                  newEvents.push(eventData);
                  jQuery_311.ajax({

                      url: '<?php get_theme_url(); ?>/add-events.php',
                      //url: 'http://localhost/vipassana/theme/Iridium/add-events.php',

                      data:{pass: eventPass, json: JSON.stringify(newEvents)},
                      type: 'POST',
                      traditional: true,
                      success: function(response) {

                          console.log('success', form.data);
                          // if saved, close modal
                          jQuery_311('#event-modal').find('input[name=title]').val('');
                          jQuery_311('#event-modal').find('input[name=location]').val('');
                          jQuery_311('#event-modal').find('input[name=speaker]').val('');
                          jQuery_311('#event-modal').find('input[name=passwd]').val('');
                          jQuery_311("#event-modal").modal('hide');
                          //clean newEvents
                          newEvents = [];
                          //disable event handler of the form to avoid double add-event post !!
                          jQuery_311("#event-modal").find('form').off();
                          alert(response );
                          // refetch event source, so event will be showen in calendar
                          jQuery_311("#calendar").fullCalendar( 'refetchEvents' );
                      },
                      complete: function() {
                          form.data('requestRunning', false);
                      },

                      error: function (textStatus, errorThrown) {
                          //debugger;
                          jQuery_311('#event-modal').find('input[name=title]').val('');
                          jQuery_311('#event-modal').find('input[name=location]').val('');
                          jQuery_311('#event-modal').find('input[name=speaker]').val('');
                          jQuery_311('#event-modal').find('input[name=passwd]').val('');
                          alert(textStatus+ errorThrown );} });

                  jQuery_311('#calendar').fullCalendar('unselect');
              });

          },

          /*
         select: function( start, end, jsEvent, view ) {
            var eventData;
            jQuery_311('#event-modal').find('input[name=evtStart]').val(
               start.format('DD-MM-YYYY HH:mm:ss')
               );
            jQuery_311('#event-modal').find('input[name=evtEnd]').val(
               end.format('DD-MM-YYYY HH:mm:ss')
               );
            jQuery_311('#event-modal').modal('show');

            jQuery_311("#event-modal").find('form').on('submit', function(ev) {
                var form = $(this);
                ev.preventDefault();

                if ( form.data('requestRunning') ) {
                    return;
                }

                form.data('requestRunning', true);

                var evStart, evEnd;
               var dateStart = moment(jQuery_311('#event-modal').find('input[name=evtStart]').val(), 'DD-MM-YYYY HH:mm:ss').format('YYYY-MM-DD HH:mm:ss');
               var dateEnd = moment(jQuery_311('#event-modal').find('input[name=evtEnd]').val(), 'DD-MM-YYYY HH:mm:ss').format('YYYY-MM-DD HH:mm:ss');
               if (dateStart.includes('00:00:00') && dateEnd.includes('00:00:00'))
               {
                  evStart = moment(dateStart, 'YYYY-MM-DD HH:mm:ss').format('YYYY-MM-DD');
                  evEnd = moment(dateEnd, 'YYYY-MM-DD HH:mm:ss').format('YYYY-MM-DD');
               }
               eventData = {
                  title: jQuery_311('#event-modal').find('input[name=title]').val(),
                  location: jQuery_311('#event-modal').find('input[name=location]').val(),
                  speaker: jQuery_311('#event-modal').find('input[name=speaker]').val(),
                  start: dateStart,
                  end: dateEnd
               };
                  //console.log(moment(jQuery_311('#event-modal').find('input[name=evtStart]').val()).format('YYYY-MM-DD HH:mm:ss'));
                  var eventPass = jQuery_311('#event-modal').find('input[name=passwd]').val();

                  newEvents.push(eventData);
                  jQuery_311.ajax({

                     url: '<?php //get_theme_url(); ?>/add-events.php',
                     //url: 'http://localhost/vipassana/theme/Iridium/add-events.php',

                     data:{pass: eventPass, json: JSON.stringify(newEvents)},
                     type: 'POST',
                     traditional: true,
                     success: function(response) {

                         console.log('success', form.data);
                        // if saved, close modal
                        jQuery_311('#event-modal').find('input[name=title]').val('');
                        jQuery_311('#event-modal').find('input[name=location]').val('');
                        jQuery_311('#event-modal').find('input[name=speaker]').val('');
                        jQuery_311('#event-modal').find('input[name=passwd]').val('');
                        jQuery_311("#event-modal").modal('hide');
                        //clean newEvents
                        newEvents = [];
                        //disable event handler of the form to avoid double add-event post !!
                        jQuery_311("#event-modal").find('form').off();
                        alert(response );
                        // refetch event source, so event will be showen in calendar
                        jQuery_311("#calendar").fullCalendar( 'refetchEvents' );
                     },
                      complete: function() {
                          form.data('requestRunning', false);
                      },

                     error: function (textStatus, errorThrown) {
                        //debugger;
                        jQuery_311('#event-modal').find('input[name=title]').val('');
                        jQuery_311('#event-modal').find('input[name=location]').val('');
                        jQuery_311('#event-modal').find('input[name=speaker]').val('');
                        jQuery_311('#event-modal').find('input[name=passwd]').val('');
                        alert(textStatus+ errorThrown );} });

                  jQuery_311('#calendar').fullCalendar('unselect');
               });
         }, */
         editable: true,
         navLinks: true, // can click day/week names to navigate views
         eventLimit: true, // allow "more" link when too many events
         weekNumbers: true,
         weekNumbersWithinDays: true,
         weekNumberCalculation: 'ISO',
         eventRender: function(event, element) {
            var strSpeaker= ["Vorträger: ", event.speaker].join("");
            var strLocation= ["Ort: ", event.location].join("");
            event.title = event.title;
            /*element.attr("Vorträger",event.speaker)*/
         },
         events: { //loading events
            //url: 'http://localhost/vipassana/theme/Iridium/get-events.php',
            url: '<?php get_theme_url(); ?>/get-events.php',
            success: function (response) {
                 // console.log(response);
               },
               error: function() {
                  jQuery_311('#script-warning').show();
               }
            },
            loading: function(bool) {
               jQuery_311('#loading').toggle(bool);
            }
         });

jQuery_311(function () {
   jQuery_311("#saveButton").click(function () {
      var myPasswd = document.getElementById('savePassword').value;
      var $form = $(this);

      if ($form.data('submitted') === true) {
               // Previously submitted - don't submit again
               e.preventDefault();
            } else {
               // Mark it so that the next submit can be ignored
               //Avoiding multiple submit!
               //thanks to http://stackoverflow.com/questions/2830542/prevent-double-submission-of-forms-in-jquery
               $form.data('submitted', true);

               jQuery_311.ajax(
               {
                  url: '<?php get_theme_url(); ?>/add-events.php',
                  type: 'POST',
                  traditional: true,
                  data: {pass: myPasswd, json: JSON.stringify(newEvents)},
                  success: function (response) {
                     newEvents = []; //clean newEvents
                     $("#event-modal").find('form').off();
                     myPasswd = "";
                     alert(response);

                  },
                  error: function (xhr,textStatus, errorThrown) {
                     //debugger;
                     alert(textStatus+ errorThrown);
                  }
               });
            }
         });
});
});
</script>
<style>
   #script-warning {
      display: none;
      background: #eee;
      border-bottom: 1px solid #ddd;
      padding: 0 10px;
      line-height: 40px;
      text-align: center;
      font-weight: bold;
      font-size: 12px;
      color: red;
   }

   #loading {
      display: none;
      position: absolute;
      top: 10px;
      right: 10px;
   }

   #calendar {
      max-width: 900px;
      margin: 40px auto;
      padding: 0 10px;
   }
</style>