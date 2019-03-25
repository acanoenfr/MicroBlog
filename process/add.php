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

        if (!empty($content) && strlen($content) <= 280) {

            // var_dump($_FILES); die();

            if ($_FILES["image"]["type"] != "image/jpeg" && $_FILES["image"]["type"] != "image/jpg" && !isset($_FILES["image"])) {
                $_SESSION['flash'] = ["danger", "L'image doit être au format .jpeg ou .jpg."];
                header("Location: ../index.php");
                exit();
            }

            if ($_FILES["image"]["name"] != "") {
                $filename = uniqid() . "." . explode('/', $_FILES['image']['type'])[1];
                move_uploaded_file($_FILES["image"]["tmp_name"], ROOT . "/uploads/images/$filename");
            } else {
                $filename = null;
            }

            // var_dump($filename); die();
            
            $req = $db->prepare("SELECT id FROM users WHERE sid = :sid LIMIT 1");
            $req->execute([
                "sid" => $_COOKIE['sid']
            ]);

            $user = $req->fetch();

            $created_at = time();

            $req = $db->prepare("INSERT INTO messages(content, image, created_at, user_id) VALUES(:content, :image, :created_at, :user_id)");
            $req->execute([
                "content" => $content,
                "image" => $filename,
                "created_at" => $created_at,
                "user_id" => $user['id']
            ]);

            $_SESSION['flash'] = ["success", "Votre message a bien été publié sur le fil."];
            header("Location: ../index.php");
            exit();

        }

        $_SESSION['flash'] = ["danger", "Votre message ne doit pas être vide et doit être inférieur ou égal à 280 caractères."];
        header("Location: ../index.php");
        exit();

    }
