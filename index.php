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

            // Number of messages per page
            $limitPerPage = 5;

            // Numbers of messages in the database
            $nbMessages = $db->query("SELECT COUNT(id) as n FROM messages");
            $nbMessages = $nbMessages->fetch()['n'];
            
            // Numbers of pages
            $nbPages = ceil($nbMessages / $limitPerPage);
            
            // Current page (where is the user)
            $currentPage = (isset($_GET['p']) && $_GET['p'] > 0 && $_GET['p'] <= $nbPages) ? $_GET['p'] : 1;
            
            // First message of the page
            $begin = ($currentPage - 1) * $limitPerPage;
            
            // Previous page
            $prev = $currentPage - 1;

            // Next page
            $next = $currentPage + 1;

            // Get messages from the database (only for one page)
            $req = $db->prepare("SELECT m.id, m.content, m.image, m.created_at, m.likes, u.username FROM messages as m INNER JOIN users as u ON u.id = m.user_id ORDER BY m.created_at DESC LIMIT $begin,$limitPerPage");
            $req->execute();
            $messages = $req->fetchAll();

            for ($i = 0; $i < sizeof($messages); $i++) {
                $messages[$i]["content"] = preg_replace_callback("#(http(s|):\/\/([a-zA-Z0-9.-]{3,60})(\/|)([a-zA-Z0-9-._\/]+|))#", function ($matches) {
                    return "<a href='{$matches[1]}' target='_blank'>{$matches[1]}</a>";
                }, $messages[$i]["content"]);
                $messages[$i]["content"] = preg_replace_callback("#@([a-zA-Z0-9-_]{2,60})#", function ($matches) {
                    return "<a href='https://twitter.com/{$matches[1]}' target='_blank'>{$matches[0]}</a>";
                }, $messages[$i]["content"]);
            }

            $previousLink = ($prev <= 1) ? 'disabled' : '';
            $nextLink = ($next >= $nbPages) ? 'disabled' : '';

            // Flash, Auth, Messages, Prev, Next, PreviousLink, NextLink, CurrentPage, NbPages
            require "vendor/autoload.php";
            $smarty = new Smarty();
            $smarty->assign([
                "flash" => $flash,
                "auth" => $auth,
                "posts" => $messages,
                "prev" => $prev,
                "next" => $next,
                "prevLink" => $previousLink,
                "nextLink" => $nextLink,
                "current" => $currentPage,
                "pages" => $nbPages
            ]);
            $smarty->display("templates/index.tpl");
        
            // Include the website footer
            require "includes/footer.inc.php";
        
        ?>
