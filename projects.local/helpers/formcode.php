<?php
require_once 'helpers.php';

//--отримуємо дані з форми 


$avatarPath = null;
$user_name = $_POST['user_name'] ?? null;
$email = $_POST['email'] ?? null;
$phone =$_POST['phone'] ?? null;
$avatar = $_FILES['avatar'] ?? null;
  
  
  //валідація даних


if (empty($user_name)) {
  setValidationError('user_name', 'Неправильне імя');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  setValidationError('email', 'Вказаний неправильний email');
}
if (empty($phone)) {
  setValidationError('phone', 'введіть номер телефону');
}



if (!empty($avatar)) {
  $types = ['image/jpeg', 'image/png'];

  if (!in_array($avatar['type'], $types)) {
    setValidationError('avatar', 'фото має невірний формат');
  }

  if (($avatar['size'] / 1000000) >= 2) {
    setValidationError('avatar', 'Зображення не повинне перевищувати 2 мб');
  }
}



// якщо список з помилками не порожній то вертаємо користувача  на форму

if (!empty($_SESSION['validation'])) {
  setOldValue('user_name', $user_name);
  setOldValue('email', $email);
  setOldValue('phone', $phone);
  redirect('../form.php');
}




//
//  Загружаємо аватарку, якшо вона была відправлена в формі

if (!empty($avatar)) {
  $avatarPath = uploadFile($avatar, 'avatar');
}
$dbc = mysqli_connect('MySql-8.0', 'root', '', 'userinfo');
if ($dbc->connect_error) {
  echo "помилка зєднання";
  exit;
}

// Добавляємо в базу даних дані з форми
$user_name = '"' . $dbc->real_escape_string($user_name) . '"';
$phone = '"' . $dbc->real_escape_string($phone) . '"';
$email = '"' . $dbc->real_escape_string($email) . '"';

$query = "INSERT INTO userinfo (user_name,phone, email, avatar) VALUES ('$user_name', '$phone','$email', '$avatarPath' )";

    $result = mysqli_query($dbc, $query);
  if ($result) {echo "ви успішно зареєструвалися";
      header('location:../main.php');
    } else {
      echo "Error: " . mysqli_error($dbc);
    }
 ?>