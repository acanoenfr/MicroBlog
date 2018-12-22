<?php

    // Create the session cookie
    session_start();

    // Include some PHP files
    $_ENV = require "../config.php";
    require "../functions.php";

    // Connect to database with PDO
    $db = connectToDatabase();

    if ($_SERVER['REQUEST_METHOD'] === "POST") {

        $email = testData($_POST['email']);
        $password = testData($_POST['password']);

        $req = $db->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        $req->execute([
            "email" => $_POST['email']
        ]);

        if ($req->rowCount() > 0) {

            $user = $req->fetch();

            if (password_verify($password, $user['password'])) {

                $timestamp = date("H:i:s");
                $sid = md5("$email-$timestamp");
                $req = $db->prepare("UPDATE users SET sid = '$sid' WHERE email = '$email'");
                $req->execute();
                setcookie('sid', $sid, time() + 86400 * 30, '/');
                $_SESSION['flash'] = ["success", "Vous êtes désomais connecté sous le nom {$user['username']}."];
                header("Location: ../index.php");
                exit();

            }

            $_SESSION['flash'] = ["danger", "Le mot de passe associé à ce compte est incorrect."];
            header('Location: ../login.php');
            exit();

        }

        $_SESSION['flash'] = ["danger", "Aucun compte associé à cet adresse e-mail existe parmis nos enregistrements."];
        header('Location: ../login.php');
        exit();

    }
