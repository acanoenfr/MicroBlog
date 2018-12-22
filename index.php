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
                        <form method="post" action="process/add.php">
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

                        $limitPerPage = 5;

                        $nbMessages = $db->query("SELECT COUNT(id) as n FROM messages");
                        $nbMessages = $nbMessages->fetch()['n'];
                        $nbPages = ceil($nbMessages / $limitPerPage);
                        $currentPage = (isset($_GET['p']) && $_GET['p'] > 0 && $_GET['p'] <= $nbPages) ? $_GET['p'] : 1;
                        $begin = ($currentPage - 1) * $limitPerPage;
                        
                        $prev = $currentPage - 1;
                        $next = $currentPage + 1;

                        // Get messages from the database
                        $req = $db->prepare("SELECT m.id, m.content, m.created_at, m.likes, u.username FROM messages as m INNER JOIN users as u ON u.id = m.user_id LIMIT $begin,$limitPerPage");
                        $req->execute();
                        $messages = $req->fetchAll();

                        // Show messages
                        foreach ($messages as $m) {
                            ?>
                                <div class="col-md-12">
                                    <blockquote>
                                        <p><?= $m['content'] ?></p>
                                        <small class="text-muted">Nombres de vote : <?= $m['likes'] ?> <a class="btn-like" href="#" data-id="<?= $m['id'] ?>">Voter</a></small>
                                        <footer><?= $m['username'] ?> le <?= date('d/m/Y', $m['created_at']) ?> à <?= date('H:i', $m['created_at']) ?> <?php if ($auth) { ?><a href="mod.php?id=<?= $m['id'] ?>">Modifier</a> <a href="del.php?id=<?= $m['id'] ?>">Supprimer</a><?php } ?></footer>
                                    </blockquote>
                                </div>
                            <?php
                        }
                        
                        ?>

                            <nav>
                                <ul class="pagination pagination-lg">
                                    <li class="<?= ($prev <= 1) ? 'disabled' : '' ?>"><a href="?p=<?= $prev ?>">&laquo;</a></li>
                                    <?php
                                        for ($i = 1; $i <= $nbPages; $i++) {
                                            ?><li class="<?= ($i == $currentPage) ? 'disabled' : '' ?>"><a href="?p=<?= $i ?>"><?= $i ?></a></li><?php
                                        }
                                    ?>
                                    <li class="<?= ($next >= $nbPages) ? 'disabled' : '' ?>"><a href="?p=<?= $next ?>">&raquo;</a></li>
                                </ul>
                            </nav>
                        
                        <?php

                    ?>
                </div>
            </div>
        </section>
        <?php
        
            // Include the website footer
            require "includes/footer.inc.php";
        
        ?>
