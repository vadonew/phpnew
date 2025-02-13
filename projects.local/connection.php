<?php $dbc = mysqli_connect('MySql-8.0', 'root', '', 'userinfo');
if ($dbc->connect_error) {
echo "помилка зєднання";
exit;
}
 ?>