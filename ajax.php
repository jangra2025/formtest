<?php
include "config.php";

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'getphone_code' && isset($_POST['countryId'])) {
        $countryId = intval($_POST['countryId']);
        $result = $connection->query("SELECT * FROM phone WHERE country_id=$countryId");
        echo '<option value="">Select phone</option>';
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['id'] . '">' . $row['phone_code'] . '</option>';
        }
    }

    if ($_POST['action'] == 'getStates' && isset($_POST['countryId'])) {
        $countryId = intval($_POST['countryId']);
        $result = $connection->query("SELECT * FROM states WHERE country_id=$countryId");
        echo '<option value="">Select State</option>';
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['id'] . '">' . $row['state_name'] . '</option>';
        }
    }

    if ($_POST['action'] == 'getCities' && isset($_POST['stateId'])) {
        $stateId = intval($_POST['stateId']);
        $result = $connection->query("SELECT * FROM city WHERE state_id=$stateId");
        echo '<option value="">Select City</option>';
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['id'] . '">' . $row['city_name'] . '</option>';
        }
    }

    if ($_POST['action'] == 'getPincode' && isset($_POST['cityId'])) {
        $cityId = intval($_POST['cityId']);
        $result = $connection->query("SELECT * FROM pincodes WHERE city_id=$cityId");
        echo '<option value="">Select pincode</option>';
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['id'] . '">' . $row['pincode'] . '</option>';
        }
    }

}
