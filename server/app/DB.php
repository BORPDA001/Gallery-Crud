<?php
class Database {
    private $HOST = "127.0.0.1";
    private $USER = "root";
    private $PASSWORD = "";
    private $DB_NAME = "BLOG";

    public function connect() {
        return new mysqli(
            $this->HOST,
            $this->USER,
            $this->PASSWORD,
            $this->DB_NAME
        );
    }
}