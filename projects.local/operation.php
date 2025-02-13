<?php
//зєднуємось з базою даних і i збираємо дані 

include 'connection.php';
$query = "select * from userinfo";
$run = mysqli_query($dbc, $query);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>інформація про користувачів</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <header> 
     <div class="header_form"><a href="form.php">форма для реєстрації користувачів</a></div>
   <div class="header_table"><a href="operation.php">таблиця даних користувачів </a></div> 

  </header>
  <h1>    Таблиця про користувачів</h1>
  <table border="1" cellspacing="0" cellpadding="0">
    <tr class="heading">
      <th> No</th>
      <th>ID</th>
      <th> Ім'я</th>
      <th>Телефон</th>
      <th>імейл</th>
      <th>Дія</th>
    </tr>
  
    
    <?php
    //ставимо першому користувачу індекс 1 і виводимо з таблиці бд рядки циклом
    $i = 1;
    if ($num = mysqli_num_rows($run) > 0) {
      while ($result = mysqli_fetch_assoc($run)) {
        echo "  
                          <tr class='data'>  
                          <td>" . $i++ . "</td>  
                               <td>" . $result['id'] . "</td>  
                               <td>" . $result['user_name'] . "</td>  
                               <td>" . $result['phone'] . "</td>  
                               <td>" . $result['email'] . "</td>  
                               <td><a href='delete.php?id=" . $result['id'] . "' id='btn'>Delete</a></td>  
                          </tr>  
                     ";
      }
    }
    ?>
  </table>
</body>

</html>