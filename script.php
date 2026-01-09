<?php
if (isset($_POST['submit'])) {
    $country = $_POST['country'];
    $state   = $_POST['states'];
    $city    = $_POST['city'];
    $pincode    = $_POST['pincodes'];

    echo 'Country is : ' . $country . '<br/>';
    echo 'State is   : ' . $state . '<br/>';
    echo 'City is    : ' . $city . '<br/>';
    echo 'pincode is    : ' . $pincode . '<br/>';
}
