<?php
    require "./src/db-connection.php";
    require "./src/Model/Evento.php";
    require "./src/Repository/EventRepository.php";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $date = $_POST['date'];
        $description = $_POST['description'];

        $event = new Evento(null,$title,$date,$description);

        $eventRepo = new EventRepository($pdo);
        $eventRepo->insertEvent($event);

        header("Location: index.php");
    }
    else{
        header("Location: index.php");
    }

?>