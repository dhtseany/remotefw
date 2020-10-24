<?php

function displayCustomerName($custID) {
    require('config/database.php');
    $selectCustomer = "SELECT bizName FROM customers WHERE custID='$custID'";
    $resultCustomer = mysqli_query($mysqli_link, $selectCustomer);
    while ($customerRow = mysqli_fetch_array($resultCustomer, MYSQLI_ASSOC)) {
        echo $resultCustomer["bizName"];
    }
    mysqli_close($mysqli_link);
}

?>
