<?php
    header('Access-Control-Allow-Origin: *');
    //header('Content-Type: application/json');

    include('../../config/Database.php');
    include('../../models/Applications.php');

    $title = $_POST['title'];
    $jid = $_POST['id'];
    $first = $_POST['first'];
    $last = $_POST['last'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $about = $_POST['about'];
    //echo(json_encode([$title, $jid, $first, $last, $email, $phone, $about]));
    $database = new Database();
    $db = $database->connect();
    $application = new Applications($db);
    $result = $application->insertNew($jid, $title, $first, $last, $email, $phone, $about);
    echo($result);
?>