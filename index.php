        <?php
        
            // Create the session cookie
            session_start();

            // Include some PHP files
            $_ENV = require "config.php";
            require "functions.php";

            // Connect to database with PDO
            $db = connectToDatabase();

            $auth = isLogged();

            // Include the website header
            require "includes/header.inc.php";
        
        ?>
        <section>
            <div class="container">
                <div class="row">
                    <?php
                        
                        // Include alert partial with $_SESSION super global
                        require "includes/alert.inc.php";
                    
                    ?>
                    <?php if ($auth) { ?>
                        <form>
                            <div class="col-sm-10">  
                                <div class="form-group">
                                    <textarea id="message" name="message" class="form-control" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
                            </div>                        
                        </form>
                    <?php } ?>
                </div>
                <div class="row">
                    <?php

                        // Get messages from the database
                        $req = $db->prepare("SELECT m.id, m.content, m.created_at, u.username FROM messages as m INNER JOIN users as u ON u.id = m.user_id ORDER BY m.created_at DESC");
                        $req->execute();
                        $messages = $req->fetchAll();

                        // Show messages
                        foreach ($messages as $m) {
                            ?>
                                <div class="col-md-12">
                                    <blockquote>
                                        <p><?= $m['content'] ?></p>
                        <footer><?= $m['username'] ?> le <?= date('d/m/Y', $m['created_at']) ?> à <?= date('H:i', $m['created_at']) ?> <?php if ($auth) { ?><a href="#">Modifier</a><?php } ?></footer>
                                    </blockquote>
                                </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </section>
        <?php
        
            // Include the website footer
            require "includes/footer.inc.php";
        
        ?>
