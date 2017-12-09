<html>
<head><title>Facilities Documents Search</title></head>
<body>
<h1> Drew Facilities and Campus Operations Blueprint Database </h1>
<h2> Search Blueprints </h2>
<form method="post" action="">
    <input type="text" name="something" value="" />
    <input type="submit" name="submit1" />
  </form>
  <text-align: center>
  <color: blue>

  <h2> Search Building Names </h2>
<form method="post" action="">
    <input type="text" name="something2" value="" />
    <input type="submit" name="submit2" />
  </form>

<?php
echo "<body style='background-color:lightgreen'>";

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

if (isset($_POST['submit1'])) {
echo 'Query: ', $what, '<br>';
$result = $link->query("SELECT blueprint_name, link_to_blueprint FROM blueprints WHERE blueprint_name LIKE '%$what%'")
or trigger_error($db->error);
while($row=mysqli_fetch_assoc($result)){
    //echo 'Link to Blueprint: ', $row['link_to_blueprint'], '<br/>';
  echo $row['blueprint_name'], ': ';
  echo "<a href='".$row['link_to_blueprint']."'>Link to blueprint/folder</br></a>";
}
}



$what2 = htmlspecialchars($_POST['something2']);

if (isset($_POST['submit2'])) {
echo 'Query: ', $what2, '<br>';
$result2 = $link->query("SELECT building_name FROM buildings WHERE building_name LIKE '%$what2%'")
or trigger_error($db->error);
while($row=mysqli_fetch_assoc($result2)){
    echo 'Building: ', $row['building_name'].'<br/>';
}
}
?>
</body>
</html>
