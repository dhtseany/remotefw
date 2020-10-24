<?php

function displayCustomerName($custID, $mysqli_link) {
    $selectCustomer = "SELECT bizName FROM customers WHERE custID='$custID'";
    $resultCustomer = mysqli_query($mysqli_link, $selectCustomer);
    while ($customerRow = mysqli_fetch_array($resultCustomer, MYSQLI_ASSOC)) {
        echo $resultCustomer["bizName"];
    }
}

?>
