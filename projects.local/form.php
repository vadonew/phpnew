<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>registration form</title>
  <link rel="stylesheet"  href="style22.css">
</head>

<body>
  <!--валідація форми-->
 <?php  require 'errorForm.php';?>
 <!--отримуємо дані з форми і добавляємо в базу даних-->
<?php

if (isset($_POST['formSubmit'])) {
  $user_name = $_POST['user_name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $dbc = mysqli_connect('MySql-8.0', 'root', '', 'userinfo');
  if ($dbc->connect_error) {
    echo "помилка зєднання";
    exit;
  }
//перед запитом зводим дані до значення стрінг і відправляємо до бд
  $user_name = '"' . $dbc->real_escape_string($user_name) . '"';
  $phone = '"' . $dbc->real_escape_string($phone) . '"';
  $email = '"' . $dbc->real_escape_string($email) . '"';
  $query = "INSERT INTO userinfo ( user_name,phone,email) VALUES('$user_name','$phone','$email')";
  $result = mysqli_query($dbc, $query);
  if ($result) {echo "ви успішно зареєструвалися";
      header('location:form.php');
    } else {
      echo "Error: " . mysqli_error($dbc);
    }
 
}
  

?>
  
  <header>
    <h1>Форма для реєстрації користувача</h1>
  <container>
    <div class="header_form"><a href="main.php">на головну</a></p> </div>
   <div class="header_table"><a href="user_table.php">до таблиці з даними </a></div> 
  </container>
    
      
    
  </header>
  <main>
    
    <fieldset>
      <legend> Contact info</legend>
      <form method="post">
   

        <label> <input type="text" placeholder="your name" name="user_name" ></label>
        <span class="error">* <?php echo $nameErr; ?></span>
        <br><br>
        <label>  <input type="telephone" placeholder="your phone" name="phone" ></label>
        <span class="error">* <?php echo $phoneErr; ?></span>
        <br><br>
        <label>  <input type="email" name="email" placeholder="your email" ></label>
        <span class="error">* <?php echo $emailErr; ?></span>
        <br><br>
    <button type="submit" name="formSubmit"> зареєструвати</button>
      </form> </fieldset>
      
  </main>

</body>

</html>
