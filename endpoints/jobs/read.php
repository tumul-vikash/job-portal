<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include('../../config/Database.php');
    include('../../models/Jobs.php');

    $database = new Database();
    $db = $database->connect();
    $jobs = new Jobs($db);
    $result = $jobs->read();
    echo($result);
?>