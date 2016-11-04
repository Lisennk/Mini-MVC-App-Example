<?php

/**
 * Creates table in database.
 * Run this file to install app.
 */

require_once 'vendor/autoload.php';

use Foundation\Database;

try {
    $config = include('config/db.php');
    $db = new Database($config);

    /**
     * Create table
     */
    $db->query("
        CREATE TABLE IF NOT EXISTS users
        (
          id int,
          name varchar(255),
          email varchar(255),
          password varchar(32),
          PRIMARY KEY (id)
        );
    ");

    /**
     * Create index
     */
    $db->query("CREATE INDEX emails ON users (email);");

    echo 'Success!';
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>

