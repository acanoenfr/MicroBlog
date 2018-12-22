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

            // Include the website header
            require "includes/header.inc.php";

            $req = $db->prepare("SELECT content FROM messages WHERE id = '$id'");
            $req->execute();

            $message = $req->fetch();
        
        ?>
        <section>
            <div class="container">
                <div class="row">
                    <?php
                        
                        // Include alert partial with $_SESSION super global
                        require "includes/alert.inc.php";
                    
                    ?>
                    <form method="post" action="process/del.php">
                        <div class="alert alert-warning">
                            <span class="text-muted">Êtes-vous sûr de supprimer ce message (ID=<?= $id ?>) ?</span>
                        </div>
                        <div class="d-inline">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <a href="index.php" class="btn btn-primary btn-lg">Non, conserver</a>
                            <button type="submit" class="btn btn-success btn-lg">Oui, supprimer</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <?php
        
            // Include the website footer
            require "includes/footer.inc.php";
        
        ?>
