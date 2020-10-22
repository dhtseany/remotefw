<?php
// run the insert query
if (isset($testVar)) {
    if (mysqli_query($mysqli_link, $insert_query)) {
        echo 'Record inserted successfully. <br/>';
    }
}
if (isset($testVar)) {
    echo "[QUERY] $insert_query";
}

?>
<br />
<?php
if (isset($testVar)) {
    echo "[Test] $testVar";
}
?>             
