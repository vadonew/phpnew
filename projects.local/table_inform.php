<?php
//зєднуємось з базою даних і i збираємо дані 

include 'helpers/connection.php';
$query = "select * from userinfo";
$run = mysqli_query($dbc, $query);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>інформація про користувачів</title>
  <link rel="stylesheet" type="text/css" href="style/styleTableInfo1.css">
</head>

<body>
  <header> 
     <div class="header_form"><a href="form.php">форма для реєстрації користувачів</a></div>
   <div class="header_table"><a href="main.php">на головну</a></div> 

  </header>
  <h1>    Таблиця про користувачів</h1>
  <table border="1" cellspacing="0" cellpadding="0">
    <tr class="heading">
      <th> No</th>
      <th>ID</th>
      <th> Аватар</th>
      <th> Ім'я</th>
      <th>Телефон</th>
      <th>імейл</th>
      <th>Дія</th>
    </tr>
  
    
    <?php
    //ставимо першому користувачу індекс 1 і виводимо з таблиці бд рядки циклом
    $i = 1;
    if ($num = mysqli_num_rows($run) > 0) {
      while ($row = mysqli_fetch_assoc($run)) {
        echo "  
                          <tr class='data'>  
                          <td>" . $i++ . "</td>  
                             <td> ". $row['id']."</td>
                             <td><img src= '".$row['avatar']."'</td>
                               <td>" . $row['user_name'] . "</td>  
                               <td>" . $row['phone'] . "</td>  
                               <td>" . $row['email'] . "</td>  
                               <td><a href='helpers/delete.php?id=" . $row['id'] . "' id='btn'>Delete</a></td>  
                          </tr>  
                     ";
      }
    }
    ?>
  </table>
  
</body>

</html>