<?php
require('config/database.php');
$testVar = $_GET['test'];
$testVar2 = "static_garbage";
$insert_query = "INSERT INTO testTable (`testVar`,`testVar2`) VALUES ('". mysqli_real_escape_string($mysqli_link, '$testVar') ."','". mysqli_real_escape_string($mysqli_link, '$testVar2') ."')";
?>

<html>
<head>
<title>RemoteFW :: Server Console</title>
</head>
<body>
<h1>RemoteFW :: Server console.</h1>

<?php

// run the insert query
If (mysqli_query($mysqli_link, $insert_query)) {
    echo 'Record inserted successfully.';
}

echo "[Test] $testVar"; 
?>

</body>
</html>
<?php
// close the db connection
mysqli_close($mysqli_link);
?>