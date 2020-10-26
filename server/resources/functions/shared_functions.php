<?php

function displayCustomerName($custID, $mysqli_link) {
    $selectCustomer = "SELECT bizName FROM customers WHERE custID='$custID'";
    $resultCustomer = mysqli_query($mysqli_link, $selectCustomer);
    while ($customerRow = mysqli_fetch_array($resultCustomer, MYSQLI_ASSOC)) {
        echo $customerRow["bizName"];
    }
}

function displayClientDataSummary($cid, $mysqli_link) {
    $selectClientData = "SELECT * FROM clients WHERE cid='$cid'";
    $resultClientData = mysqli_query($mysqli_link, $selectClientData);
    while ($clientDataRow = mysqli_fetch_array($resultClientData, MYSQLI_ASSOC)) {
        echo '
            <tr>
                <td>Hostname</td>
                <td align="right">'. $clientDataRow["hostname"] .'</td>
            </tr>
            <tr>
                <td>Status</td>
                <td align="right"><span class="badge badge-success">Online</span></td>
            </tr>
        ';
    }
}

function displayClientDataInt($cid, $mysqli_link) {
    $selectClientData = "SELECT * FROM clients WHERE cid='$cid'";
    $resultClientData = mysqli_query($mysqli_link, $selectClientData);
    while ($clientDataRow = mysqli_fetch_array($resultClientData, MYSQLI_ASSOC)) {
        echo '
            <tr>
                <td>WAN</td>
                <td align="right">'. $clientDataRow["wanIP"] .'</td>
            </tr>
            <tr>
                <td>LAN</td>
                <td align="right">'. $clientDataRow["lanIP"] .'</td>
            </tr>
        ';
    }
}

?>
