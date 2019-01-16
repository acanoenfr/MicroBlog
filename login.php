        <?php
            
            // Create the session cookie
            session_start();

            // Include some PHP files
            $_ENV = require "config.php";
            require "functions.php";

            // Connect to database with PDO
            $db = connectToDatabase();

            $auth = isLogged();

            $flash = null;
            if (array_key_exists("flash", $_SESSION)) {
                $flash = $_SESSION["flash"];
                unset($_SESSION["flash"]);
            }

            // Include the website header
            require "includes/header.inc.php";

            require "vendor/autoload.php";
            $smarty = new Smarty();
            $smarty->assign([
                "flash" => $flash
            ]);
            $smarty->display("templates/login.tpl");
        
            // Include the website footer
            require "includes/footer.inc.php";
        
        ?>
