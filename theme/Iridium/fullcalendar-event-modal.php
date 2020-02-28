<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); }

/****************************************************

 *

 * @File:       fullcalendar-modal.inc.php

 * @Package:    GetSimple

 * @Action:     Iridium theme for GetSimple CMS

 * @Note:        Add/Edit a calendar in main.js

 *

 *****************************************************/
?>
<div class="bootstrap-iso">
    <div class="modal fade" id="single-event-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Edit Veranstaltung</h4>
                </div>
                <div class="modal-body">
                    <form name="save-event" method="POST">
                        <div class="form-group">
                            <label>Titel</label>
                            <input type="text" name="title" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label>Vorträger</label>
                            <input type="text" name="speaker" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label>Ort</label>
                            <input type="text" name="location" class="form-control" />
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Begin</label>
                                <input type="text" name="evtStart" class="form-control col-xs-3" />
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Ende</label>
                                <input type="text" name="evtEnd" class="form-control col-xs-3" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Passwort</label>
                            <input type="text" name="passwd" class="form-control col-xs-3" required />
                        </div><br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Abbrechen</button>
                            <button type="submit" class="btn btn-primary">update</button>
                        </div>
                    </form>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>