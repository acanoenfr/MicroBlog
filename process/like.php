<?php

    // Create the session cookie
    session_start();

    // Include some PHP files
    $_ENV = require "../config.php";
    require "../functions.php";

    // Connect to database with PDO
    $db = connectToDatabase();

    $array = [];

    if ($_SERVER['REQUEST_METHOD'] === "POST") {

        $array["id"] = $_POST["id"];

        $last_ip = $db->prepare("SELECT * FROM messages WHERE id = :id");
        $last_ip->execute([
            "id" => $array["id"]
        ]);

        $array["last_ip"] = $last_ip->fetch();

        if ($_SERVER["REMOTE_ADDR"] == $array["last_ip"]["last_ip"]) {
            $array["isSuccess"] = false;
        } else {
            $array["isSuccess"] = true;
            $array["last_ip"]["likes"]++;
            $req = $db->prepare("UPDATE messages SET likes = :likes, last_ip = :last_ip WHERE id = :id");
            $req->execute([
                "likes" => $array["last_ip"]["likes"],
                "last_ip" => $_SERVER["REMOTE_ADDR"],
                "id" => $array["id"]
            ]);
        }

        echo json_encode($array);

    }
