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
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <blockquote>
                            <p>Lorem ipsum dolor sit <a href="#">@amet</a>, consectetur <a href="#">#adipiscing</a> elit. Integer posuere erat a ante.</p>
                            <footer>Foo</footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </section>
        <?php
        
            // Include the website footer
            require "includes/footer.inc.php";
        
        ?>
