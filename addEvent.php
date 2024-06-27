<?php
    global $pdo;
    require "./src/db-connection.php";
    require "./src/Model/Event.php";
    require "./src/Repository/EventRepository.php";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $date = $_POST['date'];
        $description = $_POST['description'];
        $event = new Event(null,$title,$date,$description);
        $eventRepo = new EventRepository($pdo);
        $eventRepo->insertEvent($event);
    }
    header("Location: index.php");