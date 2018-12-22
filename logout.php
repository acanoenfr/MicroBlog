        <?php
            
            // Create the session cookie
            session_start();

            // Include some PHP files
            $_ENV = require "config.php";
            require "functions.php";

            // Connect to database with PDO
            $db = connectToDatabase();

            $auth = isLogged();

            $sid = $_COOKIE['sid'];
            $sidreq = $db->prepare("UPDATE users SET sid = '' WHERE sid = '$sid'");
            $sidreq->execute();

            setcookie('sid', '', time() - 1);

            $_SESSION['flash'] = ["success", "Vous avez bien été déconnecté !"];
            header('Location: index.php');
            exit();
