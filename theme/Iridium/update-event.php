<?php
$file = file_get_contents('../../data/uploads/calendar/events.json');
$data = json_decode($file, true);


if (isset($_POST["json"]) && !empty($_POST)  && isset($_POST["update"])) {

    $pass = $_POST['pass'];
    $serverPass = "MyPassword123";

    if ($pass == $serverPass)
    {
        $file = file_get_contents('../../data/uploads/calendar/events.json');
        $data = json_decode($file, true);
        $jsonString = $_POST["json"];
        $json =json_decode($jsonString, true);

        foreach ($data as $key => $entry) {
            if ($entry['id'] === $json[0]['id'] ) {
                $data[$key]['title'] = $json[0]['title'];
                $data[$key]['location'] = $json[0]['location'];
                $data[$key]['speaker'] = $json[0]['speaker'];
                $data[$key]['start'] = $json[0]['start'];
                $data[$key]['end'] = $json[0]['end'];
                break;
            }
        }


        unset($_POST["json"]);
        unset($_POST["pass"]);
        file_put_contents("../../data/uploads/calendar/events.json", json_encode($data));
        echo 'Vielen Dank! Der Eintrag ist aktualisiert';
        exit();
    }
    else
    {
        echo 'Falsches Passwort! Die Veranstaltung wird nicht abgespeichert.';
    }
}
?>