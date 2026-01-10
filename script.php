<?php
if (isset($_POST['submit'])) {
    $country = $_POST['country'];
    $phone = $_POST['phone'];
    $state   = $_POST['states'];
    $city    = $_POST['city'];
    $pincode    = $_POST['pincode'];

    echo 'Country is : ' . $country . '<br/>';
    echo 'phone is : ' . $phone . '<br/>';
    echo 'State is   : ' . $state . '<br/>';
    echo 'City is    : ' . $city . '<br/>';
    echo 'pincode is    : ' . $pincode . '<br/>';
}
