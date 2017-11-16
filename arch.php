<html>
<head><title>Facilities Documents Search</title></head>
<body>
<form method="post" action="">
    <input type="text" name="something" value="" />
    <input type="submit" name="submit" />
  </form>

  <?php
//$db = new mysqli('127.0.0.1', 'root', '*81F5E21E35407D884A6CD4A731AEBFB6AF209E1B', 'the architects');

$what = htmlspecialchars($_POST['something']);

error_reporting(E_ALL);
ini_set('display_errors', 1);

 DEFINE('DB_USERNAME', 'root');
 DEFINE('DB_PASSWORD', '*81F5E21E35407D884A6CD4A731AEBFB6AF209E1B');
 DEFINE('DB_HOST', '127.0.0.1');
 DEFINE('DB_DATABASE', 'inventory');

$db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

 if (mysqli_connect_error()) {
  die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
 }

 echo 'Connected successfully.<br>';


echo 'Query: ', $what, '<br>';
$result = $db->query("SELECT blueprint_name FROM blueprints WHERE blueprint_name LIKE '%$what%' ORDER BY blueprint_name")
or trigger_error($db->error);
//var_dump($result);
//cast into a string?
echo 'Result: ', $result, '<br>';
$db->close();
?>

</body>
</html>
