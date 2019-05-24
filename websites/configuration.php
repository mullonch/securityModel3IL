<?php
    define('DB_HOST', '127.0.0.1');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');

    function getPDO($dbname) {
        if (!empty($dbname)) {
            return new PDO("mysql:host=".DB_HOST.";dbname=".$dbname.";charset=utf8", DB_USER, DB_PASSWORD);
        } else {
            return new PDO("mysql:host=".DB_HOST.";charset=utf8", DB_USER, DB_PASSWORD);
        }
    }