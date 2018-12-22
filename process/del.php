<?php

    // Create the session cookie
    session_start();

    // Include some PHP files
    $_ENV = require "../config.php";
    require "../functions.php";

    // Connect to database with PDO
    $db = connectToDatabase();

    if ($_SERVER['REQUEST_METHOD'] === "POST") {

        $id = $_POST['id'];
        
        $req = $db->prepare("DELETE FROM messages WHERE id = $id");
        $req->execute();

        $_SESSION['flash'] = ["success", "Votre message a bien été supprimé."];
        header("Location: ../index.php");
        exit();

    }
