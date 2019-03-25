<?php
            
            // Create the session cookie
            session_start();

            if (!isset($_GET['id'])) {
                header('Location: index.php');
                exit();
            }
            $id = $_GET['id'];

            // Include some PHP files
            $_ENV = require "config.php";
            require "functions.php";

            // Connect to database with PDO
            $db = connectToDatabase();

            $auth = isLogged();

            // Detect if the user is not authenticated
            if (!$auth) {
                $_SESSION['flash'] = ['warning', 'Vous devez être connecté pour effectué cette action.'];
                header('Location: index.php');
                exit();
            }

            $flash = null;
            if (array_key_exists("flash", $_SESSION)) {
                $flash = $_SESSION["flash"];
                unset($_SESSION["flash"]);
            }

            // Include the website header
            require "includes/header.inc.php";

            $req = $db->prepare("SELECT content FROM messages WHERE id = '$id'");
            $req->execute();

            $message = $req->fetch();

            require "vendor/autoload.php";
            $smarty = new Smarty();
            $smarty->assign([
                "flash" => $flash,
                "id" => $id
            ]);
            $smarty->display("templates/del.tpl");
        
            // Include the website footer
            require "includes/footer.inc.php";
        
        ?>
