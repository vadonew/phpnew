<!--зєднуємось з базою даних і перебираємо дані по кожному ряду-->
<?php
include 'connection.php';
$result = mysqli_query($dbc, "SELECT * FROM `userinfo`");
$user = mysqli_fetch_assoc($result);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User_info</title>
  <link rel="stylesheet" href="stylenew6.css">
</head>
<header>
  <container>
    <div class="header_form"><a href="main.php">на головну</a></p> </div>
   <div class="header_table"><a href="form.php">до форми для реєстрації </a></div> 
  </container>
</header>
<body>
  <h1> Інформаційна таблиця про користувачів</h1>
  <div class="userinfo_table">
    
<table>
  <tr>
    <th>Ім'я</th>
    <th>Телефон</th>
    <th>Електронна пошта</th>
  </tr>
  <!--виводимо дані циклом з переміною user з масивом даних-->
  <?php
      while($user = mysqli_fetch_assoc($result)){
        ?><tr>
        <td> <?php echo $user['user_name'].'</br>';
         ?>
      </td> 
       <td> <?php echo $user['phone'] . '</br>';
      ?>
      </td>
       <td> <?php echo $user['email'] . '</br>';
      ?>
      </td>
      
       <?php
      }
      ?>
   
  </tr>
 
 
</table>
</div>
</body>
</html>