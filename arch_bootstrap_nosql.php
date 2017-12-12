<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<head>
  <title>Facilities Documents Search</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
<body>

  <div class="container">
  <div class="row">
    <div class="col-sm-4">
      <h3>Search 1??</h3>
      <form method="post" action="">
          <input type="text" name="something" value="" />
          <input type="submit" name="submit" />
        </form>
    </div>
    <div class="col-sm-4">
      <h3>Search 2???</h3>
      <form method="post" action="">
          <input type="text" name="something" value="" />
          <input type="submit" name="submit" />
        </form>
    </div>
    <div class="col-sm-4">
      <h3>Column 3</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>
  </div>
</div>
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
