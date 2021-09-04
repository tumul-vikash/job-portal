<?php
    include('../../config/Database.php');
    include('../../models/Jobs.php');
    
    $database = new Database();
    $db = $database->connect();
    $jobs = new Jobs($db);
    $result = $jobs->insert('jr. developer-php', 'abc pvt. ltd.', 'php developer required', 1, 'someone', 'someone@example.com', 1234567890, 'talent aquisition', 0);
    echo($result);
?>