
<?php
require_once 'helpers\helpers.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>registration form</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
  <link rel="stylesheet"  href="style/style_form.css">
</head>

<body>

 

  
  <header>
    <h1>Форма для реєстрації користувача</h1>
 
   
      
    
  </header>
 
      <container class="container">
    <div class="header_form"><a href="main.php">на головну</a></p> </div>
   <div class="header_table"><a href="table_inform.php">до таблиці з даними </a></div> 
  </container>
   <main>
    <fieldset>
      <legend> Contact info</legend>
      <form method="post" action="helpers\formcode.php" enctype="multipart/form-data">
   

        <label> <input type="text" placeholder="your name" name="user_name" 
         <?php echo validationErrorAttr('user_name'); ?>
        >
        <?php if (hasValidationError('user_name')): ?>
              <small><?php echo validationErrorMessage('user_name'); ?></small>
        <?php endif; ?>
      
      </label>
        <span></span>
        <label>  <input type="telephone" placeholder="your phone" name="phone" 
        <?php echo validationErrorAttr('phone'); ?>
        >
        <?php if (hasValidationError('phone')): ?>
              <small><?php echo validationErrorMessage('phone'); ?></small>
        <?php endif; ?>
      

      </label>
        <span></span>
        <label>  <input type="email" name="email" placeholder="your email"  
        <?php echo validationErrorAttr('email'); ?>
        >
        <?php if (hasValidationError('email')): ?>
              <small><?php echo validationErrorMessage('email'); ?></small>
        <?php endif; ?>
      

      </label>
        <span></span>
        <label for = "avatar" > завантажте фото <input type="file" class="avatar" name="avatar" 
        <?php echo validationErrorAttr('avatar'); ?>
        >
        <?php if (hasValidationError('avatar')): ?>
              <small><?php echo validationErrorMessage('avatar'); ?></small>
        <?php endif; ?>
      </label>
        

    <button class="button" type="submit" name="formSubmit"> зареєструвати</button>
      </form> </fieldset>
      
  </main>

</body>

</html>
