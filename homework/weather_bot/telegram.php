<?php
require_once "data.php";

$city = null;
$w_decode = null;

try {
  $city = $_POST['city'];
  $weather_city = @file_get_contents('https://api.openweathermap.org/data/2.5/weather?q='.$city.'&APPID=fada024d74ea8c82c596e30e55e3f9d1&units=metric');
  $w_decode = json_decode($weather_city);

  $text = "In city {$city} the weather status is {$w_decode->weather[0]->main}%0A";
  $text .= "The temperature is {$w_decode->main->temp} C %0A";

  $sendToTelegram = fopen("https://api.telegram.org/bot".TOKEN."/sendMessage?chat_id=".CHAT_ID."&parse_mode=html&text={$text}","r"); 

  if ($sendToTelegram) {
    echo "Already sent";
  } else {
    echo "Error can't send your message";
  }
} catch (Exception $e) {
  echo "Error please enter city correct!";
}