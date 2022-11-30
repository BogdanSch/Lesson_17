<?php
require_once "data.php";

$city = $_POST['name'];
$w_decode = null;

try {
  $city = $_GET['city'];
  $weather_city = @file_get_contents('https://api.openweathermap.org/data/2.5/weather?q='.$city.'&APPID=fada024d74ea8c82c596e30e55e3f9d1&units=metric');
  $w_decode = json_decode($weather_city);
} catch (Exception $e) {
  echo "Error!";
}

$text = "In country {$w_decode->sys->country} the weather status is {$w_decode->weather[0]->main}%0A";
$text .= "The temperature is {$w_decode->main->temp} C %0A";

$sendToTelegram = fopen("https://api.telegram.org/bot".TOKEN."/sendMessage?chat_id=".CHAT_ID."&parse_mode=html&text={$text}","r"); 

if ($sendToTelegram) {
  echo "OK";
} else {
  echo "Error can't send your message";
}