<?php


function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
// визначте змінні та встановіть порожні значення
$nameErr = $emailErr = $phoneErr = "";
$name = $email = $phone= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "імя є обовязковим";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
      $nameErr = "Дозволені лише літери та пробіли";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email є обов’язковим";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Недійсний формат електронної пошти";
    }
  }

  if (empty($_POST["phone"])) {
    $phone = "Телефон є обовязковим";
  } else {
    $phone = test_input($_POST["phone"]);
    if (!preg_match("/^[0-9-+]*$/", $name)) {
      $nameErr = "Дозволені лише цифри";
    }
  }

}