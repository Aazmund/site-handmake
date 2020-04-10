<?php
  $name = $_POST['usr_name'];
  $phone = $_POST['usr_phone'];
  $course = $_POST['usr_course'];

  $pattern = "#^\+[0-9]{1,2}\s?\([0-9]{3}\)\s?[0-9]+\-[0-9]+\-[0-9]+$#";

  if(preg_match($pattern, $phone, $out)){
    echo "kk";
  }else{
    echo "no kk";
  }
 ?>
