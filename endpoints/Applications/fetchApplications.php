<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include('../../config/Database.php');
    include('../../models/Applications.php');

    $database = new Database();
    $db = $database->connect();
    $application = new Applications($db);
    $result = $application->read();
    echo($result);
?>