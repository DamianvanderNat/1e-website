<?php

  function dbconnect($servername, $username, $password, $dbname){
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
  }

function dbselect($conn, $db)
{
    $sql = "SELECT * FROM `" . $db ."` ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      $out = '<table border="2">';
      while($row = mysqli_fetch_assoc($result)) {
          if ($db=='users') {
            $out .= '<tr><td>id: ' . $row['id']. '</td><td>' . ' - Name: ' . $row['username']. ' -password:' . $row['password']. '  -email: ' . $row['email']. '</td></tr><br>';
          } else {
            $out .='<tr><td>id: ' . $row['id']. '</td><td>' . ' - Name: ' . $row['name']. ' -small:' . $row['small']. ' -medium: ' . $row['medium']. ' -large: ' . $row['large']. '</td></tr><br>';
          }
        }
        $out .= '</table>';
        }
    else {
      $out = "0 results";
      }
      return $out;
}   


//$out .= '<tr><td>id: ' . $row['id']. '</td><td>' . ' - Name: ' . $row['name']. ' -small:' . $row['small']. ' -medium: ' . $row['medium']. ' -large: ' . $row['large']. '</td></tr><br>';
$tables = array();
$conn = dbconnect('localhost', 'root', '', 'creamybliss');
$tables[]= dbselect($conn, "users");
$tables[] = dbselect($conn, "products");


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div>
    <?php foreach($tables as $table): ?>
    <?php echo $table ;?>
    <?php endforeach; ?>
  </div>
</body>
</html>

