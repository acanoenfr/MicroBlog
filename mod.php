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
                    <form method="post" action="process/mod.php">
                        <div class="col-sm-10">  
                            <div class="form-group">
                                <textarea id="message" name="message" class="form-control" placeholder="Message"><?= $message['content'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <button type="submit" class="btn btn-success btn-lg">Modifier</button>
                        </div>                        
                    </form>
                </div>
            </div>
        </section>
        <?php
        
            // Include the website footer
            require "includes/footer.inc.php";
        
        ?>
