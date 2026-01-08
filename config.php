<?php
$connection = new mysqli("localhost", "root", "", "mydb");
if (! $connection) {
    die("Error in connection" . $connection->connect_error);
}
