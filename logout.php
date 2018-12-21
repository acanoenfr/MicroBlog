        <?php
            
            // Create the session cookie
            session_start();

            // Include some PHP files
            $_ENV = require "config.php";
            require "functions.php";

            // Connect to database with PDO
            $db = connectToDatabase();