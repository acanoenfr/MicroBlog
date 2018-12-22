<?php

    /**
     * Connection to database
     *
     * @return \PDO
     */
    function connectToDatabase(): \PDO
    {
        try {
            $db = new \PDO("mysql:host={$_ENV['host']};dbname={$_ENV['name']}", $_ENV['user'], $_ENV['pass']);
            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(\PDO::ATTR_CASE, \PDO::CASE_LOWER);
            $db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            if ($_ENV['debug']) {
                die ($e->getMessage());
            } else {
                die ("An error are occurred, please contact an administrator.");
            }
        }
        return $db;
    }

    /**
     * Test form data
     *
     * @param string $data
     * @return string
     */
    function testData(string $data): string
    {
        return htmlspecialchars(stripcslashes(trim($data)));
    }

    /**
     * Check is the user is logged
     *
     * @return boolean
     */
    function isLogged(): bool
    {
        if (isset($_COOKIE['sid'])) {
            $db = connectToDatabase();
            $req = $db->prepare("SELECT * FROM users WHERE sid = :sid LIMIT 1");
            $req->execute([
                "sid" => $_COOKIE['sid']
            ]);
            if ($req->rowCount() > 0) {
                return true;
            }
        }
        return false;
    }
