<?php

class Common
{
    public function getCountry($connection)
    {
        $mainQuery = "SELECT * FROM country";
        $result1 = $connection->query($mainQuery) or die("Error in main Query" . $connection->error);
        return $result1;
    }

    public function getphoneByCountry($connection, $country_id)
    {
        $query = "SELECT * FROM phone WHERE country_id='$country_id'";
        $result = $connection->query($query) or die("Error in  Query" . $connection->error);
        return $result;
    }

    public function getStateByCountry($connection, $country_id)
    {
        $query = "SELECT * FROM states WHERE country_id='$country_id'";
        $result = $connection->query($query) or die("Error in  Query" . $connection->error);
        return $result;
    }

    public function getCityByState($connection, $state_id)
    {
        $query = "SELECT * FROM city WHERE state_id='$state_id'";
        $result = $connection->query($query) or die("Error in  Query" . $connection->error);
        return $result;
    }

    public function getPincodeByCity($connection, $city_id)
    {
        $query = "SELECT * FROM pincodes WHERE city_id='$city_id'";
        $result = $connection->query($query) or die("Error in  Query" . $connection->error);
        return $result;
    }
}

