<?php
header('Content-Type: text/html; charset=utf-8');
$back = $_SERVER['HTTP_REFERER'];

function validate_number($tel){
  $tel = trim((string)$tel);
  if (!$tel) return false;
  $tel = preg_replace('#[^0-9+]+#uis', '', $tel);
  if (!preg_match('#^(?:\\+?7|8|)(.*?)$#uis', $tel, $m)) return false;
  $tel = '+7' . preg_replace('#[^0-9]+#uis', '', $m[1]);
  if (!preg_match('#^\\+7[0-9]{10}$#uis', $tel, $m)) return false;
  return $tel;
}

  $name = $_POST['usr_name'];
  $phone = $_POST['usr_phone'];
  $course = $_POST['usr_course'];

  if(!validate_number($phone)){
    echo "<html><head><meta http-equiv='Refresh' content='0; URL=".$_SERVER['HTTP_REFERER']."'></head></html><script> alert('Некорректный номер телефона')</script>";
  }else{
    $phone = validate_number($phone);
    $message = 'Запись на курс: '. $course. ' Имя: '. $name. ' Номер телефона: '. $phone;

    $to = "logunov-i-ko77@mail.ru";
    $subject = "Запись на курс";
    $headerss = "Date: ".date('D, d M Y h:i:s O')."\r\n";

    if (mail($to, $subject, $message, $headerss)) {
      echo "<html><head><meta http-equiv='Refresh' content='0; URL=".$_SERVER['HTTP_REFERER']."'></head></html><script> alert('Заявка отправлена')</script>";
    }else{
      echo "something wrong";
    }

    // echo $message;
  }
 ?>
