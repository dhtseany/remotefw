<?php

function displayCustomerName($custID, $mysqli_link) {
    $selectCustomer = "SELECT bizName FROM customers WHERE custID='$custID'";
    $resultCustomer = mysqli_query($mysqli_link, $selectCustomer);
    while ($customerRow = mysqli_fetch_array($resultCustomer, MYSQLI_ASSOC)) {
        echo $customerRow["bizName"];
    }
}

function displayClientData($cid, $mysqli_link) {
    $selectClientData = "SELECT * FROM clients WHERE cid='$cid'";
    $resultClientData = mysqli_query($mysqli_link, $selectClientData);
    while ($clientDataRow = mysqli_fetch_array($resultClientData, MYSQLI_ASSOC)) {
        echo '
        <tr>
            <td><a href="#">'. $clientDataRow["hostname"] .'</a></td>
            <td><span class="badge badge-success">Shipped</span></td>
            <td align="right"><?php clientDataRequested($cid, $clientDataRequested, $mysqli_link); ?></td>
        </tr>
        ';
    }
}

?>
