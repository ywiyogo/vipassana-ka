<?php
$file = file_get_contents('../../data/uploads/calendar/events.json');
$data = json_decode($file, true);


if (isset($_POST["json"]) && !empty($_POST) ) {

  $pass = $_POST['pass'];
  $serverPass = "MyPassword123";

  if ($pass == $serverPass)
  {
      $file = file_get_contents('../../data/uploads/calendar/events.json');
      $data = json_decode($file, true);
      $jsonString = $_POST["json"];
      $json =json_decode($jsonString, true);

      $data = array_merge($data, $json);
      if ( !isset($data)){
          $data = $json;
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