<html>
<head><title>Facilities Documents Search</title></head>
<body>
<form method="post" action="">
    <input type="text" name="something" value="" />
    <input type="submit" name="submit" />
  </form>
<?php

$what = htmlspecialchars($_POST['something']);

 // DEFINE('DB_USERNAME', 'root');
 // DEFINE('DB_PASSWORD', 'root');
 // DEFINE('DB_HOST', 'localhost');
 // DEFINE('PORT', '3307')
 // DEFINE('DB_DATABASE', 'performance_schema');

 // $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$user = 'root';
$password = 'root';
$db = 'the_architects';
$host = 'localhost';
$port = 3307;

$link = mysqli_init();
$success = mysqli_real_connect(
   $link,
   $host,
   $user,
   $password,
   $db,
   $port
);

 if (mysqli_connect_error()) {
  die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
 }

 echo 'Connected successfully.<br>';

echo 'Query: ', $what, '<br>';
$result = $link->query("SELECT link_to_blueprint FROM blueprints WHERE blueprint_name LIKE '%$what%'")
or trigger_error($db->error);
while($row=mysqli_fetch_assoc($result)){
    echo 'Link to blueprint: ', $row['link_to_blueprint'].'<br/>';
}
?>

<form method="post" action="">
    <input type="text" name="something2" value="" />
    <input type="submit" name="submit" />
  </form>
<?php

$what2 = htmlspecialchars($_POST['something2']);

echo 'Query: ', $what2, '<br>';
$result2 = $link->query("SELECT project_name FROM project WHERE project_name LIKE '%$what2%'")
or trigger_error($db->error);
while($row=mysqli_fetch_assoc($result2)){
    echo 'Project Name: ', $row['project_name'].'<br/>';
}
</body>
</html>
