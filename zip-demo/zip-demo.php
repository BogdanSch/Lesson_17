<?php

// $zip = new ZipArchive(); //Создаём объект для работы с ZIP-архивами
// $arch = "archive.zip";
// $zip->open($arch, ZIPARCHIVE::CREATE); 
// echo "Открываем (создаём) архив ".$arch;
// $file1 = "index.html";
// $file2 = "style.css";
// $zip->addFile($file1); 
// echo "Добавляем в архив файл".$file1;
// $zip->addFile($file2); 
// echo "Добавляем в архив файл".$file2;
// $zip->close(); //Завершаем работу с архивом
// $zip = new ZipArchive (); //Создаём объект для работы с ZIP-архивами
//  $arch = "archive.zip";
//  $dir = "site/";
//  if ( $zip -> open ( $arch ) === TRUE ) { //Открываем архив и делаем проверку успешности открытия 
//  	$zip -> extractTo ( $dir ); 
//  	echo "Извлекаем файлы в директорию ".$dir;
//  	$zip -> close (); //Завершаем работу с архивом 
//  } 
//  else echo "Ошибка открытия файла архива!";

// $pathdir='site/';
// $zip = new ZipArchive;
// if ($zip -> open('arch.zip', ZipArchive::CREATE) === TRUE)
// {
//   $dir = opendir( $pathdir );
//   while( $d = readdir( $dir ) ){
//  		if ($d !== "." && $d !== ".." ){
// 		 echo "Добавляем в архив файл ".$d." размером ".filesize( $pathdir.$d )."<br />";
//  		 $zip -> addFile( $pathdir.'/'.$d, $d);
//  		}
//   }
//   $zip -> close();
//   echo 'Файлы добавлены в архив';
// }
// else echo "Ошибка открытия файла архива!";

$pathdir='site/'; // путь к папке, файлы которой будем архивировать
$nameArhive = 'test.zip'; //название архива
$zip = new ZipArchive; // класс для работы с архивами
if ($zip -> open($nameArhive, ZipArchive::CREATE) === TRUE){ // создаем архив, если все прошло удачно продолжаем
 $dir = opendir($pathdir); // открываем папку с файлами
 while( $file = readdir($dir)){ // перебираем все файлы из нашей папки
 if (is_file($pathdir.$file)){ // проверяем файл ли мы взяли из папки
   $zip -> addFile($pathdir.$file, $file); // и архивируем
   //echo("Заархивирован: " . $pathdir.$file) , '<br/>';
 }
}
$zip -> close(); // закрываем архив.
//echo 'Архив успешно создан';
//Высылаем пользователю архив
header ("Content-Type: application/octet-stream");
header ("Accept-Ranges: bytes");
header ("Content-Length: ".filesize($nameArhive));
header ("Content-Disposition: attachment; filename=".$nameArhive);
readfile($nameArhive); 
//unlink($nameArhive);//Удаляем файл архива, если нужно
}
else{
  die ('Произошла ошибка при создании архива');
}