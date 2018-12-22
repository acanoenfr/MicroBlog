<?php

    // Create the session cookie
    session_start();

    // Include some PHP files
    $_ENV = require "../config.php";
    require "../functions.php";

    // Connect to database with PDO
    $db = connectToDatabase();

    if ($_SERVER['REQUEST_METHOD'] === "POST") {

        $content = testData($_POST['message']);
        $id = testData($_POST['id']);

        if (!empty($content) && strlen($content) <= 280) {

            $req = $db->prepare("UPDATE messages SET content = \"$content\" WHERE id = $id");
            $req->execute();

            $_SESSION['flash'] = ["success", "Votre message a bien été modifié."];
            header("Location: ../index.php");
            exit();

        }

        $_SESSION['flash'] = ["danger", "Votre message ne doit pas être vide et doit être inférieur ou égal à 280 caractères."];
        header("Location: ../mod.php?id=$id");
        exit();

    }
