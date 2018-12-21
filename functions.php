<?php

    /**
     * Connection to database
     *
     * @return \PDO|null
     */
    function connectToDatabase()
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
        return $db ?? null;
    }

    /**
     * Test form data
     *
     * @param string $data
     * @return void
     */
    function testData($data)
    {
        $data = htmlentities($data);
        $data = htmlspecialchars($data);
        $data = stripcslashes($data);
        $data = trim($data);
        return $data;
    }
