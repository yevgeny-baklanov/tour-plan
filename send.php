<?php
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Переменные, которые отправляет пользователь
$name = $_POST['name'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$email = $_POST['email'];

if (isset($name) & isset($phone)) {
// Формирование самого письма
$message_title = "Новое обращения";
$message_body = "
<h2>Новое обращения</h2>
<b>Имя:</b> $name<br>
<b>Телефон:</b> $phone<br><br>
<b>Сообщение:</b><br>$message
";

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    // $mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host       = 'smtp.gmail.com'; // SMTP сервера вашей почты
    $mail->Username   = 'zbaklanov2@gmail.com'; // Логин на почте
    $mail->Password   = '123654eerr8900'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('zbaklanov2@gmail.com', 'Женя Бакланов'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('zbaklanov4@gmail.com');  

// Отправка сообщения
$mail->isHTML(true);
$mail->Subject = $message_title;
$mail->Body = $message_body; 


// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
  header("Location: thankyou.html");

} elseif (isset($email)) {

// Формирование самого письма

$news_title = "Новая подписка на новости";
$news_body = "
<h2>Новая подписка на новости</h2>
<b>Email:</b> $email<br>
";

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    // $mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host       = 'smtp.gmail.com'; // SMTP сервера вашей почты
    $mail->Username   = 'zbaklanov2@gmail.com'; // Логин на почте
    $mail->Password   = '123654eerr8900'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('zbaklanov2@gmail.com', 'Женя Бакланов'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('zbaklanov4@gmail.com');  

// Отправка сообщения
$mail->isHTML(true);
$mail->Subject = $news_title;
$mail->Body = $news_body;    

// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
  header("Location: subscription.html");

} elseif (isset($name) & isset($phone) & isset($email)) {
  // Формирование самого письма
  $booking_title = "Новое обращения о Booking";
  $booking_body = "
  <h2>Новое обращения о Booking</h2>
  <b>Имя:</b> $name<br>
  <b>Телефон:</b> $phone<br>
  <b>Email:</b> $email<br><br>
  <b>Сообщение:</b><br>$message
  ";
  
  // Настройки PHPMailer
  $mail = new PHPMailer\PHPMailer\PHPMailer();
  try {
      $mail->isSMTP();   
      $mail->CharSet = "UTF-8";
      $mail->SMTPAuth   = true;
      // $mail->SMTPDebug = 2;
      $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};
  
      // Настройки вашей почты
      $mail->Host       = 'smtp.gmail.com'; // SMTP сервера вашей почты
      $mail->Username   = 'zbaklanov2@gmail.com'; // Логин на почте
      $mail->Password   = '123654eerr8900'; // Пароль на почте
      $mail->SMTPSecure = 'ssl';
      $mail->Port       = 465;
      $mail->setFrom('zbaklanov2@gmail.com', 'Женя Бакланов'); // Адрес самой почты и имя отправителя
  
      // Получатель письма
      $mail->addAddress('zbaklanov4@gmail.com');  
  
  // Отправка сообщения
  $mail->isHTML(true);
  $mail->Subject = $booking_title;
  $mail->Body = $booking_body; 
  
  
  // Проверяем отравленность сообщения
  if ($mail->send()) {$result = "success";} 
  else {$result = "error";}
  
  } catch (Exception $e) {
      $result = "error";
      $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
  }
  
  // Отображение результата
    header("Location: thankyou.html");
  
  }





