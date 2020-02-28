<?php
$json = $_POST['json'];
$pass = $_POST['pass'];
$serverPass = "MyPassword123";
if ($pass == $serverPass)
{
 /* sanity check */
 if (json_decode($json) != null)
 {
  $file = fopen('json/events.json','w+');
  fwrite($file, $json);
  fclose($file);
  echo 'Die Veranstaltung is erfolgreich abgespeichert';
}
else
{
     // user has posted invalid JSON, handle the error
 echo 'Daten ungültig';
}
}
else
{
 echo 'Sie haben ein falsches Password eingegeben!';
}
?>