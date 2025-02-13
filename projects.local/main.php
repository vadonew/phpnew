


<!DOCTYPE html>
<html lang="en">

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="stylenew3.css">
  <title>Document</title>
</head>
<body>
  <!--зєднуємось з бд , і передаємо кількість рядків які є в ній в змінну-->
  <?php
include 'connection.php';

  $user_sql ="Select * from userinfo";
  $user_result = mysqli_query($dbc, $user_sql);
  $total_users = mysqli_num_rows($user_result);
  

?>
 <h1 class="user_number"> Число зареєстрованих користувачів: <?php echo $total_users ?>
  
  </h1>

<container class="container">
  <header>
    <div class="header_form"><a href="form.php">форма для реєстрації користувачів</a></p> </div>
   <div class="header_table"><a href="user_table.php">таблиця даних користувачів </a></div> 

  </header>
    </container>
     <main> <h1>Сайт створений для зручного зберігання та перегляду інформації про користувачів.</h1>
    <h2>Простий та інтуїтивно зрозумілий інтерфейс, який допоможе швидко та ефективно працювати з даними.</h2>
   
    <br>Основні функції:
    - Форма для збереження даних.</br>
    Перейшовши на сторінку із формою, ви зможете вводити та зберігати дані в базі даних. Просто заповніть необхідні поля та
    натисніть кнопку "Зберегти". Ваша інформація буде надійно збережена та доступна для подальшого використання. </p>
    <br>Таблиця для відображення даних. </br>
    На сторінці із таблицею ви можете переглядати всі збережені дані. Інформація представлена у зручному табличному форматі,
    що дозволяє швидко знаходити потрібні записи та аналізувати їх.
</p>
 </container>
  </main>
</body>
</html>