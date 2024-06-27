<?php 
    require "./src/db-connection.php";
    require "./src/Model/Event.php";
    require "./src/Repository/EventRepository.php";

    $eventRepos = new EventRepository($pdo);
    $eventRepos->deleteEvent($_POST['id']);
    

    header("Location: index.php");



?>