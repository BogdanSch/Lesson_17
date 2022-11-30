<?php
//Переменные $name, $phone, $mail получают данные из формы
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$txt = $_POST['text'];
//полученный ранее токен
$token = "5905266041:AAE2FKYS1W2aK95BEd_SB_L2G3iuWywYJV8"; 
//полученный ранее chat_id
$chat_id = "685851473"; 
//В массив $arr помещаем полученную информацию 
$arr = array(
  'Имя пользователя: ' => $name,
  'Телефон: ' => $phone,
  'Email' => $email,
  "text" => $txt
);
$text = "";
//При помощи цикла foreach формируем строку $text из данных массива $arr
foreach($arr as $key => $value) {
  $text .= "<b>".$key."</b> ".$value."%0A";
}; 
//Отправка данных
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$text}","r"); 
//Если сообщение отправлено - "OK", если нет - "Error"
if ($sendToTelegram) {
  echo "OK";
} else {
  echo "Error";
}