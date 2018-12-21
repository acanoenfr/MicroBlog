        <?php
            
            // Create the session cookie
            session_start();

            // Include some PHP files
            $_ENV = require "config.php";
            require "functions.php";

            // Connect to database with PDO
            $db = connectToDatabase();

            // Include the website header
            require "includes/header.inc.php";
        
        ?>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="">
                            <div class="form-group">
                                <label for="email">Adresse e-mail</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" name="password" id="password" class="form-control">
                                <span class="text-muted" id="login-error"></span>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-block" type="submit">Se connecter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php
        
            // Include the website footer
            require "includes/footer.inc.php";
        
        ?>
