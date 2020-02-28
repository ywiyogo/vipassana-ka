<?php
$file = file_get_contents('../../data/uploads/calendar/events.json');
$data = json_decode($file, true);


if (isset($_POST["delete"]) && !empty($_POST) ) {

    $pass = $_POST['pass'];
    $serverPass = "MyPassword123";

    if ($pass == $serverPass)
    {

        $file = file_get_contents('../../data/uploads/calendar/events.json');
        $data = json_decode($file, true);
        $event_id = $_POST['event_id'];

        foreach ($data as $key => $entry) {
            if ($entry['id'] == $event_id ) {
                unset($data[$key]);

                unset($_POST["json"]);
                unset($_POST["pass"]);
                file_put_contents("../../data/uploads/calendar/events.json", json_encode($data));
                echo 'Der Eintrag ist erfolgreich gelöscht!';
                exit();
            }

        }
    }
    else
    {
        echo 'Falsches Passwort! Die Veranstaltung wird nicht abgespeichert.';
    }
}
?>