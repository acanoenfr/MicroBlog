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
                    <div class="col-md-12">
                        <?php
                        
                            // Include alert partial with $_SESSION super global
                            require "includes/alert.inc.php";
                        
                        ?>
                        <form method="post" action="process/login.php">
                            <div class="form-group">
                                <label for="email">Adresse e-mail</label>
                                <input type="email" name="email" id="email" class="form-control">
                                <span class="comments text-muted" id="emailError"></span>
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" name="password" id="password" class="form-control">
                                <span class="comments text-muted" id="passwordError"></span>
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
